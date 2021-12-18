# Desafio Dev Fullstack

## 🎉 Sobre

Este projeto tem como objectivo armazenar varias transações de uma forma facil, fazendo apenas o envio de um ficheiro de texto, seguindo os padrões.

O sistemas permite fazer o upload de uma ficheiro com informações de varias transações financeiras, e salvar essas informações em um banco de dados, permitindo uma melhor visualização e organização dos dados, e o sistema também permite a listagem de todas das transações financeiras, e a listagem por lojas(estabelecimentos).

O sistema conta uma API que permite fazer requisições que retornam informações das transações financeiras, e permite fazer filtragem por loja.

```bash
# Rota da API
http://localhost:8000/api/transacoes?loja_id="id da loja"

# Entre na pasta do projeto
loja_id: id da loja, utilizado para fazer a filtragem das transações financeiras

```

<br />

## 🔌 Tecnologias

### Front-end
- [Laravel](https://laravel.com/)
- [jQuery](https://jquery.com/)

### Back-end
- [Laravel](https://laravel.com/)

### Ambiente de desenvolvimento
- [VS Code](https://code.visualstudio.com/)

<br />

## 🤔 Como executar

Para clonar esse repositório pelo terminal, é necessário possuir o [Git](https://git-scm.com/) instalado em sua máquina.

```bash
# Clone o repositório
$ git clone https://github.com/dsilva01/desafio-dev-fullstack.git

# Entre na pasta do projeto
$ cd desafio-dev-fullstack

# Entre na pasta do projeto Laravvel
$ cd cnab
```

<br />

Para instalar as dependências e executar o projeto, é necessário possuir o [PHP](https://php.net/), [Laravel](https://laravel.com/), e o [Composer](https://getcomposer.org/) instalado em sua máquina.

<table style="width:100%;">
<tr>
<td align="center"> <strong>Unix (Linux ou Mac OS X)</strong> </td> <td align="center"> <strong>Windows</strong> </td>
</tr>
<tr>
<td>


```bash
# Instale as dependências com Composer
$ composer install

# Criar o ficheiro .env
$ cp .env.example .env

# Gerar a chave do ficheiro .env
$ php artisan key:generate

# Criar o banco de dados
# Utilizando o mysql
$ mysql -u 'usuario'-p 'senha'

# Criar o banco de dados
mysql> create database 'cnab';

# Fechar ligação do banco de dados
mysql> exit;
    
# Criar as tabelas no banco de dados
$ php artisan migrate

# Adicionar dados no banco de dados, 
# para o bom funcionamento do sistema
$ php artisan db:seed
    
# Executar o projeto
$ php artisan serve

# Acessar o projeto no navegador
http://127.0.0.1:8000
```    
    
</td>
<td>

```bash
# Instale as dependências com Composer
$ composer install

# Criar o ficheiro .env
$ copy .env.example .env

# Gerar a chave do ficheiro .env
$ php artisan key:generate

# Criar o banco de dados
# Utilizando o mysql
$ mysql -u 'usuario'-p 'senha'

# Criar o banco de dados
mysql> create database 'cnab';

# Fechar ligação do banco de dados
mysql> exit;
    
# Criar as tabelas no banco de dados
$ php artisan migrate

# Adicionar dados no banco de dados, 
# para o bom funcionamento do sistema
$ php artisan db:seed
    
# Executar o projeto
$ php artisan serve

# Acessar o projeto no navegador
http://127.0.0.1:8000
```

</td>
</table>
Acessar o projeto no navegador: http://127.0.0.1:8000
