## Goals
- Supports all alphabets and symbols
- Bi-directional encryption


## Algorithm
Encrypta is based on the [Caesar's Chipher](https://en.wikipedia.org/wiki/Caesar_cipher), but her standard mode is not safe 😓.

* ### What's the difference?
  * ### Random Shift
    Instead of using a plain-alphabet for the displacement (abcde...), Encrypta uses a list of 65 characters. You can generate another at any time. This list is called Kutter. 

  * ### Support all alphabets and symbols
    EncryptaEngine uses the base64 encoding method. It converts the characters into text-mode representations. That is, EncryptaEngine supports Chinese language, Russian language, emojis etc.

  * ### Rotation
    You can set the rotation index by changing the order of Kutter. This option does not make much difference 🤷‍♂️

  * ### Extra Security
    The first step is to encrypt the string with the Kutter set. With `steps = 2`, there is a second encryption, but using the reverse Kutter/String.

## Arguments
Here are the keys to encrypt and decrypt your things.
* ### Kutter
  To use Encrypta, you need a Kutter with a random text of 65 characters.

  _EncryptaEngine has a function that can generate it, which is called `randKutter`._

* ### Rotation
  _**Default:** 7_

* ### Steps
  _**Default:** 2_

## Initial Use
* ### Encrypta
  It's very easy to use. What you need is your text to be encrypted. So just use the `encrypta` method. 

  - The first argument being the desired text.

* ### Decrypta
  Enter the encrypted text and the function will return the original text. So just use the `decrypta` method. 
  
  - The first argument is the encrypted text.

## Improved Use
* ### Encrypta/Decrypta
  You can set the Rotation and Steps. 

  - The first argument is the text/encrypted-text.
  - The second argument is rotation.
  - The third argument is steps.
