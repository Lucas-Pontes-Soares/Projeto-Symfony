# Projeto-Symfony

## Comando inicial:

composer create-project symfony/skeleton cadastro-symfony

Abrir servidor:
php -S localhost:8000 -t public/

## Comando para instalação:

configurar rotas:
composer require annotations

templates:
composer require twig  

orm
composer require orm

Criar banco
php bin/console doctrine:database:create

composer require --dev synfony/var-dumber