<?php
namespace controller;

require ("vendor\autoload.php");

use connection\Connection;
use model\Musica;

class MusicaController {

    public function insertMusica($data) {
        $musica = new Musica();
        $data = json_decode($data, true);
        
        if ($musica->insertMusica($data['musica'], $data['artista'], $data['estilo']) != 0) {
            return json_encode(["sucesso" => "Adicionada com sucesso!"]);
        } else {
            return json_encode(["erro" => "Erro ao inserir!"]);

        }
    }

}