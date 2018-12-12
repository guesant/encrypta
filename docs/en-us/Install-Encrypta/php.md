# Let's use Encrypta with PHP!
This page shows the use of Encrypta with PHP.

## Requirements

You must fit at least this requirements to use Encrypta with PHP:

- PHP >= 5.6
- Web server (Apache/Nginx/PHP built-in)

## Installation
First, include Encrypta to your project, with:
```php
require_once("encrypta.php");
```

Now start the Encrypta Engine
```php
$encryptaEngine = new Encrypta();
```

## Kutter
Before use, you need a “Kutter”. Kutter is a key to encrypt and decrypt your things.

* ### New Kutter
  To generate a new Kutter, you can use the method “randKutter”
  ```php
  $encryptaEngine->randKutter();
  ```

  The above example returns something like that: `y8xZVGabB2MtwX9jU/QlnA4dsuOfLDYIFS5N+1RqHvKiohcCPWr6JEze=kpT370mg`

* ### Set Kutter
  You must set Kutter for Encrypta to work. You can define as:
  ```php
  $encryptaEngine->setKutter("YOUR_KUTTER_HERE");
  ```

## Initial Use
**Do not forget to set the Kutter.**
* ### Encrypta
  The use is very simple, only informing the text you get a great result.
  ```php
  $encryptaEngine->encrypta("Não quero falar com Bandeirantes");
  ```

  Output, with Kutter inserted above: `LEIEK273Ie0fUSULIXuSUKuK0JregXhuOBsbZ2UFdBw+U4Y7Z=6+lJIJOJkW`

* ### Decrypta
  To decrypt, you can use:
  ```php
  $encryptaEngine->decrypta("LEIEK273Ie0fUSULIXuSUKuK0JregXhuOBsbZ2UFdBw+U4Y7Z=6+lJIJOJkW");
  ```
  
  Output, with Kutter inserted above: `Não quero falar com Bandeirantes`

## Improved Usage
For better security, you can define the rotation and encryption steps.

* ### Rotation
  By default, the rotation value is 7. You can change this value. See the example:
  
  ```php
  // Default Rotation
  $encryptaEngine->encrypta("a"); // yKYYZtWW
  $encryptaEngine->encrypta("a", 7); // yKYYZtWW
  ```

  ```php
  // Changed Rotation
  $encryptaEngine->encrypta("a", 8); // 38jHB=PP
  ```

  _Remembering that the result varies according to Kutter_


* ### Steps
  By default, the value is 2. You can change this value. See the example:
  ```php
  // Default Steps
  $encryptaEngine->encrypta("a", 7); // yKYYZtWW
  $encryptaEngine->encrypta("a", 7, 2); // yKYYZtWW
  ```

  ```php
  // Changed Steps
  $encryptaEngine->encrypta("a", 7, 3); // toYV=OOMHxgm
  ```
  _Remembering that the result varies according to Kutter_

