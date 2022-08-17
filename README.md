<h1 align="center">Controle de Comissão - Tray Test</h1>

## Sobre
<p>Sistema para controle de vendas e comissões. Um sistema bem simples somente para fins estudantis e para melhor aprendizados dos cursos de PHP, Laravel e demais feitos, sendo uma boa ferramenta para praticar.</p>


### Features
- [x] CRUD de Vendedores.
- [x] Cadastro de Venda.
- [x] Listar todas as vendas de um vendedor.
- [x] Ao fim de cada dia, enviar um e-mail com o relatório de todas as vendas efetuadas no dia contendo sua somatória.


<h1>Instalação</h1>

A aplicação foi desenvolvida em ambiente Windows com PHP 8.1.7 utilizando o framework Laravel em sua versão 9.23.
Por ser uma aplicação simples, não foi utilizado o Docker, somente o Artisan para rodar o projeto. Para o banco de dados, para facilitar o entendimento e aplicação, foi utilizado o SQLITE, que utiliza a linguagem SQL.

### Pré-requisitos

Antes de rodar o sistema, deverá ser instalado as seguintes ferramentas:
[PHP 8](https://www.php.net/downloads.php), [Composer](https://getcomposer.org/) e [Laravel](https://laravel.com/docs/9.x/installation).
Para desenvolvimento do código foi utilizado o editor [VSCode](https://code.visualstudio.com/download)


# Rodando a Aplicação


1. Clonando o repositório da aplicação: `$ git clone https://github.com/joaopassareli/homework-tray`
2. Dentro da pasta database, criar o arquivo "database.sqlite" para que desta forma, possa rodar o banco da aplicação.
3. Instalar o composer pelo comando: `composer install`
4. Copiar o arquivo .env.example e renomear para .env: `cp .env.example .env`
5. Rodar o comando: `php artisan key:generate`
6. Rodar as migrations com o comando: `php artisan migrate` 
7. Executar a applicação com o servidor interno do Laravel: `php artisan serve`

O servidor iniciará em: localhost:8080 

