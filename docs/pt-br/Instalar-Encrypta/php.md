# Vamos usar a Encrypta com PHP!
Esta página mostra como usar a Encrypta com PHP.

## Requisitos
Você precisa ter estes requisitos para usar a Encrypta com PHP:

- PHP >= 5.6
- Servidor Web (Apache/Nginx/PHP embutido)

## Instalação
Primeiro, inclua a Encrypta em seu projeto, com:
```php
require_once("encrypta.php");
```

Agora, inicie a EncryptaEngine
```php
$encryptaEngine = new Encrypta();
```

## Kutter
Antes de usar, você precisa de um “Kutter”. Kutter é uma chave para des/criptografar suas coisas.

* ### Novo Kutter
  Para gerar um novo Kutter, você pode usar o método “randKutter”
  ```php
  $encryptaEngine->randKutter();
  ```

  O exemplo acima retorna algo parecido à: `y8xZVGabB2MtwX9jU/QlnA4dsuOfLDYIFS5N+1RqHvKiohcCPWr6JEze=kpT370mg`

* ### Definir o Kutter
  Você precisa definir o Kutter para a Encrypta funcionar. Você pode definir assim:
  ```php
  $encryptaEngine->setKutter("SEU_KUTTER_AQUI");
  ```

## Uso Inicial
**Não se esqueça de definir o Kutter.**
* ### Encrypta
  O uso é bem simples, apenas informando o texto, você tem um bom resultado.
  ```php
  $encryptaEngine->encrypta("Não quero falar com Bandeirantes");
  ```

  Saída com o Kutter definido acima: `LEIEK273Ie0fUSULIXuSUKuK0JregXhuOBsbZ2UFdBw+U4Y7Z=6+lJIJOJkW`

* ### Decrypta
  Para descriptografar, você pode usar:
  ```php
  $encryptaEngine->decrypta("LEIEK273Ie0fUSULIXuSUKuK0JregXhuOBsbZ2UFdBw+U4Y7Z=6+lJIJOJkW");
  ```
  
  Saída com o Kutter definido acima: `Não quero falar com Bandeirantes`

## Uso Incrementado
Para uma melhor segurança, você pode definir a rotação e as camadas.


* ### Rotação
  Por padrão, o valor de rotação é 7. Você pode trocar esse valor. Veja o exemplo:
  
  ```php
  // Rotação Padrão
  $encryptaEngine->encrypta("a"); // yKYYZtWW
  $encryptaEngine->encrypta("a", 7); // yKYYZtWW
  ```

  ```php
  // Rotação Modificada
  $encryptaEngine->encrypta("a", 8); // 38jHB=PP
  ```

  _Relembrando que o resultado varia de acordo com o Kutter_


* ### Passos
  Por padrão, o valor é 2. Você pode trocar esse valor. Veja o exemplo:

  ```php
  // Passos Padrões
  $encryptaEngine->encrypta("a", 7); // yKYYZtWW
  $encryptaEngine->encrypta("a", 7, 2); // yKYYZtWW
  ```

  ```php
  // Passos Modificados
  $encryptaEngine->encrypta("a", 7, 3); // toYV=OOMHxgm
  ```
  _Relembrando que o resultado varia de acordo com o Kutter_

