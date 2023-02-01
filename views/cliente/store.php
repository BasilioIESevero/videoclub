<?php
require_once "controllers/ClienteController.php";
//recoger datos
if (!isset ($_REQUEST["id"])) header('Location:index.php?accion=include&tabla=cliente' );

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
if ($_REQUEST["evento"]=="include"){
    $controlador->include($arrayCliente);
}

if ($_REQUEST["evento"]=="edit"){
    //devuelve true si edita false si falla
    $controlador->edit($arrayCliente, $idAntiguo);
}
?>