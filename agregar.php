<?php

require_once __DIR__ . "/includes/db.php";
require_once __DIR__ . "/clases/Estudiante.php";
require_once __DIR__ . "/clases/EstudianteDestacado.php";
require_once __DIR__ . "/clases/GestorEstudiantes.php";

$gestor = new GestorEstudiantes($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $carrera = trim($_POST["carrera"] ?? "");
    $promedio = (float) ($_POST["promedio"] ?? 0);

    // Validaciones del lado del servidor
    if ($nombre === "" || $carrera === ""
        || !filter_var($correo, FILTER_VALIDATE_EMAIL)
        || $promedio < 0 || $promedio > 100)
    {
        die("Datos inválidos. <a href='agregar.php'>Volver</a>");
    }

    if (isset($_POST["destacado"]))
    {
        $beca = trim($_POST["beca"] ?? "");

        $estudiante = new EstudianteDestacado(
            $nombre,
            $correo,
            $carrera,
            $promedio,
            $beca
        );
    }
    else
    {
        $estudiante = new Estudiante(
            $nombre,
            $correo,
            $carrera,
            $promedio
        );
    }

    $gestor->guardar($estudiante);

    header("Location: index.php");
    exit();
}

include "includes/header.php";
?>

<h2>Agregar Estudiante</h2>

<form method="post">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required>

    <br><br>

    <label>Correo:</label><br>
    <input type="email" name="correo" required>

    <br><br>

    <label>Carrera:</label><br>
    <input type="text" name="carrera" required>

    <br><br>

    <label>Promedio:</label><br>
    <input type="number" name="promedio" step="0.01" min="0" max="100" required>

    <br><br>

    <input type="checkbox" id="destacado" name="destacado">

    <label for="destacado">Estudiante Destacado</label>

    <br><br>

    <div id="divBeca">

    <label>Beca:</label><br>

    <input type="text" name="beca">

</div>

    <br><br>

    <input type="submit" value="Guardar Estudiante">

</form>

<?php
include "includes/footer.php";
?>