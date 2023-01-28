<?php
session_start();
require_once 'models/class/Cliente.php';

class ClienteModel
{
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
