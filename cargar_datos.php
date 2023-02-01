<?php
// require_once "models/class/Videoclub.php";
// require_once "models/ClienteModel.php";
// require_once "config/db.php";

// session_start();
// $si = new Videoclub();
// $clienteModel = new ClienteModel();
// $arrayClientes = $clienteModel->leerSocios();
// for ($i=0; $i < count($arrayClientes); $i++) { 
//     $cliente = new Cliente($arrayClientes[$i]["id"] ,$arrayClientes[$i]["nombre"], $arrayClientes[$i]["apellido"],$arrayClientes[$i]["dni"],$arrayClientes[$i]["direccion"]);
//     $si->include_cliente($cliente);
// }
// $_SESSION["videoclub"] = $si;
require_once 'config/db.php';
require_once 'models/class/Cliente.php';
require_once 'models/class/CD.php';
require_once 'models/class/Pelicula.php';
require_once 'models/class/Juego.php';
require_once 'models/class/Alquilado.php';
require_once 'models/class/Videoclub.php';
session_start();
/*
$columnas = [
	'cliente' => 'nombre, apellido, dni, direccion',
//	'producto' => 'nombre, precio, tipo, genero, plataforma, duracion, idioma',
	'CD' => 'nombre, precio, tipo, genero, duracion',
	'Pelicula' => 'nombre, precio, tipo, genero, duracion, idioma',
	'Juego' => 'nombre, precio, tipo, genero, plataforma',
	'alquilado' => 'id_cliente, id_producto, fecha_alquiler, fecha_devolucion'
];

function comas_repetir(string $texto, int $numero): string
{
	$cadena = '';

	for($i = 0; $i < $numero; $i++)
	{
		$cadena .= $texto;

		if($i != $numero - 1)
		{
			$cadena .= ', ';
		}
	}

	return $cadena;
}
 */
function comas_listar(array $datos, bool $comillas = false): string
{
	$cadena = '';
	$numero = count($datos);

	for($i = 0; $i < $numero; $i++)
	{
		if($comillas)
			$cadena .= '\'' . $datos[$i] . '\'';
		else
			$cadena .= $datos[$i];

		if($i != $numero - 1)
		{
			$cadena .= ',';
		}
	}

	return $cadena;
}

function insertar(string $tabla, array $datos)
{
	try
	{
		$indices = comas_listar(array_keys($datos));
		$valores = comas_listar(array_values($datos), true);

		$conexion = conexion();
		$sql = "INSERT INTO {$tabla}({$indices}) VALUES ({$valores})";

		$consulta = $conexion->query($sql);
	}
	catch(PDOException $excepcion)
	{
		echo $sql . '<br>' . $excepcion->getMessage();
	}

	$conexion = null;
}

function borrar(string $tabla)
{
	try
	{
		$conexion = conexion();
		$sql = "DELETE FROM {$tabla}";
		$consulta = $conexion->query($sql);
	}
	catch(PDOException $excepcion)
	{
		echo $sql . '<br>' . $excepcion->getMessage();
	}

	$conexion = null;
}

function recoger(string $tabla): array
{
	try
	{
		$conexion = conexion();
		$sql = "SELECT * FROM {$tabla}";
		$consulta = $conexion->query($sql);
		return $consulta->fetchAll(PDO::FETCH_ASSOC);
	}
	catch(PDOException $excepcion)
	{
		echo $sql . '<br>' . $excepcion->getMessage();
	}

	$conexion = null;
}

//PRUEBAS//
 
 echo '(';
 echo comas_listar(['a', 'b', 'c', 'd', 'e']);
 echo ')';


 $datos = [
 	'nombre' => 'Juan',
 	'apellido' => 'Pons',
 	'dni' => '12345678A',
 	'direccion' => 'La Cruz'
 ];

 $obj = new Cliente('Juan', 'Pons', '12345678A', 'La Cruz');
 insertar('cliente', $obj->to_array());

 $obj = new Cliente('Armando', 'Cacon', '87654321A', 'Santa Águeda');
 insertar('cliente', $obj->to_array());

 $obj = new Cliente('Olora', 'Bashina', '43218765A', 'San Juan');
 insertar('cliente', $obj->to_array());

//  $p1 = new CD('Hielo Rojo', 37, 'Techno Pop');
//  $p2 = new Pelicula('La Jetée', 'Francés', 28, 'Ciencia Ficción');
//  $p3 = new Juego('Vampire Survivors', 'PC', 'Roguelike');
//  insertar('producto', $p1->to_array());
//  insertar('producto', $p2->to_array());
//  insertar('producto', $p3->to_array());
 
//  $a1 = new Alquilado(1, 4);
//  $a1->alquilar();
//  insertar('alquilado', $a1->to_array());
//  $a1 = new Alquilado(1, 5);
//  $a1->alquilar();
//  insertar('alquilado', $a1->to_array());
//  $a1 = new Alquilado(2, 5);
//  $a1->alquilar();
//  insertar('alquilado', $a1->to_array());
//  $a1 = new Alquilado(3, 6);
//  $a1->alquilar();
//  insertar('alquilado', $a1->to_array());


$datos_cliente = recoger('cliente');
$datos_producto = recoger('producto');
$datos_alquileres = recoger('alquilado');

$clientes = [];
foreach($datos_cliente as $dato)
{
	$cliente = new Cliente($dato['nombre'], $dato['apellido'], $dato['dni'], $dato['direccion']);
	$clientes[$dato['id']] = $cliente;
}

$productos = [];
foreach($datos_producto as $dato)
{
	switch($dato['tipo'])
	{
		case 'CD':
			$producto = new CD($dato['nombre'], $dato['duracion'], $dato['genero']);
			break;
		case 'Pelicula':
			$producto = new Pelicula($dato['nombre'], $dato['idioma'], $dato['duracion'], $dato['genero']);
			break;
		case 'Juego':
			$producto = new Juego($dato['nombre'], $dato['plataforma'], $dato['genero']);
			break;
		default:
			$producto = null;
			break;
	}

	$productos[$dato['id']] = $producto;
}


$alquileres = [];
foreach($datos_alquileres as $dato)
{
	$alquiler = new Alquilado($dato['id_cliente'], $dato['id_producto'], $dato['fecha_alquiler'], $dato['fecha_devolucion']);
	$alquileres[] = $alquiler;
}

$videoclub = new Videoclub($clientes, $productos, $alquileres);

$_SESSION["videoclub"]=$videoclub;


//PRUEBAS//
?>
<!DOCTYPE html>
<html>
<head>
	<title>Carga de datos</title>
	<meta charset="UTF-8">
</head>
<body>
	<form action="index.php" method="POST">
		<input type="submit" name="empezar" value="Empezar">
	</form>
</body>
</html>
