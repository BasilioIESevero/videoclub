<?php
require_once "controllers/ClienteController.php";
//recoger datos
if (!isset ($_REQUEST["id"])) header('Location:index.php?accion=create&tabla=cliente' );

$idAntiguo= ($_REQUEST["idAntiguo"])??"";//el id me servirá en editar
$arrayCliente=[
            "id"=>$_REQUEST["id"],
            "nombre"=>$_REQUEST["nombre"],
            "dni"=>$_REQUEST["dni"],
            "apellido"=>$_REQUEST["apellido"],
            "direccion"=>$_REQUEST["direccion"],
            ];
//pagina invisible
$controlador= new ClienteController();
if ($_REQUEST["evento"]=="create"){
    $controlador->create($arrayCliente);
}

if ($_REQUEST["evento"]=="editar"){
    //devuelve true si edita false si falla
    $controlador->update($arrayCliente, $idAntiguo);
}
?>