
# ProjectPulse

ProjectPulse is an internal organizational platform inspired by Quora where employees can collaborate by posting questions, ideas, or updates under different projects. It supports role-based dashboards, user authentication, post and project management, and content sharing.

---

## 🌟 Features

- User Registration and Login (with hashed passwords)
- Role-based dashboard (Admin, User)
- Project creation and listing
- Create & view posts under each project
- Post attachments (images, PDF, docs, links)
- Quora-like UI and rich text editor
- Admin dashboard for managing users and content
- Fixed sidebar project navigation
- Search bar (coming soon)

---

## 🛠️ Tech Stack

- **Framework**: CodeIgniter 4
- **Frontend**: Bootstrap 5, HTML5, CSS3, JS
- **Database**: MySQL / MariaDB
- **Server**: Apache/Nginx (Ubuntu)
- **Rich Text**: TinyMCE
- **Sanitization**: HTMLPurifier

---

## 🚀 Project Setup

### 1. Clone the Repository

```bash
git clone https://github.com/YourUsername/projectpulse.git
cd projectpulse
```

### 2. Set up `.env`

Rename or copy the `.env.example` to `.env`:

```bash
cp env .env
```

Edit `.env` and update the database settings:

```dotenv
database.default.hostname = localhost
database.default.database = projectpulse
database.default.username = root
database.default.password = rootpassword
```

### 3. Install Dependencies

```bash
composer install
```

---

## 🧱 Database Setup

### 1. Create Database

```sql
CREATE DATABASE projectpulse;
```

### 2. Run Migrations

```bash
php spark migrate
```

### 3. Run Seeders

```bash
php spark db:seed DatabaseSeeder
```

This will:
- Create default users (Admin and User)
- Insert sample projects
- Insert demo posts

---

## 🖥️ Running the Project (Development)

```bash
php spark serve
```

Access via: [http://localhost:8080](http://localhost:8080)

---

## 🌍 Running in Production

### Requirements:
- Ubuntu Server (20.04+)
- Apache/Nginx
- PHP 8.1+
- MySQL
- Certbot (for HTTPS)

### Git-Based Deployment:

```bash
# On production server
git clone https://github.com/YourUsername/projectpulse.git
cd projectpulse
composer install
cp env .env
php spark migrate
php spark db:seed DatabaseSeeder
```

Set proper Apache/Nginx virtual host to point to `/projectpulse/public`.

Set file permissions:

```bash
sudo chown -R www-data:www-data projectpulse
sudo chmod -R 755 writable
```

Enable HTTPS:

```bash
sudo apt install certbot python3-certbot-apache
sudo certbot --apache
```

---

## 📂 Git Usage Commands

### Pushing Code

```bash
git add .
git commit -m "Your commit message"
git push origin main
```

### Pulling Updates

```bash
# First commit your local changes or stash
git pull origin main
```

### Cloning on New Machine

```bash
git clone https://github.com/YourUsername/projectpulse.git
cd projectpulse
composer install
cp env .env
php spark migrate
php spark db:seed DatabaseSeeder
php spark serve
```

---

## 🙋 Admin Credentials (Seeder)

```bash
Email: admin@example.com
Password: admin123
```

## 👤 User Credentials (Seeder)

```bash
Email: user@example.com
Password: user123
```

---

## 🤝 Contribution

To contribute:

1. Fork the repo
2. Create a new branch
3. Make your changes
4. Push and create a Pull Request

---

## 📸 Screenshots


---

## 📄 License

MIT License
