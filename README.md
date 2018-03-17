# Projeto Ocorrencia_Arquivo
Projeto tem como objetivo procurar ocorrência de uma palavra em um arquivo recursivamente. 

## Configuração 
Necessário ter instalado o `PHP 7.0.0 >=` e apache2 `Server version: Apache/2.4.18 (Ubuntu)`,dar permição de leitura e escrita 
na pasta  `arquivos` e instalar a Classe `ZipArchive` ```php sudo apt-get install php7.1-zip```

## Como usar

Basta por o caminho da pasta no campo `Pasta a ser procurada:` e o nome|palavra|padrão que deseja
encontra no arquivo ou arquivo.
Em `Expressão:` é possivel fazer um expressão regular para procura de padroes, exemplo: `/[0-9]/`.Tambem é possivel realizar diff
da seguinte forma: Ir em diff por arquivo ou pasta inteira em `Pasta ou arquivo ser procurada 001:` e `Pasta ou arquivo ser procurada 002:`
escolher se vai ser um arquivo ou diretorio inteiro se for arquivo necessario por o diretorio completo do arquivo.

## Componetes usados

O projeto usar a biblioteca [php-diff](https://github.com/phpspec/php-diff) além da classe [ZipArchive](http://php.net/manual/en/class.ziparchive.php) e funções de busca com
[preg_match](http://php.net/manual/pt_BR/function.preg-match.php)
