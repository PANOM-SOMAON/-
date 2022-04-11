from tkinter import *

root = Tk()
root.geometry("600x400")
root.title("My project")
root.config(bg="#B3672B")


def printhi(*args):
    print("Hi brooo!")


btn = Button(root, text="จำนวนคนเข้าห้องทั้งหมด", command=printhi,font=('Angsana New', 18, 'bold'))
btn.place(x=50, y=300)

btn = Button(root, text="คนที่อยู่ในห้องปัจุบัน", command=printhi,font=('Angsana New', 18, 'bold'))
btn.place(x=225, y=150)

btn = Button(root, text="จำนวนคนออกห้องทั้งหมด", command=printhi,font=('Angsana New', 18, 'bold'))
btn.place(x=350, y=300)

root.mainloop()