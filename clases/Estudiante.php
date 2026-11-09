<?php

class Estudiante
{
    private $id;
    private $nombre;
    private $correo;
    private $carrera;
    private $promedio;

    /// <summary>
    /// Constructor de la clase Estudiante
    /// </summary>
    public function __construct($nombre, $correo, $carrera, $promedio)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->carrera = $carrera;
        $this->promedio = $promedio;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getCarrera()
    {
        return $this->carrera;
    }

    public function getPromedio()
    {
        return $this->promedio;
    }

    /// <summary>
    /// Verifica si el estudiante aprobó
    /// </summary>
    public function estaAprobado()
    {
        return $this->promedio >= 70;
    }

    /// <summary>
    /// Devuelve el estado del estudiante
    /// </summary>
    public function obtenerEstado()
    {
        return $this->estaAprobado() ? "Aprobado" : "Reprobado";
    }

    /// <summary>
    /// Convierte el objeto en un arreglo asociativo
    /// </summary>
    public function toArray()
    {
        return [
            "id" => $this->id,
            "nombre" => $this->nombre,
            "correo" => $this->correo,
            "carrera" => $this->carrera,
            "promedio" => $this->promedio
        ];
    }
}