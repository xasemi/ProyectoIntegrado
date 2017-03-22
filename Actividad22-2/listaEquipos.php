<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista de los Eqeuipos de NBA</title>
    <link rel="stylesheet" href="master.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
  <body>
    <nav>
      <ul>
        <li><a  href="Index.php">Inicio</a></li>
        <li><a  class="active" href="listaEquipos.php">Lista de equipos</a></li>
      </ul>
    </nav>
    <section id="caja">
      <?php
      include"dbNBA.php";
      $nba= new dbNBA();
      if ($nba->getErrorConexion()==true) {
        echo "No hay conexion";
      }
      else {
        //-- En esta funcion MostrarEquipos mostramos todos Los Equipos de la NBA --\\
          $resultado=$nba->MostrarEquipos();
          ?>
          <center>
            <h3>Equipos de la NBA</h3>
          <table border=1>
          <tr>
            <th>Equipo</th>
            <th>Ciudad</th>
            <th>Conferencia</th>
            <th>Division</th>
            <th>Borrar</th>
          </tr>

          <?php
          while ($fila=$resultado->fetch_assoc()) {
            echo "<tr>";
              echo"<td>".$fila['Nombre']."</td>";
              echo"<td>".$fila['Ciudad']."</td>";
              echo"<td>".$fila['Conferencia']."</td>";
              echo"<td>".$fila['Division']."</td>";
              //-- Aqui le decimos que Borre un equipo de la Fila en la que esta situada --\\
              echo "<td>"."<a href='borrarDB.php?Nombre=".$fila['Nombre']."&Ciudad=".$fila['Ciudad']."&Conferencia=".$fila['Conferencia']."&Division=".$fila['Division']."'>BORRAR</a>"."</td>";
            echo "</tr>";

          }


        }
         ?>

        </section>
  </body>
</html>
