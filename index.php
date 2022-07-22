<?php
    require_once "models/Cliente.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if (isset($_GET['id'])) {
                echo json_encode(Cliente::getById($_GET['id']));
            }
            else{
                echo json_encode(Cliente::getAll());
            }
            break;
        
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                if (Cliente::insert($datos->nombre, $datos->apellido, $datos->fecha_de_nacimiento, $datos->genero)) {
                    http_response_code(200);
                }
                else {
                    http_response_code(400);
                }
            }
            else {
                http_response_code(405);
            }
            break;
        
        case 'PUT':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != NULL) {
                if (Cliente::updateById($datos->id, $datos->nombre, $datos->apellido, $datos->fecha_de_nacimiento, $datos->genero)) {
                    http_response_code(200);
                }
                else {
                    http_response_code(400);
                }
            }
            else {
                http_response_code(405);
            }
            break;
        
        case 'DELETE':
            if (isset($_GET['id'])) {
                if(Cliente::deleteById($_GET['id'])){
                    http_response_code(200);
                }
                else{
                    http_response_code(400);
                }
            }
            else{
                http_response_code(405);
            }
            break;

            default:
            http_response_code(405);
            break;
    }