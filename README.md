# 📊 ProjectPulse

ProjectPulse is a **Quora-style project management and discussion platform** built using **CodeIgniter 4**, **MySQL**, and **Bootstrap 5**. It enables employees in an organization to manage and discuss projects through posts, comments, and task sharing.

---

## 🧩 Features

- User Authentication (Login / Logout)
- Quora-like Navigation Bar with Profile Dropdown
- Admin & Employee Roles (Role-based Access)
- Trending Projects Sidebar (Visible across all pages)
- Projects and Posts (1-to-many relationship)
- Add, View, and Edit Posts (with modals like Quora)
- Profile Management (View and Edit)
- Session-based Flash Messages
- Responsive UI with Bootstrap 5
- Git Integration for Version Control

---

## 🚀 Technologies Used

- [CodeIgniter 4](https://codeigniter.com/)
- PHP 8.x
- MySQL / MariaDB
- Bootstrap 5
- Font: Bootstrap Icons
- Git & GitHub for version control

---

## 🗃️ Database Structure (Simplified)

| Table      | Fields                                                                 |
|------------|------------------------------------------------------------------------|
| `users`    | id, name, email, password, mobile, role, designation, created_at       |
| `projects` | id, name, description, created_at, updated_at                          |
| `posts`    | id, user_id (FK), project_id (FK), title, content, created_at, updated_at |

---

## ⚙️ Setup Instructions

### 🖥️ Local Setup (XAMPP/Windows)

1. Clone the repo:

```bash
git clone https://github.com/Prasanth22/projectpulse.git
cd projectpulse
