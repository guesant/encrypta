## Objetivos
- Suportar todos os alfabetos e simbolos
- Criptografia bi-direcional

## Algoritmo
A Encrypta é baseda na [Cifra de César](https://pt.wikipedia.org/wiki/Cifra_de_C%C3%A9sar), mas o modo padrão dela não é seguro 😓.

* ### Qual a diferença?
  * ### Deslocamento Aleatório
    Ao invés de usar um alfabeto plano para o deslocamento (abcde...), a Encrypta usa uma lista de 65 caractéres. Você pode gerar outro quando quiser. Essa lista é chamada de Kutter .

  * ### Suporta todos os alfabetos e símbolos
    A EncryptaEngine usa a codificação base64. Ela converte os caractéres em representação modo-texto. Isso é, a EncryptaEngine suporta chinês, russo, emojis etc.

  * ### Rotação
    Você pode definir o índice de rotação, trocando a ordem do Kutter. Essa opção não faz muita difereça 🤷‍♂️

  * ### Segurança Extra
    O primeiro passo é criptografar o texto com o Kutter definido. Com `passos = 2`, há uma segunda criptografia, mas usando o reverso de Kutter/String.

## Argumentos
Aqui estão as chaves para des/criptografar usas coisas.
* ### Kutter
  Para usar a Encrypta, você precisa de um Kutter... um texto aleatório de 65 caracteres. 

  _A EncryptaEngine tem uma função que a gera, chamada `randKutter`._

* ### Rotation
  _**Padrão:** 7_

* ### Steps
  _**Padrão:** 2_

## Uso Inicial
* ### Encrypta
  O uso é bem simples, apenas informando o texto, você tem um bom resultado. Use o método `encrypta`.

  - O primeiro argumento é o texto desejado.

* ### Decrypta
  Coloque o texto criptografado, e a função retornará o texto original. Use o método `decrypta`.
  
  - O primeiro argumento é o texto criptografado.


## Uso Incrementado
* ### Encrypta/Decrypta
  Você pode definir a Rotação e os Passos 
  
  - O primeiro argumento é o texto normal/criptografado.
  - O segundo argumento é a rotação.
  - O terceiro argumento é os passos.
