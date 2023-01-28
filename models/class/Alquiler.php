<?php

class Alquiler
{
	private int $idProductos;
	private int $idClientes;
    private string $fechaAlquiler;
    private string $fechaDevolucion;

	public function __construct(int $idProductos, int $idClientes, string $fechaAlquiler, string $fechaDevolucion = "")
	{
		$this->$idProductos = $idProductos;
		$this->$idClientes = $idClientes;
        $this->$fechaAlquiler = $fechaAlquiler;
        $this->$fechaDevolucion = $fechaDevolucion;
	}

	public function __tostring(): string
	{
		return 'Videoclub: ' . $this->idProductos . ' idProductos, '
			. $this->idClientes . ' idClientes' . $this->fechaAlquiler. ' fechaAlquiler, '
            . $this->fechaDevolucion. ' fechaDevolucion';
	}

    public function getIdProductos(){
        return $this->idProductos;
    }
    
    public function getIdClientes(){
        return $this->idClientes;
    }

    public function getFechaAlquiler(){
        return $this->fechaAlquiler;
    }
    
    public function getFechaDevolucion(){
        return $this->fechaDevolucion;
    }
}
