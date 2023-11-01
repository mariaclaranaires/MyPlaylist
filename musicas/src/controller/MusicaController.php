<?php
namespace controller;
require ("vendor\autoload.php");
use connection\APIConnection;

class MusicaController {
    public function insertMusica($musica, $artista, $estilo) {
        $api = new APIConnection();
        $url = "/musicas/inserir";
        $data = json_encode(["musica" => $musica, "artista" => $artista, "estilo" => $estilo]);
        $response = $api->requestApi($url, "POST", $data);
        echo "$response";
        return $response; 
    }

    public function getMusicas() {
        $api = new APIConnection();
        $url = "/musicas/listar";
        $response = $api->requestApi($url, "GET");
        return $response; 
    }
}