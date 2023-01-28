<?php
abstract class Producto
{
	private string $nombre;
	private float $precio;

	public function __construct(string $nombre, float $precio)
	{
		$this->nombre = $nombre;
		$this->precio = $precio;
	}

	public function get_nombre(): string
	{
		return $this->nombre;
	}

	public function get_precio(): float
	{
		return $this->precio;
	}

	public abstract function __tostring(): string;
}
