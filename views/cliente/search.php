<?php
require_once "controllers/ClienteController.php";

$mensaje = "";
$clase = "alert alert-success";
$visibilidad = "hidden";
$mostrarDatos=false;
$controlador = new ClienteController();
$texto="";

if (isset($_REQUEST["evento"])){
  $mostrarDatos=true;
  switch ($_REQUEST["evento"]){
    case "todos":
      $clientes = $controlador->listAll();
      $mostrarDatos=true;
      break;
    case "filtrar":
      $texto=($_REQUEST["busqueda"])??"";
      $clientes = $controlador->list($texto);
      break;
    case "remove":
      $visibilidad = "visibility";
      $mostrarDatos=true;
      $clase = "alert alert-success";
      //Mejorar y poner el nombre/usuario
      $mensaje = "La cliente con id: {$_REQUEST['id']} Borrado correctamente";
      if (isset($_REQUEST["error"])) {
          $clase = "alert alert-danger ";
          $mensaje = "ERROR!!! No se ha podido borrar la cliente con Numero de cliente: {$_REQUEST['id']}";
      }
      break;
    }
}
    
  ?>
<div class="<?= $clase ?>" <?= $visibilidad ?> role="alert">
  <?= $mensaje ?>
</div>

<form action="index.php?accion=buscar&tabla=cliente&evento=filtrar" method="POST">
<div class="form-group">
    <label for="busqueda">Buscar cliente</label>
    <input type="text" required class="form-control" id="busqueda" name="busqueda"
    value="<?=$texto?>" placeholder="Buscar por Numero de cliente">
  </div>
     <button type="submit" class="btn btn-success" name="Filtrar">Buscar</button>
</form>
    <!-- Este formulario es para ver todos los datos    -->
<form action="index.php?accion=buscar&tabla=cliente&evento=todos" method="POST">
    <button type="submit" class="btn btn-info" name="Todos">Ver todos</button>
</form>

<?php 
if ($mostrarDatos){
  ?>
<table class="table table-light table-hover">
<thead class="table-dark">
    <tr>
      <th scope="col">Numero de cliente</th>
      <th scope="col">Nombre de cliente</th>
      <th scope="col">Precio </th>
      <th></th><th></th>

    </tr>
  </thead>
  <tbody>
<?php foreach($clientes as $cliente):
        $id=$cliente["id"];
  ?>
    <tr>
      <td><?=$cliente["id"]?></td>
      <td><?=$cliente["nombre"]?></td>
      <td><?=$cliente["dni"]?></td>
      <td><?=$cliente["apellido"]?></td>
      <td><?=$cliente["direccion"]?></td>
      <td><a class="btn btn-danger" href="index.php?accion=borrar&tabla=cliente&id=<?=$id?>"><i class="fa fa-trash"></i> Borrar</a></td>
      <td><a class="btn btn-success" href="index.php?accion=editar&tabla=cliente&id=<?=$id?>"><i class="fa fa-pencil"></i> Editar</a></td>
    </tr>
<?php 
    endforeach;

    ?>
  </tbody>
</table>

<?php
}
?>
