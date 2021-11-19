import socket
import pymysql
from pymysql import cursors
from bs4 import BeautifulSoup
import requests 
import smtplib, ssl
import time 
import schedule
connection = pymysql.connect(
        host="localhost",
        user="root",
        password="",
        db="prueba",
)

print("Servidor prendido")


def run_query(mail=''): 

    cursor = connection.cursor()
    cursor.execute(mail)  
    if mail.upper().startswith('SELECT'): 
        data = cursor.fetchall()   # Traer los resultados de un select 
    else: 
        connection.commit()              # Hacer efectiva la escritura de datos 
        data = None                # Cerrar la conexión 

    return data

url = 'https://weather.com/es-AR/tiempo/hoy/l/-34.71,-58.25?par=google'
page = requests.get(url)
soup = BeautifulSoup(page.content, 'html.parser')
eq = soup.find_all('span', class_ ='CurrentConditions--tempValue--3a50n')
ep = soup.find_all('h1', class_ ='CurrentConditions--location--kyTeL')

mail = "SELECT mail FROM persona ORDER BY id DESC LIMIT 1"
email = run_query(mail)
email1 = str(email).replace('((', "")
email2 = str(email1).replace(',),)', "")
email3 = str(email2).replace("'", "")
email4 = str(email3).replace("?","@")
print (email4)

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)


s.bind(("192.168.0.214",8000))

s.listen()
print("El servidor funciona correctamente")

#conexioncliente = s.accept()

def emailcaudal():
    smtpServer='smtp.gmail.com'   
    fromAddr='hidroponiaabr@gmail.com'         
    toAddr=f'{email4}'
    password='elmaestruli'     
    #text= (f'\nEl pH de tu sistema hidropónico está bajo, es de: 0.246632').encode('utf-8')
    SUBJECT = "NO HAY CAUDAL EN EL SISTEMA - ACTUALIZACIÓN"
    TEXT = "Revisar urgentemente el reservorio, no se detecta caudal en el sistema."
    message = 'Subject: {}\n\n{}'.format(SUBJECT, TEXT).encode('utf-8')  
    context = ssl.create_default_context()
    with smtplib.SMTP(smtpServer, 587) as server:
        server = smtplib.SMTP(smtpServer, 587)
        server.ehlo()  # Can be omitted
        server.starttls(context=context)
        server.ehlo()  # Can be omitted
        server.login(fromAddr, password)
        server.sendmail(fromAddr, toAddr, message)  
        print("email caudal")

def phalto():
    smtpServer='smtp.gmail.com'   
    fromAddr='hidroponiaabr@gmail.com'         
    toAddr=f'{email4}'
    password='elmaestruli'     
    #text= (f'\nEl pH de tu sistema hidropónico está bajo, es de: 0.246632').encode('utf-8')
    SUBJECT = "pH ALTO - ACTUALIZACIÓN"
    TEXT = f"El nivel de pH está alto, es de: {ph}. Las bomba peristáltica ya se activó para poner el pH estable"
    message = 'Subject: {}\n\n{}'.format(SUBJECT, TEXT).encode('utf-8')  
    context = ssl.create_default_context()
    with smtplib.SMTP(smtpServer, 587) as server:
        server = smtplib.SMTP(smtpServer, 587)
        server.ehlo()  # Can be omitted
        server.starttls(context=context)
        server.ehlo()  # Can be omitted
        server.login(fromAddr, password)
        server.sendmail(fromAddr, toAddr, message)  

def phbajo():
    smtpServer='smtp.gmail.com'   
    fromAddr='hidroponiaabr@gmail.com'         
    toAddr=f'{email4}'
    password='elmaestruli'     
    #text= (f'\nEl pH de tu sistema hidropónico está bajo, es de: 0.246632').encode('utf-8')
    SUBJECT = "pH BAJO - ACTUALIZACIÓN"
    TEXT = f"El nivel de pH está bajo, es de: {ph}. Las bomba peristáltica ya se activó para poner el pH estable"
    message = 'Subject: {}\n\n{}'.format(SUBJECT, TEXT).encode('utf-8')  
    context = ssl.create_default_context()
    with smtplib.SMTP(smtpServer, 587) as server:
        server = smtplib.SMTP(smtpServer, 587)
        server.ehlo()  # Can be omitted
        server.starttls(context=context)
        server.ehlo()  # Can be omitted
        server.login(fromAddr, password)
        server.sendmail(fromAddr, toAddr, message)    
        print("Email de ph bajo")

scheduler1 = schedule.Scheduler()
scheduler1.every(10).seconds.do(emailcaudal)
scheduler2 = schedule.Scheduler()
scheduler2.every(10).seconds.do(phbajo)
scheduler3 = schedule.Scheduler()
scheduler3.every(10).seconds.do(phalto)

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

        print(temperatura)
        
        sql = f"INSERT INTO roberto (nivelph, caudal, temperatura, lugar) VALUES({ph}, {caudal}, '{temperatura}', '{lugares}')"
        print(sql)
        cursor = connection.cursor()
        cursor.execute(sql)
        connection.commit()
        if caudal < 1:
            scheduler1.run_pending()

        if ph < 2:
            scheduler2.run_pending()
        
        if ph > 4:
            scheduler3.run_pending()
