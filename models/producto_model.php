<?php
session_start();
require_once 'models/class/Videoclub.php';
require_once 'models/class/Producto.php';
require_once 'models/class/CD.php';
require_once 'models/class/Pelicula.php';
require_once 'models/class/Juego.php';

//Crud: Create
function insertar(Producto $producto)
{
	$_SESSION['videoclub']->incluir_producto($producto);
}

//cRud: Read
function recoger(int $id): Producto
{
	return $_SESSION['videoclub']->get_productos()[$id];
}

function recoger_todos(): array
{
	return $_SESSION['videoclub']->get_productos();
}

//crUd: Update
function editar(int $id, Producto $producto)
{
	$_SESSION['videoclub']->get_productos()[$id] = $producto;
}

//cruD: Delete
function borrar(int $id)
{
	unset ($_SESSION['videoclub']->get_productos()[$id]);
}

