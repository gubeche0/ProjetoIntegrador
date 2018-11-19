# PROJETO INTEGRADOR
__Matérias do curso técnico envolvidas no projeto:__ Programação Web II, Desenvolvimento de Sistemas Web, Programação de Scripts, Análise e Projeto de Sistemas Web e Banco de Dados.

Queremos agradecer a todos os professores que nos ajudaram a concluir nosso projeto do começo ao fim.

## Sistema para gestão de livros do IFRS-BG
Nosso sistema tem como objetivo ajudar na hora de organizar os livros e os empréstimos para o ensino médio do Instituto Federal do Rio Grande do Sul, Campus Bento Gonçalves.

Assim, facilitando e agilizando os processos de distribuição e devolução dos livros, auxiliando os funcionários a gerenciar os livros sem muita deficultade.

## Linguagens utilizadas
1. __Php__
2. __JavaScript__
3. __HTML__


## Bibliotecas utilizadas
1. __Slim framework__
2. __Raintpl__
3. __Bootstrap__
4. __Sweet Alert 2__
5. __Jquery__
 
Também utilizamos o Visual Studio Code, Sublime, Git(junto com o Bitbucket), Trello,
Mysql Workbench, brModelo e o Astah, para nos organizar e programar com as linguagens e bibliotecas a cima.

### Componentes do grupo:
* __Gustavo Beche Lopes__
* __Pedro Lucas Viel Cristofoli__
* __Sednei Rossetti Junior__

## Tutorial de como rodar o servidor:

### requisitos para rodar
    * composer      

## SQL

Primeiramente, é precio configurar o arquivo config.php dentro da pasta App.
É necessário executar o código SQL dentro da pasta sql.
Também é necessário inserir ousúario com o comando:

```php
insert into funcionarios(email, nome, senha) value( EMAIL , NOME , HASH DA SENHA );
```
O hash da senha deve ser obtido através da função `password_hash` no php.


Primeiro de tudo clone o projeto com o seguinte comando:
```git
git clone https://github.com/gubeche0/ProjetoIntegrador.git
```
Agora é preciso entrar no diretório criado e  baixar as dependências do projeto utilizando o ‘composer’
```shell
$Cd projetointegrador
$Composer update 
```
Agora pra executar existe 3 formas diferente, utilizando o servidor embutido do php, criando uma virtualhost para o projeto ou colocando na raiz do servidor

### Servidor embutido do php
Dentro da pasta do projeto execute o seguinte comando:
```
$php -S localhost:8000
```
### Virtualhost 
Recomenda-se criar uma virtual host e deixar os arquivos do projeto dentro dela, para mais informações clique [aqui](https://blog.mxcursos.com/virtual-host/)


