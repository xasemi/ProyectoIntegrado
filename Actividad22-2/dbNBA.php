<?php

class dbNBA{
  //-- Variables de Identificacion --\\
  private $IP="localhost";
  private $USUARIO="root";
  private $CONTRASEÑA="root";
  private $DB="nba";

  private $conexion;
  private $error=false;


  function __construct(){
    $this->conexion = new mysqli($this->IP, $this->USUARIO, $this->CONTRASEÑA, $this->DB);
    if ($this->conexion->connect_errno){
      $this->error=true;
    }
  }
  public function getErrorConexion(){
    return $this->error;
  }
    //-- Funcion para que INSERTAR un Equipo y MOSTRARLO --\\
  public function InsertarEquipos($nombre,$ciudad,$conferencia,$division){
    $sqlInsercion="INSERT INTO equipos(Nombre,Ciudad,Conferencia,Division) Values('".$nombre."','".$ciudad."','".$conferencia."','".$division."')";
    $this->conexion->query($sqlInsercion);
    return $this->conexion->query("SELECT * FROM equipos WHERE Nombre='".$nombre."' AND Ciudad='".$ciudad."' AND Conferencia='".$conferencia."' AND Division='".$division."'");
  }
  //-- Funcion para que ACTUALIZAR un Equipo y MOSTRARLO --\\
  public function Update($nombre,$ciudad,$conferencia,$division){
    $update="UPDATE equipos SET Nombre='".$nombre."',Ciudad='".$ciudad."',Conferencia='".$conferencia."',Division='".$division."' WHERE Nombre='".$nombre."'";
    $this->conexion->query($update);
    return $this->conexion->query("SELECT * FROM equipos WHERE Nombre='".$nombre."' AND Ciudad='".$ciudad."' AND Conferencia='".$conferencia."' AND Division='".$division."'");
  }
  //-- Funcion para que ELIMINE un Equipo --\\
  public function DeleteEquipos($nombre){
    $delete="DELETE FROM equipos WHERE Nombre='".$nombre."'";
    $this->conexion->query($delete);
  }
  //-- Funcion para que Muestre la lista de Equipos --\\
  public function MostrarEquipos(){
    return $this->conexion->query("SELECT * FROM equipos");
  }
 }
 ?>
