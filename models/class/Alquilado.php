<?php
class Alquilado
{
	private int $id_cliente;
	private int $id_producto;
	private ?string $fecha_alquiler;
	private ?string $fecha_devolucion;

	public function __construct(int $id_cliente, int $id_producto, string $alquiler = NULL, string $devolucion = NULL)
	{
		$this->id_cliente = $id_cliente;
		$this->id_producto = $id_producto;
		$this->fecha_alquiler = $alquiler;
		$this->fecha_devolucion = $devolucion;
	}

	public function alquilar()
	{
		$this->fecha_alquiler = date("Y-m-d H:i:s");
	}

	public function devolver()
	{
		$this->fecha_devolucion = date("Y-m-d H:i:s");
	}

	public function set_fecha_alquiler(string $fecha_alquiler)
	{
		$this->fecha_alquiler = $fecha_alquiler;
	}

	public function set_fecha_devolucion(string $fecha_devolucion)
	{
		$this->fecha_devolucion = $fecha_devolucion;
	}

	public function get_id_cliente(): int
	{
		return $this->id_cliente;
	}

	public function get_id_producto(): int
	{
		return $this->id_producto;
	}

	public function get_fecha_alquiler(): string
	{
		return $this->fecha_alquiler;
	}

	public function get_fecha_devolucion(): string
	{
		return $this->fecha_devolucion;
	}

	public function to_array(): array
	{
		$array = [
			'id_cliente' => $this->id_cliente,
			'id_producto' => $this->id_producto,
			'fecha_alquiler' => $this->fecha_alquiler,
		];

		if($this->fecha_devolucion != null)
		{
			$array['fecha_devolucion'] = $this->fecha_devolucion;
		}

		return $array;
	}
}
