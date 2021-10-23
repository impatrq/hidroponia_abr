import socket
import machine
import network
from machine import Pin, ADC
import time, sys
from time import sleep
import esp
esp.osdebug(None)
import gc
gc.collect()

ip = 0

def conectar_wifi():

    global ip
    sta_if = network.WLAN(network.STA_IF)
    if not sta_if.isconnected():
        print('Conectando a la red...')
        sta_if.active(True)
        sta_if.connect('Avionica-2', 'Atlantida2020') 
        while not sta_if.isconnected():
            pass
    red = sta_if.ifconfig()
    ip = red[0]
    print('Configuracion de la red:', red[0:3])

conectar_wifi()
sensorph = ADC(0)
subirph = Pin(15, Pin.OUT, value= 0)
bajarph = Pin(14, Pin.OUT, value= 0)
flow = Pin(2, Pin.IN, Pin.PULL_UP)
led1 = Pin(4, Pin.OUT)
buzzer = Pin(16, Pin.OUT, value= 0)

count = 0
start_counter = 0
caudal = 0

def countPulse(p):
    global count
    global start_counter
    
    if start_counter == 1:
        count = count+1
        #flow = count / (60 * 7.5)

flow.irq(handler= countPulse, trigger= flow.IRQ_FALLING)

def phsensor():
    valor = sensorph.read ()
    tension = (valor * 5/1023)
    print ("Tension: ", tension)
    return tension

port = 8000
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s = socket.socket()
s.connect(("192.168.2.136",port))

print('Puerto en', ip)


while True:
    ph=phsensor()
    start_counter = 1
    sleep (1)
    start_counter = 0
    caudal = (count * 60 * 2.25 / 1000)
    print("El caudal es: %.3f L/min" % (caudal))
    count = 0
    sleep (5)
    if caudal < 1:
        print("No esta llegando suficiente agua")
        led1.value(1)
    else:
        led1.value(0)
    if caudal > 2:
        print("El agua esta circulando bien")
    data=';'.join([str(caudal),str(ph)]).encode('utf-8')
    s.send(data)
    dataFromServer = s.recv(1024)