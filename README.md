![Image](https://github.com/user-attachments/assets/96d58f31-882f-473c-9a8c-feaf7673ac1b)

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

9. Run the server
```bash
    php artisan serve
```

Access the website with this link 127.0.0.1:8000

## Use Case Diagram
<img src="https://github.com/user-attachments/assets/a711eeac-f034-448a-aa95-9f3a59c3a33b">
## 🔗 Links

<img src="https://github.com/user-attachments/assets/74e71ff9-bd48-4295-8a79-4e5d3ca6c262" width="100" height="100">
