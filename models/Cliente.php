<?php
class Cliente
{
    private $conn;
    private $table_name = "Cliente";

    public $ideCli;
    public $nomCli;
    public $dirCli;
    public $telCli;
    public $emailCli;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Read
    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Read single
    public function readOne()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE ideCli = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->ideCli);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->nomCli = $row['nomCli'];
            $this->dirCli = $row['dirCli'];
            $this->telCli = $row['telCli'];
            $this->emailCli = $row['emailCli'];
            return $row; // Devuelve la fila
        }

        return false;
    }


    // Create
    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET nomCli=:nomCli, dirCli=:dirCli, telCli=:telCli, emailCli=:emailCli";
        $stmt = $this->conn->prepare($query);

        $this->nomCli = htmlspecialchars(strip_tags($this->nomCli));
        $this->dirCli = htmlspecialchars(strip_tags($this->dirCli));
        $this->telCli = htmlspecialchars(strip_tags($this->telCli));
        $this->emailCli = htmlspecialchars(strip_tags($this->emailCli));

        $stmt->bindParam(":nomCli", $this->nomCli);
        $stmt->bindParam(":dirCli", $this->dirCli);
        $stmt->bindParam(":telCli", $this->telCli);
        $stmt->bindParam(":emailCli", $this->emailCli);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Update
    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET nomCli=:nomCli, dirCli=:dirCli, telCli=:telCli, emailCli=:emailCli WHERE ideCli=:ideCli";
        $stmt = $this->conn->prepare($query);

        $this->nomCli = htmlspecialchars(strip_tags($this->nomCli));
        $this->dirCli = htmlspecialchars(strip_tags($this->dirCli));
        $this->telCli = htmlspecialchars(strip_tags($this->telCli));
        $this->emailCli = htmlspecialchars(strip_tags($this->emailCli));
        $this->ideCli = htmlspecialchars(strip_tags($this->ideCli));

        $stmt->bindParam(":nomCli", $this->nomCli);
        $stmt->bindParam(":dirCli", $this->dirCli);
        $stmt->bindParam(":telCli", $this->telCli);
        $stmt->bindParam(":emailCli", $this->emailCli);
        $stmt->bindParam(":ideCli", $this->ideCli);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    // Delete
    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE ideCli=:ideCli";
        $stmt = $this->conn->prepare($query);

        $this->ideCli = htmlspecialchars(strip_tags($this->ideCli));
        $stmt->bindParam(":ideCli", $this->ideCli);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
