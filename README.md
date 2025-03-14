<img src="https://ibb.co.com/KcV7qxnV">

# AmA e-Book

AmA e-Book is a website that uses laravel framework for finding e-Book found on the internet. The name AmA e-Book is play on words [Amazon kindle](https://www.amazon.com/kindle-dbs/storefront) which is the idea for this website came from and also take inspiration from [Gramedia](https://www.amazon.com/kindle-dbs/storefront).
This project uses Laravel Breeze for the authentication.

This project uses [Laravel 12](https://laravel.com/docs/12.x/releases)
## Installation

1. Clone the project

```bash
    git clone https://github.com/mharizkia/amaebook
```
2. Open the project

```bash
    cd amaebook
```
3. Install composer

```bash
    composer install
```
4. Copy .env file

```bash
    cp .env.example .env
```
5. Generate a key

```bash
    php artisan key:generate
```
6. Migrate the database

```bash
    php artisan migrate
```
7. Seed the database

```bash
    php artisan db:seed
```
This seeding is for admin login
```
Username : admin@example.com
Password : admin123
```

8. Install npm and run
```bash
    npm install
    npm run dev
```

