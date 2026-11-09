# Student Management System (Sistema de Gestión de Estudiantes)

A PHP web application to register and manage university students, built with **Object-Oriented Programming (OOP)** and a MySQL database.

> **ES:** Sistema web en PHP para registrar y consultar estudiantes, desarrollado con Programación Orientada a Objetos y base de datos MySQL.

## Features

- List all students with their career, grade average and status (passed / failed).
- Add regular students or **outstanding students** with a scholarship (the scholarship field appears dynamically with JavaScript).
- View the details of each student.
- Server-side input validation (required fields, valid email, average between 0 and 100).
- PDO prepared statements against SQL injection and `htmlspecialchars()` against XSS.

## OOP concepts applied

| Concept | Where |
|---|---|
| **Encapsulation** | `Estudiante` keeps its attributes `private` and exposes getters. |
| **Inheritance** | `EstudianteDestacado extends Estudiante` and adds a scholarship. |
| **Polymorphism** | `EstudianteDestacado` overrides `obtenerEstado()` to include the scholarship. |
| **Static members** | `GestorEstudiantes::$totalConsultas` counts the queries made to the database. |
| **Separation of concerns** | `GestorEstudiantes` handles all database access; pages only handle the interface. |

## Tech stack

PHP 8 (OOP) · MySQL · PDO · JavaScript · HTML/CSS

## Project structure

```
sistema-estudiantes/
├── clases/
│   ├── Estudiante.php            # Base class
│   ├── EstudianteDestacado.php   # Child class (inheritance)
│   └── GestorEstudiantes.php     # Database access (save, list, find by ID)
├── database/estudiantes_db.sql   # Database schema
├── includes/                     # DB connection, header and footer
├── css/estilos.css
├── js/script.js                  # Shows/hides the scholarship field
├── index.php                     # Student list
├── agregar.php                   # Add a student
└── detalle.php                   # Student details
```

## How to run it locally

1. Install [XAMPP](https://www.apachefriends.org/) (Apache + MySQL + PHP).
2. Copy the `sistema-estudiantes` folder into `xampp/htdocs/`.
3. Open phpMyAdmin and import `database/estudiantes_db.sql`.
4. Go to `http://localhost/sistema-estudiantes/`.

## Authors

Team project for *Programming III (INFO-106)* at Universidad Hispanoamericana, Costa Rica:

- **Dylan Astorga**
- Ariana Ramírez
- Juan Pablo Vélez
