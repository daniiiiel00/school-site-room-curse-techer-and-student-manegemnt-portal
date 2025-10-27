# 🏫 School Management Portal

A **Web-Based School Site Management Portal** designed to manage **rooms, courses, teachers, and students** efficiently.  
This system provides role-based access for **admins, teachers, and students**, enabling effective communication and academic management.

---

## 🚀 Features

### 👩‍💼 Admin Panel
- Manage teachers, students, rooms, and courses.
- Assign teachers to specific courses and rooms.
- Approve and manage student registrations.
- Generate and view reports (attendance, grades, etc.).

### 👨‍🏫 Teacher Panel
- View assigned classes and subjects.
- Manage student grades and attendance.
- Communicate with students and administrators.
- Upload course materials or notes.

### 👨‍🎓 Student Panel
- View enrolled courses and grades.
- Access room and timetable information.
- Submit assignments and communicate with teachers.
- Update personal profile information.

---

## 🧱 Tech Stack

| Technology | Purpose |
|-------------|----------|
| **HTML5** | Structure and content |
| **CSS3** | Styling and responsive design |
| **JavaScript** | Interactivity and dynamic UI |
| **PHP (Core)** | Backend logic and server-side scripting |
| **MySQL / SQL** | Database management and storage |

---

## 🗄️ Database Structure (Overview)

**Main Tables:**
- `users` – Stores login info and user roles (admin, teacher, student)
- `students` – Student profile data
- `teachers` – Teacher profile data
- `courses` – Course details and descriptions
- `rooms` – Classrooms and lab information
- `enrollments` – Link between students and courses
- `grades` – Stores student performance and scores

---

## ⚙️ Installation Guide

1. **Clone the Repository**
   ```bash
   git clone https://github.com/daniiiiel00/school-site-room-curse-techer-and-student-manegemnt-portal.git


   cd school-management-portal
Set Up Database

Open phpMyAdmin

Create a new database (e.g. school_portal_db)

Import the database.sql file included in the project folder

Configure Database Connection

Open config.php or db_connect.php

Update credentials:

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school_portal_db";


Run the Project

Place the project folder inside your server directory:

For XAMPP: htdocs

For WAMP: www

Start Apache and MySQL



| Role    | Default Username | Default Password |
| ------- | ---------------- | ---------------- |
| Admin   | `admin`          | `admin123`       |
| Teacher | `teacher01`      | `teacher123`     |
| Student | `student01`      | `student123`     |


📱 Responsive Design

The portal is fully responsive and works on:

Desktop

Tablets

Mobile devices


🧰 Future Improvements

Add parent/guardian module

Integrate online payment system for fees

Add chat and notification system

Build REST API for mobile app integration

Enable AI-based performance analytics


🤝 Contributing

Fork the project

Create your feature branch:

git checkout -b feature-name


Commit your changes:

git commit -m "Add new feature"



Push to the branch:

git push origin feature-name


🧑‍💻 Author

Daniel Melese
 in Web Development and Database Administration
📧 Contact: danielmelese240@gmail.com
🌐 GitHub: https://github.com/daniiiiel00

🪪 License

This project is open-source and available under the MIT License
.
