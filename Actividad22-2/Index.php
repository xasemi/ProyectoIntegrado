<?php
include"dbNBA.php";

$nba= new dbNBA();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inserccion_DB Actividad 22</title>
    <link rel="stylesheet" href="master.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
  <body>
    <nav>
      <ul>
        <li><a class="active" href="Index.php">Inicio</a></li>
        <li><a href="listaEquipos.php">Lista de equipos</a></li>
      </ul>
    </nav>
    <section id="caja">
      <?php
      //-- En este IF especificamos que si NO Actualizamos ningun equipo nos salga este Formulario --\\
      if (empty($_GET)) {
      ?>
      <fieldset>
      <legend>Inserccion de Equipos</legend>
        <form action="insertarDB.php" method="post">
          <input type="hidden" value="input" name="tipo" />

          <label>Nombre: </label><br>
          <input type="text" name="Nombre" value="" placeholder="Introduce un Nombre"><br>

          <label>Ciudad: </label><br>
          <input type="text" name="Ciudad" value=""  placeholder="Introduce una Ciudad"><br>

          <label>Conferencia: </label><br>
          <input type="text" name="Conferencia" value="" placeholder="Introduce una Conferencia"><br>

          <label>Division: </label><br>
          <input type="text" name="Division" value="" placeholder="Introduce una Conferencia"><br>
          <br>
          <input type="submit" value="Insertar">
        </form>
        </fieldset>
      <?php
      }
       ?>

        <?php
        //-- En este IF indicamos que si le hemos dado a actualizar a un Equipo que nos envie a este Formulario y asi el INPUT de nombre este Inactivo --\\
        if (!empty($_GET)) {

        ?>
      <fieldset>
      <legend>Busqueda y Inserccion de Equipos</legend>
        <form action="actualizarDB.php" method="post">
          <input type="hidden" value="input" name="tipo" />
          <!-- En el value llamamos al metodo GET para que pueda recibir la informacion de un equipo que queremos actualizar -->
          <label>Nombre: </label><br>
          <input type="text" name="Nombre" value="<?=$_GET['Nombre'];?>" readonly="readonly"><br><!--readonly Sirve para que el Campo no se puede modificar-->

          <label>Ciudad: </label><br>
          <input type="text" name="Ciudad" value="<?=$_GET["Ciudad"]?>"><br>

          <label>Conferencia: </label><br>
          <input type="text" name="Conferencia" value="<?=$_GET["Conferencia"]?>"><br>

          <label>Division: </label><br>
          <input type="text" name="Division" value="<?=$_GET["Division"]?>"><br>
          <br>
          <input type="submit" value="Actualizar">
        </form>
      </fieldset>
        <?php
        }
        ?>

    </section>
</body>
</html>
