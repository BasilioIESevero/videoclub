<?php
require_once 'Producto.php';

class Juego extends Producto
{
	private string $plataforma;
	private string $genero;

	public function __construct(string $nombre, string $plataforma, string $genero)
	{
		parent::__construct($nombre, 3);
		$this->plataforma = $plataforma;
		$this->genero = $genero;
	}

	public function __tostring(): string
	{
		return 'Juego: ' . $this->nombre . ', ' . $this->plataforma
			. ' (' . $this->genero . ')';
	}

	public function get_plataforma(): string
	{
		return $this->plataforma;
	}

	public function get_genero(): string
	{
		return $this->genero;
	}
}
