<?php
require_once 'models/class/Cliente.php';
require_once 'models/class/Videoclub.php';
require_once "config/db.php";
session_start();

class ClienteModel
{
    private $conexion;
    public function __construct()
    {
        $this->conexion = conexion();
    }

    public function leerSocios()
    {
        $sentencia = $this->conexion->query("SELECT * FROM cliente;");
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    function include(Cliente $cliente)
    {
        $_SESSION['videoclub']->include_cliente($cliente);
    }

    function list(int $id): Cliente
    {
        return $_SESSION['videoclub']->get_clientes()[$id];
    }

    function listAll(): array
    {
        return $_SESSION['videoclub']->get_clientes();
    }

    function edit(int $id, Cliente $cliente)
    {
        $_SESSION['videoclub']->edit_cliente($id, $cliente);
    }

    function remove(int $id)
    {
        $_SESSION['videoclub']->remove_cliente($id);
    }
    
}
