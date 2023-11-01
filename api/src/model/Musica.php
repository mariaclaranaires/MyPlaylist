<?php
namespace model;
require ("vendor/autoload.php");
use connection\Connection;
use PDO; 

class Musica {

    public function insertMusica($musica, $artista, $estilo) {
        $connection = new Connection();
        $resultado = $connection -> getConnection()->query("INSERT INTO musicas (musica, artista, estilo) VALUES ('$musica', '$artista', '$estilo' )");
        $resultado = $resultado -> fetchAll (PDO::FETCH_ASSOC);
        return isset($resultado[0]) ? $resultado : 0;

    }
}