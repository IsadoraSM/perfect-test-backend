## Requisitos
- PHP 7.1 ou +
- MSYQL/PHPMyADMIN
- Composer (https://getcomposer.org/)

## Como utilizar
- 1) Acesse o arquivo ".env" e configure os campos APP_URL com a URL completa do projeto, DB_DATABASE com o nome do banco de dados criado no PHPMYADMIN, DB_USERNAME e DB_PASSWORD com login e senha do banco de dados. (Utilize o WAMP caso utilize Windows e acesse o PHPMYADMIN para criar o banco de dados para o site.)
- 2) No terminal digite (sem aspas): "composer install" - Para que seja instalado todas as dependências do LARAVEL
- 3) No terminal digite (sem aspas): "php artisan migrate" - Para que o sistema crie todas as tabelas e colunas do banco de dados.
