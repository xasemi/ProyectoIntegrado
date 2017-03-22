<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Equipo Insertado</title>
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
    <?php
    include"dbNBA.php";
    $nba= new dbNBA();
    if ($nba->getErrorConexion()==true) {
      echo "No hay conexion";
    }
    else {
      if(isset($_POST) && (!empty($_POST))){
        //-- Llamamos a la Funcion InsertarEquipos para que Inserte el Equipo y que lo muestre --\\
        $insertar=$nba->InsertarEquipos($_POST["Nombre"],$_POST["Ciudad"],$_POST["Conferencia"],$_POST["Division"]);
        ?>
        <center>
          <table border="1">
            <tr>
              <th>Nombre</th>
              <th>Ciudad</th>
              <th>Conferencia</th>
              <th>Division</th>
              <th>Actualizar</th>
              <th>Borrar</th>
            </tr>


            <?php
            //-- Mostramos el Equipo INSERTADO --\\
            while ($fila=$insertar->fetch_assoc()) {
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
