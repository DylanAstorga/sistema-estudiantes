<?php

$host = "127.0.0.1";
$dbname = "estudiantes_db";
$user = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // No se muestra el detalle técnico del error al usuario
    die("Error al conectar con la base de datos.");
}