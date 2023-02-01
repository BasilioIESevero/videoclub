<?php
const HOST = "localhost";
const DBNAME = "videoclub";
const USER = "root";
const PASSWD = "";

function conexion(): ?PDO
{
	$conexion = null;
	try
	{
		$opciones = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_CASE => PDO::CASE_LOWER
		];

		$dsn = 'mysql:host=' . HOST . '; dbname=' . DBNAME;
		$conexion = new PDO($dsn, USER, PASSWD, $opciones);
	}
	catch (Exception $excepcion)
	{
		echo $excepcion->getMessage();
	}

	return $conexion;
}

