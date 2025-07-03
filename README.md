# 🛠️ Fame Backend – Laravel API

This is the backend for the Manila FAME Registration Platform. It serves a REST API for handling user and company registrations.

---

## 🔧 Tech Stack

- Laravel 12.x
- MySQL
- API-first architecture
- File upload: local storage

---

## ⚙️ Environment Setup

### 1. Clone and Navigate

```bash
git clone https://github.com/johnferlinlimoran03/citem.git
cd fame-backend

##Install PHP Dependencies
#bash
composer install

##Copy & Configure .env
cp .env.example .env

##Update your database and app settings inside .env:
APP_NAME="FAME Backend"
APP_URL=http://localhost:8000
APP_KEY=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fame_db
DB_USERNAME=root
DB_PASSWORD=Nov41991@

FILESYSTEM_DISK=public

#Generate App Key
php artisan key:generate

##Run Migrations
php artisan migrate

#Enable API Routes (Laravel 12+)
php artisan install:api

##Serve API
php artisan serve
