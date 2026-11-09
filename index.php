<?php

require_once __DIR__ . "/includes/db.php";
require_once __DIR__ . "/clases/Estudiante.php";
require_once __DIR__ . "/clases/EstudianteDestacado.php";
require_once __DIR__ . "/clases/GestorEstudiantes.php";

$gestor = new GestorEstudiantes($pdo);

$estudiantes = $gestor->obtenerTodos();

include "includes/header.php";

?>

<h2>Lista de Estudiantes</h2>

<a href="agregar.php">Agregar Estudiante</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Carrera</th>
        <th>Promedio</th>
        <th>Estado</th>
        <th>Detalle</th>
    </tr>

    <?php foreach($estudiantes as $e){ ?>

    <tr>

        <td><?php echo (int) $e->getId(); ?></td>

        <td><?php echo htmlspecialchars($e->getNombre()); ?></td>

        <td><?php echo htmlspecialchars($e->getCarrera()); ?></td>

        <td><?php echo htmlspecialchars($e->getPromedio()); ?></td>

        <td><?php echo htmlspecialchars($e->obtenerEstado()); ?></td>

        <td>

            <a href="detalle.php?id=<?php echo (int) $e->getId(); ?>">

                Ver

            </a>

        </td>

    </tr>

    <?php } ?>

</table>

<br>

<h3>

Total de consultas:
<?php echo GestorEstudiantes::getTotalConsultas(); ?>

</h3>

<?php

include "includes/footer.php";

?>