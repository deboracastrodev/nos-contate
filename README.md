## Aplicação Nos Contate
SPA com formulário para captura de contato.

## Requisitos

 - PHP 7.3
 - Composer
 - NPM
 - Mysql

## Ferramentas utilizadas

 - Laravel ^8.4
 - Bootstrap ^4.0
 - Vue.js ^2.6
 - MySql

## Configuração Local

- clonar o respositório

- Duplicar o .env.example e renomear para .env

- Configurar as variáveis de ambiente de:
    - Banco de Dados
    - Envio de E-mail (SMTP)
    - MAIL_RECEIVED = Informar e-mail no qual deseja receber os dados do formulário

- Rodar o composer
    - composer install

- Gerar chave de acesso do Laravel
    - php artisan key:generate
    - php artisan config:cache

- Instanciar a base de dados
    - php artisan migrate

- Instanciar armazenamento local
    - php artisan storage:link

- Instanciar interface
    - npm install && npm run dev

- Iniciar server da aplicação
    - php artisan serve

## Testes
- Para iniciar os testes
    - php artisan test
