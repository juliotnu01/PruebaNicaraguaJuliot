<?php
require __DIR__ . "/db/conexion.php";

class Query extends Conexion {
    public function ejecutarConsulta($sql) {
        return $this->consultarQuery($sql);
    }
    public function ejecutarInsertConsulta($table, $sql) {
        return $this->insertData($table, $sql);
    }
    public function ejecutarUpdateConsulta($table, $sql, $key ) {
        return $this->updateData($table, $sql, $key);
    }
    public function ejecutarDeleteConsulta($table, $sql ) {
        return $this->DeleteRegistro($table, $sql);
    }
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = new Query(); // Crea una instancia de tu clase Query
    if(isset($_POST['_metodo']) && $_POST['_metodo'] == "delete" ){
        $dato1 = $_POST["idDelete"];
        $query->ejecutarDeleteConsulta("usuarios", ["id" => $dato1]);

    }else {

        $dato1 = $_POST["nombre"];
        $dato2 = $_POST["apellido"];
        $dato3 = $_POST["edad"];
        $dato4 = $_POST["idEdit"];
        $query->ejecutarUpdateConsulta("usuarios", ["nombre" => $dato1, "apellido" => $dato2, "edad" => $dato3], $dato4);
    }

    $json = json_encode($query->ejecutarConsulta("SELECT * FROM usuarios"));

    echo $json;
}


