<?php
require_once 'Producto.php';

class CD extends Producto
{
	private int $duracion;
	private string $genero;

	public function __construct(string $nombre, int $duracion, string $genero)
	{
		parent::__construct($nombre, 1);
		$this->duracion = $duracion;
		$this->genero = $genero;
	}

	public function __tostring(): string
	{
		return 'CD: ' . $this->nombre . ', ' . $this->duracion . ' minutos (' . $this->genero . ')';
	}

	public function get_duracion(): int
	{
		return $this->duracion;
	}

	public function get_genero(): string
	{
		return $this->genero;
	}
}
