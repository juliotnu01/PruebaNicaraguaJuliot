<?php

class conexion
{
    protected $conexion;

    public function __construct()
    {
        try {
            $this->conexion = new PDO('mysql:host=127.0.0.1;dbname=pruebaNicaragua', 'root', 'asdasdasd');
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function consultarQuery($sql)
    {
        try {
            if ($this->conexion) {
                $consulta = $this->conexion->prepare($sql);
                $consulta->execute();
                $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return  $resultados;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function cerrarConexion()
    {
        $this->conexion = null;
    }
    public function insertData($table, $data)
    {
        try {
            $columns = implode(",", array_keys($data));
            $values  = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
            $stmt = $this->conexion->prepare($sql);
            foreach ($data as $key => &$val) {
                $stmt->bindParam(":$key", $val);
            }
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
    public function updateData($table, $data, $key)
    {
        try {
            $columns = implode(', ', array_map(function($key, $value) { return "$key = :$key"; }, array_keys($data), $data));
            $sql = "UPDATE {$table} SET {$columns} WHERE id = {$key}";
            $stmt = $this->conexion->prepare($sql);
            foreach ($data as $key => &$val) {
                $stmt->bindParam(":$key", $val);
            }
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
    public function DeleteRegistro($table, $data)
    {
        try {
            $columns = implode(', ', array_map(function($key, $value) { return "$key = :$key"; }, array_keys($data), $data));
            $sql = "DELETE FROM {$table}  WHERE {$columns} ";
            $stmt = $this->conexion->prepare($sql);
            foreach ($data as $key => &$val) {
                $stmt->bindParam(":$key", $val);
            }
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
