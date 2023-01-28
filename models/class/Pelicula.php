<?php
require_once 'Producto.php';

class Pelicula extends Producto
{
	private string $idioma;
	private int $duracion;
	private string $genero;

	public function __construct(string $nombre, string $idioma, int $duracion, string $genero)
	{
		parent::__construct($nombre, 2);
		$this->idioma = $idioma;
		$this->duracion = $duracion;
		$this->genero = $genero;
	}

	public function __tostring(): string
	{
		return 'Película: ' . $this->nombre . ', ' . $this->duracion
			. ' minutos, ' . $this->idioma . '(' . $this->idioma . ')';
	}

	public function get_idioma(): string
	{
		return $this->idioma;
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
