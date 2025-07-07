# I-PUSARA Community Funeral Management Platform

## Manual Installation Guide

Follow these steps to install and run the application locally.

### Prerequisites
- PHP >= 8.0
- Composer
- Node.js & npm
- XAMPP (Apache + PHP) or an equivalent local server
- Git

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/botrak69/I-PUSARA---FYP.git
   cd I-PUSARA---FYP

---

2. **Install PHP dependencies**
   ```bash
   composer install

---

3. **Install Node dependencies & compile assets**
   ```bash
    npm install
    npm run dev

---

4. **Environment configuration**
   ```bash
    cp .env.example .env
    # Edit .env and set APP_URL, e.g., APP_URL=http://localhost/ipusara/public
    mkdir -p public/data
    cp public/data/permohonan.json public/data/main_d

---

5. **Generate the application key**
   ```bash
    php artisan key:generate

---

6. **Run the application**
   ```bash
# Option 1: Built-in server
php artisan serve --host=127.0.0.1 --port=8000

# Option 2: XAMPP
# Place the project folder in htdocs/ipusara and visit:
# http://localhost/ipusara/public
---

7. **Access the dashboard**
   ```bash
# Open your browser at:
http://localhost:8000
---
