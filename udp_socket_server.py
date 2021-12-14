#UDP-IP Server
import socket
import matplotlib.pyplot as plt
from drawnow import *

values = []

plt.ion()
cnt=0


    
def Main():
    host = '192.168.43.50'
    port = 5001

    s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
    s.bind((host,port))


    print("Server Started.")
    while True:
        data, addr = s.recvfrom(1024)
        data = data.decode('utf-8')
##        print(data)
        #check if valid value can be casted
        try:
            valueInInt = int(data)
            values.append(valueInInt)
            values.pop(0)
            drawnow(plotValues)
##        print("message From: " + str(addr))
##        print("from connected user: " + data)
##        data = data.upper()
##        print("sending: " + data)
##            s.sendto(data.encode('utf-8'), addr)

        except ValueError:
            print ("Invalid! cannot cast")
    s.close()

if __name__ == '__main__':
    def plotValues():
        plt.title('Serial value from ESP32')
        plt.grid(True)
        plt.ylabel('Current Data')
        plt.plot(values, 'rx-', label='values')
        plt.legend(loc='upper right')

    #pre-load dummy data
    for i in range(0,200):
        values.append(0)
    Main()
