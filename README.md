![Image](https://github.com/user-attachments/assets/96d58f31-882f-473c-9a8c-feaf7673ac1b)

# AmA e-Book

AmA e-Book is a simple website that uses [Laravel 12](https://laravel.com/docs/12.x/releases) framework for finding e-Book found on the internet. The name AmA e-Book is a play on words of [Amazon kindle](https://www.amazon.com/kindle-dbs/storefront) which is the idea for this website came from and also take an inspiration from [Gramedia](https://www.gramedia.com) style on the frontend.
This project uses [Laravel 12](https://laravel.com/docs/12.x/releases) and Laravel Breeze for the authentication.

## 

<h3 align="center">Homepage of AmA e-Book</h3>
    <p align="center">
        <img src="https://github.com/user-attachments/assets/96ae22b9-6c36-481f-a059-94278a30ce40">
    </p>
    
##

<h3 align="center">Dashboard of AmA e-Book</h3>
    <p align="center">
        <img src="https://github.com/user-attachments/assets/7244c550-5a26-4403-b9ce-7ddedf76c473">
    </p>

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
<ul>
    This seeding is for admin login
    <ul>
        <li>Username : admin@example.com</li>
        <li>Password : admin123</li>
    </ul>
</ul>

8. Install npm and run
```bash
    npm install
    npm run dev
```

9. Run the server
```bash
    php artisan serve
```

#### Access the website with this link 127.0.0.1:8000 or you can edit inside the .env file at APP_URL (as shown below) the url you want with .test at the end of the url

<p align="center">
    <img src="https://github.com/user-attachments/assets/3e23db64-bff5-4737-85dc-606d243562b6">
</p>

## Use Case Diagram
<p align="center">
    <img src="https://github.com/user-attachments/assets/5ecfbaa4-07c4-4342-af66-3a7f44ade4be" width="700" height="400">
</p>

## Class Diagram
<p align="center">
    <img src="https://github.com/user-attachments/assets/255e3273-5db3-4b36-8aed-61a52c8028c1" width="400" height="400">
</p>

## Activity Diagram
<p align="center">
    <img src="https://github.com/user-attachments/assets/f890dc32-aa84-49da-a242-dd39167807a0" width="400" height="800">
</p>

## Follow Me 

<a href="https://www.instagram.com/mharizkiaig7/">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/600px-Instagram_logo_2022.svg.png" width="50" height="50">
</a>
