<?php

require_once __DIR__ . "/Estudiante.php";
require_once __DIR__ . "/EstudianteDestacado.php";

class GestorEstudiantes
{
    private $pdo;

    private static $totalConsultas = 0;

    /// <summary>
    /// Constructor de la clase
    /// </summary>
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /// <summary>
    /// Guarda un estudiante en la base de datos
    /// </summary>
    public function guardar(Estudiante $e)
    {
        $esDestacado = 0;
        $beca = null;

        if ($e instanceof EstudianteDestacado)
        {
            $esDestacado = 1;
            $beca = $e->getBeca();
        }

        $sql = "INSERT INTO estudiantes
                (nombre, correo, carrera, promedio, es_destacado, beca)
                VALUES
                (:nombre, :correo, :carrera, :promedio, :es_destacado, :beca)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ":nombre" => $e->getNombre(),
            ":correo" => $e->getCorreo(),
            ":carrera" => $e->getCarrera(),
            ":promedio" => $e->getPromedio(),
            ":es_destacado" => $esDestacado,
            ":beca" => $beca
        ]);
    }

    /// <summary>
    /// Obtiene todos los estudiantes
    /// </summary>
    public function obtenerTodos()
    {
        self::$totalConsultas++;

        $lista = [];

        $sql = "SELECT * FROM estudiantes";

        $stmt = $this->pdo->query($sql);

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            if ($fila["es_destacado"] == 1)
            {
                $estudiante = new EstudianteDestacado(
                    $fila["nombre"],
                    $fila["correo"],
                    $fila["carrera"],
                    $fila["promedio"],
                    $fila["beca"]
                );
            }
            else
            {
                $estudiante = new Estudiante(
                    $fila["nombre"],
                    $fila["correo"],
                    $fila["carrera"],
                    $fila["promedio"]
                );
            }

            $estudiante->setId($fila["id"]);

            $lista[] = $estudiante;
        }

        return $lista;
    }

    /// <summary>
    /// Busca un estudiante por ID
    /// </summary>
    public function buscarPorId($id)
    {
        self::$totalConsultas++;

        $sql = "SELECT * FROM estudiantes WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ":id" => $id
        ]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$fila)
        {
            return null;
        }

        if ($fila["es_destacado"] == 1)
        {
            $estudiante = new EstudianteDestacado(
                $fila["nombre"],
                $fila["correo"],
                $fila["carrera"],
                $fila["promedio"],
                $fila["beca"]
            );
        }
        else
        {
            $estudiante = new Estudiante(
                $fila["nombre"],
                $fila["correo"],
                $fila["carrera"],
                $fila["promedio"]
            );
        }

        $estudiante->setId($fila["id"]);

        return $estudiante;
    }

    /// <summary>
    /// Devuelve el total de consultas realizadas
    /// </summary>
    public static function getTotalConsultas()
    {
        return self::$totalConsultas;
    }
}