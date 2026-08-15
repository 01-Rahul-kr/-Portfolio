# 🚀 Rahul Kumar - Developer Portfolio & Admin Control Panel

A state-of-the-art, dynamic personal portfolio website and full-featured Admin Control Panel built with **CodeIgniter 4**, **PHP 8.2+**, **MySQL**, **Bootstrap 5**, and a custom **Dual-Theme Glassmorphism UI System** (Dark & Light Modes).

![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.x-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0%2B-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![Theme](https://img.shields.io/badge/Theme-Dark%20%26%20Light-6366F1?style=for-the-badge)

---

## ✨ Key Features

### 🌐 Public Portfolio Website
- **Sleek Dual-Theme Design**: Toggle seamlessly between high-contrast **Dark Mode** (Midnight Obsidian `#070A11`) and **Light Mode** (Pearl White `#F8FAFC`).
- **Glassmorphism Aesthetic**: Modern translucent card surfaces (`backdrop-filter: blur(20px)`) with crisp borders and glowing shadows.
- **Dynamic Content**:
  - **Hero Section**: Typed role animations, experience badge, bio, and CTA buttons.
  - **About Section**: Professional summary, key attributes, and quick details.
  - **Skills Showcase**: Categorized technical skills (PHP, CodeIgniter 4, MySQL, Bootstrap, JS) with animated progress bars.
  - **Work Experience & Education**: Vertical timeline layout for career milestones and academic qualifications.
  - **Projects Showcase**: Filterable portfolio grid with project links, tech stack badges, and screenshots.
  - **Services Offered**: Card grid highlighting key development services.
  - **Interactive Contact Form**: Real-time AJAX submission with database storage and client validation.
  - **Resume Management**: Instant PDF download link synced with admin panel uploads.

---

### 🛡️ Admin Control Panel
- **Secure Authentication**: Protected dashboard routes, password hashing (`PASSWORD_DEFAULT`), and CSRF token verification.
- **Interactive Photo Cropping**: Built-in **Cropper.js** frontend modal allowing admins to zoom, rotate, and crop photos (Avatar `1:1`, Hero/About `1:1`, Projects `16:10`) before uploading.
- **Server-Side Auto-Resizing**: Integrated PHP GD Image Service (`\Config\Services::image('gd')`) center-crops and normalizes all uploaded photos automatically.
- **Full Content Management System (CMS)**:
  - **Profile Management**: Update full name, email, username, avatar photo, and security password.
  - **Site Settings**: Manage site titles, SEO meta tags, bio, contact info, and map embed HTML.
  - **Project Management**: Add, edit, reorder, feature, and delete portfolio projects.
  - **Skill Management**: Manage technical skills, categories, proficiency levels, and FontAwesome icons.
  - **Experience & Education**: Update job roles, companies, degrees, dates, and milestone points.
  - **Services & Social Links**: Manage offered services and active social media links.
  - **Messages Inbox**: View, organize, and reply directly to contact form submissions.
  - **Resume Uploader**: Upload and replace the active downloadable resume PDF file.

---

## 🛠️ Technology Stack

| Layer | Technology |
|---|---|
| **Backend Framework** | [CodeIgniter 4.x](https://codeigniter.com) |
| **Programming Language** | PHP 8.2+ |
| **Database** | MySQL / MariaDB |
| **Frontend Styling** | Custom Vanilla CSS (Variables System), Bootstrap 5.3 |
| **Typography** | Plus Jakarta Sans, Poppins, Inter (Google Fonts) |
| **Iconography** | FontAwesome 6 |
| **Image Processing** | Cropper.js (Client) + CodeIgniter 4 GD Image Handler (Server) |
| **Asynchronous JS** | jQuery 3.7 + AJAX |

---

## 📂 Project Structure Overview

```text
portfolio/
├── app/
│   ├── Config/              # CI4 App & Database configuration
│   ├── Controllers/
│   │   ├── Home.php         # Public website controller & AJAX contact handler
│   │   └── Admin/           # Admin modules (Profile, Settings, Projects, etc.)
│   ├── Database/
│   │   ├── Migrations/      # Database table migrations
│   │   └── Seeds/           # PortfolioSeeder seed data
│   ├── Models/              # CodeIgniter Data Models
│   └── Views/
│       ├── home/            # Public single-page portfolio view
│       ├── layouts/         # Main & Admin master layouts
│       └── admin/           # Admin dashboard views & form modules
├── public/
│   ├── assets/
│   │   ├── css/             # style.css (Public) & admin.css (Admin)
│   │   ├── js/              # main.js (Public) & admin.js (Admin / Cropper)
│   │   ├── images/          # Default profile & project assets
│   │   └── uploads/         # Uploaded avatars, projects, and resume PDF
│   └── index.php            # Web server entry point
├── db_portfolio.sql         # Full SQL database export
├── spark                    # CodeIgniter Spark CLI tool
└── README.md                # Project documentation
```

---

## ⚡ Installation & Local Setup

### 1. Prerequisites
Ensure your local development environment has:
- **PHP 8.2** or higher with `gd`, `intl`, `mbstring`, `curl`, and `pdo_mysql` extensions enabled.
- **MySQL / MariaDB** server.
- **Composer** (Optional, for package updates).
- **Laragon**, XAMPP, or WAMP stack.

---

### 2. Database Configuration
1. Start your MySQL database server.
2. Create a new MySQL database named `db_portfolio`:
   ```sql
   CREATE DATABASE db_portfolio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```
3. Copy or check the configuration in your `.env` file:
   ```env
   database.default.hostname = localhost
   database.default.database = db_portfolio
   database.default.username = root
   database.default.password = 
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

---

### 3. Run Migrations & Seeders
Execute the following CodeIgniter Spark commands in your terminal to create the database schema and populate initial data:

```bash
# Run database migrations
php spark migrate

# Seed database with initial default portfolio records
php spark db:seed PortfolioSeeder
```

*(Alternatively, you can import `db_portfolio.sql` directly into phpMyAdmin / MySQL CLI).*

---

### 4. Serve the Application
Run the built-in development server using Spark:

```bash
php spark serve --port 8081
```

Access the website in your web browser:
- 🌐 **Public Website**: `http://localhost:8081/`
- 🔐 **Admin Control Panel**: `http://localhost:8081/admin/login`

---

## 🔐 Default Admin Login Credentials

| Attribute | Credential |
|---|---|
| **Admin Login URL** | `http://localhost:8081/admin/login` |
| **Username** | `admin` |
| **Email** | `admin@rahulkumar.com` |
| **Password** | `admin123` |

*(You can update the username, email, and password anytime from the **Admin Profile** screen).*

---

## 📄 License & Credits

Designed & Developed by **Rahul Kumar** — Senior PHP Developer & CodeIgniter Specialist.
