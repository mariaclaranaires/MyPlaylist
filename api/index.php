<?php
header("Access-Control-Allow-Origin: http://localhost");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");


require ("vendor/autoload.php");

$method = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];


if ($method == 'POST'){
    switch ($url){
        case '/musicas/inserir':
            $musicaController = new controller\MusicaController();
            $response =  $musicaController -> insertMusica(file_get_contents("php://input"));
            echo $response;
            break;
        default:
            echo (json_encode($data = [
                "status" => 404,
                "message" => "Rota $url nao encontrada"
        ]));
    }
}