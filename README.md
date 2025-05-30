# Orders Management App

A basic Orders Management App built with **Laravel 7** and **PHP 7**, that allows you to CRUD orders, receive an email notification with your invoice and to download the PDF invoice from the UI.

> 🕘 This is a reupload of a small test project originally built 5 years ago, now containerized with Docker for easier setup and portability.

## Technologies

- PHP 7.4+
- Laravel 7.x
- MySQL 5.7 (via Docker)
- Basic Bootstrap frontend
- Dockerized with Apache


## Setup 

> This project uses Docker for easy setup and environment isolation.

### 1. Clone the repository

```bash
git clone https://github.com/dgbusiness/orders-management-app.git
cd orders-management-app
```

### 2. Copy environment file

```bash
cp .env.example .env
```
### 3. Update .env values

```bash
DB_HOST=orders_management_db
DB_DATABASE=orders_management_mysql
DB_USERNAME=root
DB_PASSWORD=root
```

### 4. Build and run containers

```bash
docker compose up -d --build
```
This will start two containers:
- orders_management_app – running PHP/Laravel
- orders_management_db – running MySQL 5.7 (on port 3307)

### 4. Install PHP dependencies inside the container

```bash
docker exec -it orders_management_app composer install
```

### 5. Generate app key
```bash
docker exec -it orders_management_app php artisan key:generate
```
### 6. Run database migrations
```bash
docker exec -it orders_management_app php artisan migrate
```
### 7. Run storage link for images
```bash
docker exec -it orders_management_app php artisan storage:link
```

### 8. Run seeders
```bash
docker exec -it orders_management_app php artisan db:seed
```

## Usage
Visit the app in your browser:
```bash
http://localhost:8000
```
There, you can:
- CRUD new Orders.
- Receive email notifications once order is created. 
- Download orders invoice.

## Demo
![orders_management gif](/public/orders.gif)
