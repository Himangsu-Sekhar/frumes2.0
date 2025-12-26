# 🎬 FRUMES – Revamped  
## A Media Production & Marketing Agency Platform

**FRUMES Revamped** is a full-stack web application developed to represent a modern media production and marketing agency. The platform is designed to showcase services, manage client inquiries, and provide an admin-controlled content management system. This revamped version is built using **PHP and MySQL**, focusing on simplicity, scalability, and real-world project structure.

---

## 🚀 Project Overview

FRUMES assists:

- 🎥 **Filmmakers**
- 📸 **Video Content Creators**
- 🏢 **Production Houses**

by providing a centralized platform to explore services, view agency details, and communicate with the agency efficiently.

---

## 🛠️ Tech Stack Used

### Frontend
- HTML5  
- CSS3  
- JavaScript  

### Backend
- PHP  

### Database
- MySQL  

### Tools & Environment
- XAMPP / WAMP / LAMP (Local Server)
- phpMyAdmin
- Git & GitHub

---

## ✨ Key Features

### User Side
- Responsive and modern UI  
- Service showcase pages  
- Contact / inquiry form  
- Dynamic content rendering from database  

### Admin Panel
- Secure admin authentication  
- Manage services and content  
- View and manage client inquiries  
- Database-driven operations  

---

## 🗂️ Project Structure (High Level)

```text
FRUMES/
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── admin/
│   ├── dashboard.php
│   ├── login.php
│   └── manage-content.php
├── includes/
│   ├── config.php
│   └── db.php
├── index.php
├── contact.php
├── services.php
└── README.md

```

---

## 🧠 Database Design

- Well-structured relational database  
- Tables include:
  - **Admins**
  - **Services**
  - **Contact / Client Queries**
- Uses primary keys, foreign keys, and constraints to ensure data integrity and consistency  

---

## 🔐 Security Considerations

- Server-side validation using PHP  
- Sanitized database queries to prevent SQL injection  
- Authentication mechanism for admin access  
- Proper separation of frontend and backend logic  

---

## ⚙️ Installation & Setup

Follow the steps below to run **FRUMES Revamped** on your local machine.

---

### 📌 Prerequisites

Ensure the following are installed:

- PHP 8.x or higher  
- MySQL  
- Apache Server  
- XAMPP / WAMP / LAMP (recommended)  
- Web browser (Chrome / Firefox)  

---

### 📥 Step 1: Clone the Repository
```
git clone https://github.com/Himangsu-Sekhar/frumes2.0.git

```

Or download the ZIP file and extract it.

---

### 📂 Step 2: Move Project to Server Directory

Place the project folder inside the appropriate directory:

**XAMPP (Windows)**  
```
C:\xampp\htdocs\

```


**WAMP**  

```
C:\wamp64\www\

```



**LAMP (Linux)**  
```

/var/www/html/

```



---

### 🗄️ Step 3: Create the Database

1. Start **Apache** and **MySQL** from the XAMPP Control Panel  
2. Open **phpMyAdmin**  
3. Create a new database:

```CREATE DATABASE frumes;```

4. Import the provided SQL file (if available)  
   **OR** manually create tables as described in the project report.

---

### 🔧 Step 4: Configure Database Connection

Open the following file:

### includes/db.php



```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "frumes";
```

▶️ Step 5: Run the Project

Open your browser and navigate to:

```
http://localhost/frumes/

```
### 🔐 Admin Access

Use predefined admin credentials mentioned in the project report

OR manually insert admin credentials directly into the database

✅ Installation Complete

After successful setup, you can:

*View the FRUMES website

*Access the admin panel

*Manage services and client inquiries dynamically

### 📄 Project Report

📌 Detailed Project Report (Google Docs):
👉 https://docs.google.com/document/d/1pu3O5r3gSR1KnheS4OPRePvlO2-feEfN/edit?usp=sharing&ouid=107862360425584760937&rtpof=true&sd=true

### Report Contents

Introduction & objectives

System analysis

DFDs (Level 0 & Level 1)

Database design

Implementation details

Limitations & future scope

### ⚠️ Limitations

No integrated online payment gateway

No client-side authentication system

Limited automation features

### 🔮 Future Enhancements

Online payment gateway integration

Client login and dashboard

Email and notification system

Advanced analytics for admin panel

Migration to modern frameworks (Laravel / MERN)



## 👨‍💻 Author
**Himangsu Sekhar Dutta**
