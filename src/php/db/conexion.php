<?php

class MiConexionMySQLi extends mysqli
{
    private $host;
    private $usuario;
    private $contrasena;
    private $base_datos;
    public $conexion;

    public function __construct($host, $usuario, $contrasena, $base_datos) {
        $this->host = $host;
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        $this->base_datos = $base_datos;

        $this->conexion = parent::__construct("127.0.0.1", "root", "", "pruebaNicaragua", 3306);
        var_dump($this->conexion);
        $this->query("SET NAME 'utf8';");
        $this->connect_errno ? die('Error en la conexion') : $c = 'Conectado' ;
        
    }

    public function ejecutarConsulta($sql)
    {
        
        // if ($this->conexion) {
        //     $resultado = $this->conexion->query($sql);

        //     if (!$resultado) {
        //         die("Error en la consulta: " . $this->conexion->error);
        //     }

        //     return $resultado;
        // } else {
        //     die("La conexión a la base de datos no se ha establecido correctamente.");
        // }
    }

    public function cerrarConexion()
    {
        // $this->conexion->close();
    }
}

// Ejemplo de uso:
$host = "127.0.0.1";
$usuario = "root";
$contrasena = "";
$base_datos = "pruebaNicaragua";

$conexion = new MiConexionMySQLi($host, $usuario, $contrasena, $base_datos);
