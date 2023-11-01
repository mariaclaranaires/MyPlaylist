<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>My Playlist</title>
    <meta charset="utf-8"/>
  </head>

  <body>
    <h1>Insira uma música na playlist</h1>

    <form action="index.php" method="post">
        <label for="musica">Música:</label><br>
        <input type="text" id="musica" name="musica"><br><br>
        <label for="artista">Artista:</label><br>
        <input type="text" id="artista" name="artista"><br><br>
        <label for="estilo">Estilo:</label><br>
        <input type="text" id="estilo" name="estilo"><br><br>

        <input type="submit" value="Cadastrar">
    </form><br><br>

    <br>
    <a href="index.php?listar"><button type="button">Listar músicas</button></a><br><br>
  </body>
  
</html>

<?php
require ("vendor/autoload.php");
require ("src/controller/MusicaController.php");

use controller\MusicaController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $musica = $_POST['musica'];
    $artista = $_POST['artista'];
    $estilo = $_POST['estilo'];
    $musicaController = new MusicaController();
    $data = $musicaController->insertMusica($musica, $artista, $estilo);
} 
?>