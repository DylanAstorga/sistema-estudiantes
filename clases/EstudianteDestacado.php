<?php

require_once __DIR__ . "/Estudiante.php";

class EstudianteDestacado extends Estudiante
{
    private $beca;

    /// <summary>
    /// Constructor de la clase EstudianteDestacado
    /// </summary>
    public function __construct($nombre, $correo, $carrera, $promedio, $beca)
    {
        parent::__construct($nombre, $correo, $carrera, $promedio);
        $this->beca = $beca;
    }

    /// <summary>
    /// Obtiene la beca del estudiante
    /// </summary>
    public function getBeca()
    {
        return $this->beca;
    }

    /// <summary>
    /// Sobrescribe el método obtenerEstado()
    /// </summary>
    public function obtenerEstado()
    {
        return parent::obtenerEstado() . " - Beca: " . $this->beca;
    }
}