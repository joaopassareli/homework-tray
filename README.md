<h1 align="center">Controle de Comissão - Tray Test</h1>
<h2>Sobre</h2>
<p>Sistema para controle de vendas e comissões. Um sistema bem simples somente para fins estudantis e para melhor aprendizados dos cursos de PHP, Laravel e demais feitos, sendo uma boa ferramenta para praticar.</p>


<h1>Instalação</h1>

<p>A aplicação foi desenvolvida com PHP 8.1.7 utilizando o framework Laravel em sua versão 9.23.
Por ser uma aplicação simples, não foi utilizado o Docker, somente o Artisan para rodar o projeto</p>

<ol>
    <li>Clonar o repositório no computador, em uma pasta desejada, com o comando: git clone https://github.com/joaopassareli/homework-tray</li>
    <li>Criar na pasta database o arquivo 'database.sqlite', para conseguir utilizar o banco de dados.</li>
    <li>Fazer uma cópia do arquivo .env.example e renomear para '.env'</li>
    <li>Rodar o comando: 
        ```
            composer install
        ```
    </li>
    <li>Rodar o comando: php artisan migrate</li>
</ol>


### Features
- [x] Cadastro de Vendedores
- [x] Cadastro de Vendas
