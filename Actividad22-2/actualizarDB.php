<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Actualizacion de Equipo</title>
  <link rel="stylesheet" href="master.css">
</head>
<body>
  <nav>
    <ul>
      <li><a  href="Index.php">Inicio</a></li>
      <li><a  href="listaEquipos.php">Lista de equipos</a></li>
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
      if(isset($_POST) && (!empty($_POST))){
        //-- LLamamos a la Funcion Update para que Actualice y que MUESTRE --\\
        $Update=$nba->Update($_POST["Nombre"],$_POST["Ciudad"],$_POST["Conferencia"],$_POST["Division"]);
        ?>
        <h3>Su equipo ha sido actualizado</h3>
        <center>
          <table >
            <tr>
              <th>Nombre</th>
              <th>Ciudad</th>
              <th>Conferencia</th>
              <th>Division</th>
              <th>Actualizar</th>
              <th>Borrar</th>
            </tr>


            <?php
            while ($fila=$Update->fetch_assoc()) {
              echo "<tr>";
                echo "<td>".$fila["Nombre"]."</td>";
                echo "<td>".$fila["Ciudad"]."</td>";
                echo "<td>".$fila["Conferencia"]."</td>";
                echo "<td>".$fila["Division"]."</td>";
                //-- Las dos siguientes etiquetas sirven para enviar Informacion por via GET para que podamos Actualizar o Borrar --\\
                //-- Actualizar --\\
                echo "<td>"."<a href='Index.php?Nombre=".$fila["Nombre"]."&Ciudad=".$fila["Ciudad"]."&Conferencia=".$fila["Conferencia"]."&Division=".$fila["Division"]."'>Actualizar Registro</a>"."</td>";
                //-- Borrar --\\
                echo "<td>"."<a href='borrarDB.php?Nombre=".$fila['Nombre']."&Ciudad=".$fila['Ciudad']."&Conferencia=".$fila['Conferencia']."&Division=".$fila['Division']."'>BORRAR</a>"."</td>";
              echo "</tr>";

            }

          }

        }
        ?>

      </section>
    </body>
    </html>
