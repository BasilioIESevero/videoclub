<?php
require_once "assets/php/funciones.php";
$cadenaErrores="";
$cadena="";
$errores=[];
$datos=[];
$visibilidad="invisible";
if (isset($_REQUEST["error"])){
    $errores=($_SESSION["errores"])??[];
    $datos=($_SESSION["datos"])??[];
    $cadena="Atención Se han producido Errores";
    $visibilidad="visible";
    
}
?>
<div class="alert alert-danger <?=$visibilidad?>" ><?=$cadena?></div>
<form action="index.php?accion=store&evento=create&tabla=cliente" method="POST">
  <div class="form-group">
    <label for="nombre">Cliente </label>
    <input type="text"  required class="form-control" id="nombre" name="nombre" aria-describedby="nombre" placeholder="Introduce nombre" value="<?= $_SESSION["datos"]["nombre"]??"" ?>"
    <?=isset($errores["nombre"])?'<div class="alert alert-danger" role="alert">'. DibujarErrores($errores,"nombre").'</div>':"";?>
  </div>
  <div class="form-group">
  <label for="dni">DNI </label>
    <input type="text" class="form-control" id="dni" name="dni" placeholder="Introduce el dni del cliente" value="<?= $_SESSION["datos"]["dni"]??"" ?>">
    <?=isset($errores["dni"])?'<div class="alert alert-danger" role="alert">'. DibujarErrores($errores,"dni").'</div>':"";?>
  </div>
  <div class="form-group">
  <label for="apellido">Apellido de Cliente </label>
  <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Introduce el apellido del cliente" value="<?= $_SESSION["datos"]["dni"]??"" ?>">
    <?=isset($errores["apellido"])?'<div class="alert alert-danger" role="alert">'. DibujarErrores($errores,"apellido").'</div>':"";?>
  </div>
  <div class="form-group">
  <label for="direccion">Direccion de Cliente </label>
  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Introduce el direccion del cliente" value="<?= $_SESSION["datos"]["dni"]??"" ?>">
    <?=isset($errores["direccion"])?'<div class="alert alert-danger" role="alert">'. DibujarErrores($errores,"direccion").'</div>':"";?>
  </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  <a class="btn btn-danger" href="index.php">Cancelar</a>
</form>

<?php
$_SESSION=[];
?>
