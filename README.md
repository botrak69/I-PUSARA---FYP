I-PUSARA Community Funeral Management Platform

Manual Installation Guide

Follow these steps to install and run the application locally.

Prerequisites

PHP >= 8.0

Composer

Node.js & npm

XAMPP (Apache + PHP) or an equivalent local server

Git

Installation Steps

Clone the repository

git clone https://github.com/botrak69/I-PUSARA---FYP.git
cd I-PUSARA---FYP

Install PHP dependencies

composer install

Install Node dependencies & compile assets

npm install
npm run dev

Environment configuration

Copy the example env file:

cp .env.example .env

Open .env and set your application URL (e.g.):

APP_URL=http://localhost/ipusara/public

Ensure the JSON data directory exists and copy initial files:

mkdir -p public/data
cp public/data/permohonan.json public/data/main_data.json

Set proper write permissions:

chmod -R 775 storage bootstrap/cache public/data

Generate the application key

php artisan key:generate

Run the application

Option 1: Built-in server

php artisan serve --host=127.0.0.1 --port=8000

Option 2: XAMPP
Place the project folder in htdocs/ipusara and access:
http://localhost/ipusara/public

Access the dashboard
Open your browser and visit:
http://localhost:8000 (or the URL set in your .env)

Optional Steps

Branch workflow:

git checkout -b feature/your-feature-name

Contribution:
Feel free to open issues or pull requests on the repo.

