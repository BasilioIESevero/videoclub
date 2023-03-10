<?php
require_once "models/ClienteModel.php";

class ClienteController
{
    private $model;
    public function __construct()
    {
        $this->model = new ClienteModel();
    }
    public function include(Cliente $cliente): void
    {
        $id = $this->model->include($cliente);
        ($id == null) ? header("location:index.php?accion=include&error=true&id={$id}") : header("location:index.php?accion=list&tabla=cliente&id=" . $id);
    }

    public function remove(int $id): void
    {
        $id = $this->model->remove($id);
        ($id == null) ? header("location:index.php?accion=remove&error=true&id={$id}") : header("location:index.php?accion=list&tabla=cliente");
    }

    public function edit(int $id, Cliente $cliente): void
    {
        $id = $this->model->edit($id ,$cliente);
        ($id == null) ? header("location:index.php?accion=edit&error=true&id={$id}") : header("location:index.php?accion=list&tabla=cliente&id=" . $id);
    }

    public function list(int $id): Cliente
    {
        return $this->model->list($id);
    }

    public function listAll(): array
    {
        return $this->model->listAll();
    }
}
