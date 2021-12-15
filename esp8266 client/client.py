import machine
try:
    import usocket as socket
except:
    import socket
import network
from machine import Pin, ADC, Timer
import time, sys
from time import sleep
import onewire
import ds18x20
import esp
esp.osdebug(None)
import gc
gc.collect()

ip = 0
data = ""

def conectar_wifi():

    global ip
    sta_if = network.WLAN(network.STA_IF)
    if not sta_if.isconnected():
        print('Conectando a la red...')
        sta_if.active(True)
        sta_if.connect('Fibertel WiFi978 2.4GHz', 'batman1234') 
        while not sta_if.isconnected():
            pass
    red = sta_if.ifconfig()
    ip = red[0]
    print('Configuracion de la red:', red[0:3])

conectar_wifi()
sensorph = ADC(0) #PIN A0
subirph = Pin(14, Pin.OUT, value= 0) #PIN D8
bajarph = Pin(12, Pin.OUT, value= 0) #PIN D7
nutrientes = Pin(13, Pin.OUT, value= 0) #PIN D6
flow = Pin(5, Pin.IN, Pin.PULL_UP) #PIN D4
led1 = Pin(4, Pin.OUT) #PIN D2
bomba = Pin(15, Pin.OUT) #PIN D8
tempagua = Pin(0, Pin.OUT) #PIN D3
tempagua_sensor = ds18x20.DS18X20(onewire.OneWire(tempagua))

roms = tempagua_sensor.scan()
print('Found DS devices: ', roms)


count = 0
start_counter = 0
caudal = 0

bomba.value(1)


def countPulse(p):
    global count
    global start_counter
    
    if start_counter == 1:
        count = count+1
        #flow = count / (60 * 7.5)

flow.irq(handler= countPulse, trigger= flow.IRQ_FALLING)


def phsensor():
    valor = sensorph.read ()
    tension = (valor * 3.3/1023)
    print ("Tension: ", tension)
    return tension

port = 8000
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s = socket.socket()
s.connect(("192.168.0.214",port))

print('Puerto en', ip)

def timer_callback(sock):

    global data
    global s
    global caudal 
    print(sock)
    s.send(data) 

timer = Timer(-1)
timer.init(period=50000, mode=Timer.PERIODIC, callback=timer_callback)


while True:
    tempagua_sensor.convert_temp()
    time.sleep_ms(750)
    for rom in roms:
        print(rom)
        print(tempagua_sensor.read_temp(rom))
    time.sleep(5)
    ph=phsensor()
    start_counter = 1
    sleep (1)
    start_counter = 0
    caudal = (count * 60 * 2.25 / 1000)
    print("-" * 20)
    print("El caudal es: %.3f L/min" % (caudal))
    count = 0
    sleep (5)
    if caudal < 1:
        print("No está llegando suficiente agua")
        led1.value(0)
    
    else:
        led1.value(1)
    
    if caudal > 2:
        print("El agua está circulando bien")


    if ph < 2:
        subirph.value(1)

    print("-" * 20)
    data=';'.join([str(caudal),str(ph),str(rom)]).encode('utf-8')


