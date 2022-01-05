Etapas para inicializar:

Mude o nome do arquivo na raíz de ".env.example" para ".env" e coloque os dados do banco de dados

No terminal, já dentro da raíz do projeto e com composer instalado, digite os comandos:
composer install
php artisan storage:link
php artisan key:generate
php artisan migrate
npm install
E inicie usando:
php artisan serve

Acesse no navegador https://localhost:8000
