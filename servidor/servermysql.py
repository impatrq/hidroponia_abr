import socket
import pymysql
from pymysql import cursors

connection = pymysql.connect(
    host="localhost",
    user="root",
    password="",
    db="prueba",
)

cursor = connection.cursor()


s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)


s.bind(("192.168.2.136",8000))

s.listen()
print("El servidor funciona correctamente")

 
while(True):

    clientConnected, clientAddress = s.accept()

    print(F"Se aceptó una solicitud de conexión de {clientConnected}:{clientAddress}")

    dataFromClient = clientConnected.recv(1024)

    databuena = dataFromClient.decode('utf-8')
    datos = databuena.split(';')
    ph = str(datos[1])
    caudal = str(datos[0])
    print(databuena)
    
    sql = f"INSERT INTO roberto (nivelph, caudal) VALUES({ph}, {caudal})"

    print(sql)

    cursor.execute(sql)
    connection.commit()

    clientConnected.send("hola cliente".encode())