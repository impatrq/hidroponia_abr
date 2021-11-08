import socket
import pymysql
from pymysql import cursors
from bs4 import BeautifulSoup
import requests 

connection = pymysql.connect(
    host="localhost",
    user="root",
    password="",
    db="prueba",
)

cursor = connection.cursor()

url = 'https://weather.com/es-AR/tiempo/hoy/l/-34.71,-58.25?par=google'
page = requests.get(url)
soup = BeautifulSoup(page.content, 'html.parser')
eq = soup.find_all('span', class_ ='CurrentConditions--tempValue--3a50n')
ep = soup.find_all('h1', class_ ='CurrentConditions--location--kyTeL')



s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)


s.bind(("192.168.2.21",8000))

s.listen()
print("El servidor funciona correctamente")

 
while(True):

    clientConnected, clientAddress = s.accept()

    print(F"Se aceptó una solicitud de conexión de {clientConnected}:{clientAddress}")

    while True:
        dataFromClient = clientConnected.recv(1024)

        databuena = dataFromClient.decode('utf-8')
        datos = databuena.split(';')
        ph = float(datos[1])
        caudal = float(datos[0])
        
        tiempo = list()
        lugar = []

        for i in eq:
            tiempo.append(i.text)
        tempval = tiempo[0]
        temperatura = str(tempval).replace('°', "")


        for i in ep:
            lugar.append(i.text)

        lugarval = lugar[0]
        lugares = str(lugarval).replace('Tiempo en ', "")
        
        sql = f"INSERT INTO roberto (nivelph, caudal, temperatura, lugar) VALUES({ph}, {caudal}, '{temperatura}', '{lugares}')"
        print(sql)
        cursor.execute(sql)
        connection.commit()


    