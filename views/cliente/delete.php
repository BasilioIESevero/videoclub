<?php
require_once "controllers/ClienteController.php";
//pagina invisible
if (!isset ($_REQUEST["id"])) header('Location:index.php' );
//recoger datos
$id=$_REQUEST["id"];

$controlador= new ClienteController();
$controlador->remove($id);

