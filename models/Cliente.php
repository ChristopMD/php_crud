<?php

    require_once "connection/Connection.php";

    class Cliente {
        public static function getAll(){
            $db = new Connection();
            $query = "SELECT * FROM Clients";
            $result = $db -> query($query);
            $datos = [];
            if($result -> num_rows) {
                while($row = $result->fetch_assoc()){
                    $datos[] =  [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'fecha_de_nacimiento' => $row['fecha_de_nacimiento'],
                        'genero' => $row['genero']
                    ];

                }
                return $datos;
            }
            return $datos;
        }

        public static function getById($id_cliente){
            $db = new Connection();
            $query = "SELECT * FROM Clients Where id = $id_cliente";
            $result = $db -> query($query);
            $datos = [];
            if($result -> num_rows) {
                while($row = $result->fetch_assoc()){
                    $datos[] =  [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'fecha_de_nacimiento' => $row['fecha_de_nacimiento'],
                        'genero' => $row['genero']
                    ];

                }
                return $datos;
            }
            return $datos;
        }

        public static function insert($nombre, $apellido, $fecha_de_nacimiento, $genero) {
            $db = new Connection();
            $query = "INSERT INTO Clients (nombre, apellido, fecha_de_nacimiento, genero)
            VALUES('".$nombre."', '".$apellido."', '".$fecha_de_nacimiento."', '".$genero."')";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        public static function updateById($id_cliente, $nombre, $apellido, $fecha_de_nacimiento, $genero) {
            $db = new Connection();
            $query = "UPDATE Clients SET
            nombre = '".$nombre."', apellido = '".$apellido."', fecha_de_nacimiento = '".$fecha_de_nacimiento."', genero = '".$genero."'
            WHERE id = $id_cliente";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        public static function deleteById($id_cliente){
            $db = new Connection();
            $query = "DELETE FROM Clients WHERE id = $id_cliente";
            $db->query($query);
            if($db->affected_rows){
                return TRUE;
            }
            return FALSE;

        }
    }