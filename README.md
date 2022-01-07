<h1>Etapas para inicializar:</h1>

<p>Mude o nome do arquivo na raíz de ".env.example" para ".env" e coloque os dados do banco de dados</p>

<p>No terminal, já dentro da raíz do projeto e com composer instalado, digite os comandos:</p>
composer install<br>
php artisan storage:link<br>
php artisan key:generate<br>
php artisan migrate<br>
npm install<br>
npm run dev<br>

E inicie usando:<br>
php artisan serve<br>

Acesse no navegador https://localhost:8000                
