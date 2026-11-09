<?php

require_once __DIR__ . "/includes/db.php";
require_once __DIR__ . "/clases/Estudiante.php";
require_once __DIR__ . "/clases/EstudianteDestacado.php";
require_once __DIR__ . "/clases/GestorEstudiantes.php";

$gestor = new GestorEstudiantes($pdo);

if (!isset($_GET["id"]))
{
    die("ID no recibido.");
}

$id = (int) $_GET["id"];

$estudiante = $gestor->buscarPorId($id);

include "includes/header.php";

?>

<h2>Detalle del Estudiante</h2>

<?php if($estudiante != null){ ?>

<p>
    <strong>ID:</strong>
    <?php echo (int) $estudiante->getId(); ?>
</p>

<p>
    <strong>Nombre:</strong>
    <?php echo htmlspecialchars($estudiante->getNombre()); ?>
</p>

<p>
    <strong>Correo:</strong>
    <?php echo htmlspecialchars($estudiante->getCorreo()); ?>
</p>

<p>
    <strong>Carrera:</strong>
    <?php echo htmlspecialchars($estudiante->getCarrera()); ?>
</p>

<p>
    <strong>Promedio:</strong>
    <?php echo htmlspecialchars($estudiante->getPromedio()); ?>
</p>

<p>
    <strong>Estado:</strong>
    <?php echo htmlspecialchars($estudiante->obtenerEstado()); ?>
</p>

<?php
if($estudiante instanceof EstudianteDestacado)
{
?>

<p>
    <strong>Beca:</strong>
    <?php echo htmlspecialchars($estudiante->getBeca()); ?>
</p>

<?php
}
?>

<?php
}
else
{
    echo "<p>El estudiante no existe.</p>";
}
?>

<br>

<a href="index.php">Volver al inicio</a>

<?php

include "includes/footer.php";

?>