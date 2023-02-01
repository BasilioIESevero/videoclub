<?php
require_once "controllers/ClienteController.php";

$mensaje = "";
$clase = "alert alert-success";
$visibilidad = "hidden";

$controlador = new ClienteController();
$clientes = $controlador->listAll();

if (isset($_REQUEST["evento"]) && $_REQUEST["evento"] == "borrar") {
  $visibilidad = "visibility";
  $clase = "alert alert-success";
  //Mejorar y poner el nombre/usuario
  $mensaje = "El cliente con Numero de cliente: {$_REQUEST['id']} Borrado correctamente";
  if (isset($_REQUEST["error"])) {
    $clase = "alert alert-danger ";
    $mensaje = "ERROR!!! No se ha podido borrar la pieza con Numero de Pieza: {$_REQUEST['id']}";
  }
}
?>
<div class="<?= $clase?>" <?=$visibilidad?> role="alert">
  <?= $mensaje?>
</div>


<table class="table table-light table-hover">
<thead class="table-dark">
    <tr>
      <th scope="col">ID de cliente</th>
      <th scope="col">Nombre Cliente</th>
      <th scope="col">DNI de cliente</th>
      <th scope="col">Apellido de cliente</th>
      <th scope="col">Direccion de cliente</th>
      <th></th><th></th>

    </tr>
  </thead>
  <tbody>
<?php foreach($clientes as $id=>$cliente):
  ?>
    <tr>
      <td><?=$id?></td>
      <td><?=$cliente->get_nombre()?></td>
      <td><?=$cliente->get_apellido()?></td>
      <td><?=$cliente->get_dni()?></td>
      <td><?=$cliente->get_direccion()?></td>
      <td><a class="btn btn-danger" href="index.php?accion=delete&tabla=cliente&id=<?=$id?>"><i class="fa fa-trash"></i> Borrar</a></td>
      <td><a class="btn btn-success" href="index.php?accion=edit&tabla=cliente&id=<?=$id?>"><i class="fa fa-pencil"></i> Editar</a></td>
    </tr>
<?php 
    endforeach;

    ?>
  </tbody>
</table>
