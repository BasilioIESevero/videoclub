<?php
require_once 'Producto.php';

class Cliente
{
	private string $nombre;
	private string $apellido;
	private string $dni;
	private string $direccion;


	public function __construct(string $nombre, string $apellido, string $dni, string $direccion)
	{
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->dni = $dni;
		$this->direccion = $direccion;
	}

	public function __tostring(): string
	{
		return $this->nombre . ' ' . $this->apellido;
	}

	public function get_nombre(): string
	{
		return $this->nombre;
	}

	public function get_apellido(): string
	{
		return $this->apellido;
	}

	public function get_dni(): string
	{
		return $this->dni;
	}

	public function get_direccion(): string
	{
		return $this->direccion;
	}

	// public function get_alquileres(): array
	// {
	// 	return $this->alquileres;
	// }

	// public function set_alquileres(array $alquileres)
	// {
	// 	$this->alquileres = $alquileres;
	// }

	// public function alquilar(int $id)
	// {
	// 	$alquiler = [
	// 		'fecha_alquiler' => date('Y-m-d H-i-s'),
	// 		'fecha_devolucion' => ''
	// 	];

	// 	$this->get_alquileres()[$id] = $alquiler;
	
	// }

	// public function devolver(int $id)
	// {
	// 	$this->get_alquileres()[$id]['fecha_devolucion'] = date('Y-m-d H-i-s');
	// }
}
