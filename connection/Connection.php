<?php

    class Connection extends Mysqli {
        
        function __construct() {
            parent::__construct('localhost', 'root', 'root', 'api_crud');
            $this -> set_charset('utf8');
            $this -> connect_error == NULL ? 'Conexion exitosa a la BD' : die('Error al conectarse a la BD');

        }
    }
    