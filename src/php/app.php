<?php

require_once __DIR__ . "/db/conexion.php";

class Query extends MiConexionMySQLi {
    public function getResults($query) {
        
        $resultado = $this->ejecutarConsulta($query);
        // $this->cerrarConexion();
    }

    public function insertData($table, $data) {
        

        $columns = implode(", ", array_keys($data));
        $values  = ":" . implode(", :", array_keys($data));
        var_dump($columns, $values);
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";

        print_r($sql);

        // $stmt = $this->conn->prepare($sql);


        // foreach ($data as $key => &$val) {
        //     $stmt->bindParam(":$key", $val);
        // }

        // $stmt->execute();
    }
}

