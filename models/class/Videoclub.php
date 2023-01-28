<?php
require_once 'Producto.php';
require_once 'Cliente.php';

class Videoclub
{
	private array $productos;
	private array $clientes;

	public function __construct(array $productos, array $clientes)
	{
		$this->productos = $productos;
		$this->clientes = $clientes;
	}

	public function __tostring(): string
	{
		return 'Videoclub: ' . count($this->productos) . ' productos, '
			. count($this->clientes) . ' clientes';
	}

	public function __clone()
	{
		foreach ($this->productos as $id => $producto) {
			$this->productos[$id] = clone $this->productos[$id];
		}

		foreach ($this->clientes as $id => $cliente) {
			$this->clientes[$id] = clone $this->clientes[$id];
		}
	}

	public function get_productos(): array
	{
		return $this->productos;
	}

	public function get_clientes(): array
	{
		return $this->clientes;
	}

	public function edit_cliente($id, Cliente $cliente): void
	{
		$this->clientes[$id] = $cliente;
	}

	public function include_cliente(Cliente $cliente): void
	{
		$this->clientes[] = $cliente;
	}
	 
	public function remove_cliente($id): void
	{
		unset($this->clientes[$id]);
	}
}
