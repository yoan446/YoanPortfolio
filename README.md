
# 🌐 Laravel Portfolio API

## 📝 Description
This project is a **Laravel-based portfolio application** that allows you to **manage your projects, technologies, and contact messages** through a RESTful API.  
It serves as both a showcase of your work and a backend system for managing your portfolio dynamically.

---

## 🚀 Features

### 🎨 Projects Management
- Add, edit, delete, and view your projects.
- Each project includes information such as title, description, technologies used, image, and link.

### ⚙️ Technologies Management
- Manage the technologies or tools you use in your projects.
- Each technology can be added, edited, or deleted via API endpoints.

### 💬 Contact Form Management
- Allows visitors to send you messages.
- Messages are stored in the database and can be retrieved via API.

---

## 🧩 API Endpoints

### 🗂 Projects
| Method | Endpoint | Description |
|--------|-----------|-------------|
| `GET` | `/api/listes-projects` | List all projects |
| `GET` | `/api/un-projects/{id}` | Get a single project by ID |
| `POST` | `/api/add-projects` | Add a new project |
| `PUT` | `/api/update-projects/{id}` | Update an existing project |
| `DELETE` | `/api/delete-projects/{id}` | Delete a project |

---

### 🧠 Technologies
| Method | Endpoint | Description |
|--------|-----------|-------------|
| `GET` | `/api/listes-technology` | List all technologies |
| `GET` | `/api/une-technologies/{id}` | Get a single technology |
| `POST` | `/api/ajouter-technology` | Add a new technology |
| `PUT` | `/api/modifier-technologies/{id}` | Update a technology |
| `DELETE` | `/api/supprimer-technologies/{id}` | Delete a technology |

---

### 💌 Contacts
| Method | Endpoint | Description |
|--------|-----------|-------------|
| `POST` | `/api/envoyer-message` | Send a message through the contact form |
| `GET` | `/api/lister-contacts` | Retrieve all contact messages |

---

## 🛠️ Installation Guide

Follow these steps to set up and run the project on your machine:

### 1️⃣ Clone the repository
```bash
git clone https://github.com/yourusername/portfolio-api.git
cd portfolio-api
````

### 2️⃣ Install dependencies

```bash
composer install
```

### 3️⃣ Create environment file

Duplicate the `.env.example` file and rename it to `.env`:

```bash
cp .env.example .env
```

### 4️⃣ Configure the environment

In your `.env` file, set up the following values according to your system:

```env
APP_NAME=PortfolioAPI
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=root
DB_PASSWORD=
```

Then generate the application key:

```bash
php artisan key:generate
```

### 5️⃣ Run migrations

This will create all necessary tables in your database:

```bash
php artisan migrate
```

### 6️⃣ Serve the project

To start the Laravel development server, run:

```bash
php artisan serve
```

The API will now be available at:

```
http://127.0.0.1:8000/api/
```

---

## 🧾 Example Usage

### ➕ Add a Project

**POST** `/api/add-projects`

Request body (JSON):

```json
{
  "titre": "My Portfolio Website",
  "description": "A personal portfolio built with Laravel",
  "technologies": "Laravel, Bootstrap, MySQL",
  "image": "image/projet3.png",
  "lien": "https://myportfolio.com"
}
```

---

## 🧑‍💻 Tech Stack

* **Backend**: Laravel 11 (PHP Framework)
* **Database**: MySQL
* **Frontend (optional)**: HTML / CSS / JavaScript (or Vue/React)
* **API Architecture**: RESTful
* **Version Control**: Git & GitHub

---

## 👨‍🎓 Author

**Jonathan Aspirine**
📧 [[your-email@example.com](mailto:your-email@example.com)]
🌍 [https://your-portfolio-link.com](https://your-portfolio-link.com)

---

## 📜 License

This project is licensed under the MIT License — you are free to use, modify, and distribute it.

---

## 💡 Tips

To deploy your Laravel portfolio API on another machine:

1. Clone the repository.
2. Run `composer install`.
3. Copy `.env` and update database credentials.
4. Run `php artisan migrate`.
5. Start the server using `php artisan serve`.

---

✨ *Enjoy building your personal portfolio API with Laravel!* ✨
