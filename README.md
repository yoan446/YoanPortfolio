# 🌐 My Portfolio

A modern, responsive, and dynamic **personal portfolio** built with **Laravel**, designed to showcase my skills, projects, and professional experience.
It includes dynamic sections for projects, technologies, and services, all powered by a clean backend API.

---

## 🧠 Features

* 💼 **Dynamic project management** – display projects stored in the database with their technologies and GitHub links.
* 🧰 **Technology listing** – automatic loading of the technologies used in each project.
* 📱 **Responsive design** – adapts perfectly to all devices (desktop, tablet, mobile).
* ⚡ **Fast and lightweight** – optimized for performance and quick loading.
* 🌍 **API-ready structure** – easily extendable for admin management or CMS integration.

---

## 🛠️ Tech Stack

* **Backend**: Laravel 11
* **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
* **Database**: MySQL
* **Version Control**: Git / GitHub
* **Environment**: PHP 8.2+, Composer, npm

---

## 📂 Folder Structure

```
my-portfolio/
├── app/
│   ├── Http/
│   ├── Models/
│   └── ...
├── public/
│   ├── image/
│   ├── css/
│   ├── js/
│   └── index.php
├── resources/
│   ├── views/
│   └── ...
├── routes/
│   └── web.php
├── database/
│   └── migrations/
├── .env.example
├── composer.json
└── package.json
```

---

## ⚙️ Installation & Setup

### 1️⃣ Clone the repository

```bash
git clone https://github.com/yoan446/YoanPortfolio.git
```

### 2️⃣ Navigate into the project folder

```bash
cd YoanPortfolio
```

### 3️⃣ Install PHP dependencies

Make sure you have [Composer](https://getcomposer.org/) installed, then run:

```bash
composer install
```

### 4️⃣ Install Node dependencies (optional for frontend assets)

```bash
npm install
```

### 5️⃣ Copy and configure environment file

```bash
cp .env.example .env
```

Then edit `.env` to match your local setup:

```env
APP_NAME="My Portfolio"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=root
DB_PASSWORD=
```

### 6️⃣ Generate application key

```bash
php artisan key:generate
```

### 7️⃣ Run migrations (if the project uses a database)

```bash
php artisan migrate
```

### 8️⃣ Serve the project locally

```bash
php artisan serve
```

➡️ The project will be accessible at: [http://localhost:8000](http://localhost:8000)

---

## 🖼️ Adding Images

All images used in the portfolio (project thumbnails, backgrounds, etc.) should be placed in:

```
public/image/
```

Example:

```
public/image/projet1.png
public/image/projet2.png
```

---

## 🔧 API Endpoints (Example)

| Endpoint             | Method | Description                                              |
| -------------------- | ------ | -------------------------------------------------------- |
| `/listes-technology` | `GET`  | Returns the list of technologies                         |
| `/listes-projects`   | `GET`  | Returns all portfolio projects with related technologies |

Response example:

```json
{
  "id": 7,
  "title": "My Portfolio",
  "description": "A modern and responsive portfolio built with Laravel.",
  "github_link": "https://github.com/yoan446/YoanPortfolio.git",
  "image": "image/projet3.png",
  "technologies": [
    { "tech_name": "Laravel" },
    { "tech_name": "JavaScript" },
    { "tech_name": "MySQL" }
  ]
}
```

---

## 💡 How to Run on Another Machine

If you want to run this project on another machine:

1. **Copy the entire project folder** or **clone it from GitHub**.
2. **Install dependencies** with `composer install` and `npm install`.
3. **Create a new `.env` file** and update your local database info.
4. **Run `php artisan key:generate`** to create a new app key.
5. **Run `php artisan serve`** and open the link displayed (usually [http://localhost:8000](http://localhost:8000)).

✅ Your portfolio is now live locally on the new machine!

---

## 🧑‍💻 Author

**Name:** Yoan Aspirine
**GitHub:** [yoan446](https://github.com/yoan446)
**Email:** [your.email@example.com](mailto:your.email@example.com)

---

## 📜 License

This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).
