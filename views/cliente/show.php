<?php
require_once "controllers/ClienteController.php";
if (!isset($_REQUEST['id'])){
    header ("location:index.php");
}
$id=$_REQUEST['id'];
$controlador= new ClienteController();
$cliente= $controlador->get($id);
?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">cliente: ID: <?=$cliente["nombre"]?> NOMBRE: <?=$cliente["nombre"]?></h5>
    <p class="card-text">
        Nombre: <?=$cliente["nombre"]?>
        DNI: <?=$cliente["dni"] ?>
        Apellido: <?=$cliente["apellido"] ?>
        Direccion: <?=$cliente["direccion"] ?>
    </p>
    <a href="index.php" class="btn btn-primary">Volver a Inicio</a>
  </div>
</div>