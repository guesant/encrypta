## Goals
- Supports all alphabets and symbols
- Bi-directional encryption

## Algorithm
Encrypta is based on the [Caesar's Chipher](https://en.wikipedia.org/wiki/Caesar_cipher), but her standard mode is not safe 😓.

* ### What's the difference?
  * ### Random Shift
    Instead of using a plain-alphabet for the displacement (abcde...), Encrypta uses a random alphabet with 65 latin-characters. You can generate another one at any time. This alphabet is called Kutter.  

  * ### Support all alphabets and symbols
    EncryptaEngine uses the base64 encoding method. It converts the characters into text-mode representations. That is, EncryptaEngine supports Chinese language, Russian language, emojis etc.

  * ### Rotation
    You can set the rotation index by changing the order of Kutter. This option does not make much difference 🤷‍♂️

  * ### Extra Security
    The first step is to encrypt the string with the Kutter set. With `steps = 2`, there is a second encryption, but using the reverse Kutter/String.


## Installation & Usage
Encrypta is in various programming languages. Visit [this link](https://github.com/jipacoding/encrypta/wiki/Programming-Languages) and see available languages.

## Contributing
You can help making this project better by reporting bugs or submitting pull requests.
