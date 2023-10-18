<?php

require_once __DIR__ ."/app.php";


class Persona  extends Query
{
    public $nombre;
    public $apellido;
    public $edad;

    public function __construct()
    {
        $this->nombre = $this->generarNombre();
        $this->apellido = $this->generarApellido();
        $this->edad = $this->generarEdad();
    }

    public function generarNombre()
    {
        $nombres = ["Ana", "Carlos", "Diana", "Enrique", "Felipe", "Gabriela", "Hector", "Isabel", "Juan", "Karina"];
        return $nombres[rand(0, count($nombres) - 1)];
    }

    public function generarApellido()
    {
        $apellidos = ["Pérez", "García", "Rodríguez", "López", "Sánchez", "Martínez", "Torres", "González", "Núñez", "Castro"];
        return $apellidos[rand(0, count($apellidos) - 1)];
    }

    public function generarEdad()
    {
        return rand(18, 65);
    }

    public function  test()
    {   
        $this->getResults('select * from usuarios');
    }
    
}



$persona = new Persona();
$sql = "SELECT * FROM usuarios";
$persona->getResults($sql);
for ($i = 0; $i < 10; $i++) {
    // $registros[] = [
    //     'nombre' => $persona->generarNombre(),
    //     'apellido' => $persona->generarApellido(),
    //     'edad' => $persona->generarEdad(),
    // ];
}
// $json = json_encode($registros);

// foreach ($registros as $key => $value) {
    
// }
// echo $json;
