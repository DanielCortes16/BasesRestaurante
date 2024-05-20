<?php
require_once '../config/Database.php';
require_once '../models/Cliente.php';

class ClienteController
{
    private $database;
    private $db;
    private $cliente;

    public function __construct()
    {
        $this->database = new Database();
        $this->db = $this->database->getConnection();
        $this->cliente = new Cliente($this->db);
    }

    public function readClientes()
    {
        $stmt = $this->cliente->read();
        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    }

    public function createCliente($data)
    {
        $this->cliente->nomCli = $data['nomCli'];
        $this->cliente->dirCli = $data['dirCli'];
        $this->cliente->telCli = $data['telCli'];
        $this->cliente->emailCli = $data['emailCli'];

        return $this->cliente->create();
    }

    public function updateCliente($data)
    {
        $this->cliente->ideCli = $data['ideCli'];
        $this->cliente->nomCli = $data['nomCli'];
        $this->cliente->dirCli = $data['dirCli'];
        $this->cliente->telCli = $data['telCli'];
        $this->cliente->emailCli = $data['emailCli'];

        return $this->cliente->update();
    }

    public function deleteCliente($ideCli)
    {
        $this->cliente->ideCli = $ideCli;
        return $this->cliente->delete();
    }
    public function readOneCliente($ideCli)
    {
        $this->cliente->ideCli = $ideCli;
        return $this->cliente->readOne();
    }
}
