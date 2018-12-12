import random
import base64

class Encrypta():
  def __init__(self, kutter = ''):
    self.setKutter(kutter)
  
  # Set the kutter
  def setKutter(self, kutter):
    if len(kutter) < 65:
      kutter = "cfEbULjpTQ9ASZFhd7lHqtz24XWueIG3wVvRmak/o+riMKsC0BNPY=D6Jxy815nOg"
    self.__kutter = kutter

  # Generate a new Kutter
  def randKutter(self):
    stKt = "CZSIechLmkJT1z4y3wiAGg0Q2HdP59Xlu/vVbjYfEtBsMNoF+WK7pa6xDRn=qrU8O"

    # Split a word into a list..
    stKt = list(stKt) 

    # ... and shuffle it
    random.shuffle(stKt)

    # Back to str-mode
    stKt = ''.join(stKt)

    return stKt

  
  # Encrypta Work
  def __encryptaEngine(self, txt, rot, kutter):
    # support other langs
    txt = base64.b64encode(txt.encode()).decode()

    # Encrypted string
    ret = ""

    # Caesar's cipher function
    for i in txt:
      i_index = kutter.index(i)
      ret += kutter[(i_index + rot) % len(kutter)]
    
    return ret

  # Decrypta Work
  def __decryptaEngine(self, txt, rot, kutter):
    # Decrypted string
    ret = ""
    
    # Inverted caesar's cipher
    for i in txt:
      i_index = kutter.index(i)
      ret += kutter[(i_index - rot) % len(kutter)]

    
    ret = base64.b64decode(ret).decode()
    return ret
  

  # Encrypta to Final-User
  def encrypta(self, txt = "", rot = 7, stps = 2):
    if(stps < 1):
      return txt
    
    kutter = self.__kutter

    # Set Current step
    curStep = 0

    # Starter Current Step
    enc = self.__encryptaEngine(txt, rot, kutter)
    curStep += 1

    # more 'n more
    while curStep < stps:
      kutter = kutter[::-1]
      enc = enc[::-1]

      enc = self.__encryptaEngine(enc, rot, kutter)
      curStep += 1
    
    return enc
      
  # Decrypta to Final-User
  def decrypta(self, txt = "", rot = 7, stps = 2):
    if(stps < 1):
      return txt
    
    kutter = self.__kutter

    if stps % 2 == 0:
      kutter = kutter[::-1]
    
    coiso = txt
    curStep = stps


    # more 'n more
    while curStep > 1:
      coiso = self.__decryptaEngine(coiso, rot, kutter)
      
      kutter = kutter[::-1]
      coiso = coiso[::-1]

      curStep -= 1
    
    coiso = self.__decryptaEngine(coiso, rot, kutter) 
    curStep -= 1;

    return coiso
      
  
