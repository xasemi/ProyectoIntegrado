<?php
include"dbNBA.php";

$nba= new dbNBA();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Informacion de su Equipo Borrado</title>
    <link rel="stylesheet" href="master.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
  <body>
    <nav>
      <ul>
        <li><a  href="Index.php">Inicio</a></li>
        <li><a  href="listaEquipos.php">Lista de equipos</a></li>
      </ul>
    </nav>
    <section id="caja">
      <fieldset>
      <legend>Equipo Borrado</legend>
        <?php
        //-- Llamamos a la Funcion DeleteEquipos para que elimine el Equipo que haviamos seleccionado --\\
        $nba->DeleteEquipos($_GET['Nombre']);
        $Nombre=$_GET['Nombre'];
        $Ciudad=$_GET['Ciudad'];
        $Conferencia=$_GET['Conferencia'];
        $Division=$_GET['Division'];
        //-- Mostramos las cosas que tenia el Equipo antes de ser Eliminado --\\
        echo "Equipo: ".$Nombre."<br>"."Ciudad que Tenia asignado el equipo es: ".$Ciudad."<br>"."La conferencia del equipo es: ".$Conferencia."<br>"."Su division era: ".$Division."<br>";


         ?>
      </fieldset>
    </section>
</body>
</html>
