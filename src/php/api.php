<?php
require __DIR__ ."/app.php";

class Api extends Query {
    public function getAll() {
        return $this->ejecutarConsulta("SELECT * FROM usuarios");
    }
    public function storeData($table, $data) {
        return $this->ejecutarInsertConsulta($table, $data);
    }
    public function EditData($table, $data, $key) {
        return $this->ejecutarUpdateConsulta($table, $data, $key);
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
    
}

$api = new Api();


for ($i = 0; $i < 10; $i++) {
    $registros[] = [
        'nombre' => $api->generarNombre(),
        'apellido' => $api->generarApellido(),
        'edad' => $api->generarEdad(),
    ];
}
$cantidadRegistros = count($api->getall());
foreach ($registros as $key => $value) {
    if($cantidadRegistros >= 10){
        $api->EditData("usuarios", $registros[$key], $key+1);
    }else{
        $api->storeData("usuarios", $registros[$key]);
    }

}
$json = json_encode($api->getAll());

echo $json;
