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
  elseif(isset($_GET['listar'])) {
            $musicaController = new MusicaController();
            $musicas = $musicaController->getMusicas();
            $musicas = json_decode($musicas);

            if($musicas) {
                echo '<h2>Playlist atual</h2>';
                echo '<table style="border:1px solid black; width:25%">';
                echo '<tr>';
                echo '<th style="border:1px solid black">Música</th>';
                echo '<th style="border:1px solid black">Artista</th>';
                echo '<th style="border:1px solid black">Estilo</th>';
                echo '</tr>';
                foreach ($musicas as $musica) {
                  echo '<tr>';
                  echo '<td style="border:1px solid black">'. $musica->musica. '</td>';
                  echo '<td style="border:1px solid black">'. $musica->artista. '</td>'; 
                  echo '<td style="border:1px solid black">'. $musica->estilo. '</td>';  
                  echo '</tr>';
              }
              echo '</table>';
            } else {
              echo '<p>Playlist vazia</p>';
            }


        }
?>