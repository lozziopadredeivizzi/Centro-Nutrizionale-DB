<?php

require_once("nutrizionistaTable.php");

class DatabaseConnection
{

    private $db;
    private $nutrizionistaTable;

    //Connection db
    public function __construct($servername, $username, $password, $dbname, $port)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);

        if ($this->db->connect_error) {
            die("Connection Failed: " . $this->db->connect_error);
        }

        $this->nutrizionistaTable = new NutrizionistaTable($this->db);
    }

    public function addClient($nome, $cognome, $citta, $cap, $email, $password)
    {
        $stmt = $this->db->prepare("INSERT INTO cliente(Nome, Cognome, Citta, CAP, Email, Password) VALUES(?,?,?,?,?,?)");
        $stmt->bind_param('sssiss', $nome, $cognome, $citta, $cap, $email, $password);
        $stmt->execute();
        $idCliente = $stmt->insert_id;
        return $idCliente;
    }

    public function addNutrizionista($nome, $cognome, $email, $password, $mediaVoti, $esperienza, $specializzazione, $orari, $telefono, $titolo, $citta, $via, $cap, $ncivico)
    {
        $this->db->begin_transaction();

        try {
            $stmt = $this->db->prepare("INSERT INTO nutrizionista (Nome, Cognome, Email, Password, MediaVoti) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('sssss', $nome, $cognome, $email, $password, $mediaVoti);
            $stmt->execute();

            $id_nutrizionista = $stmt->insert_id;

            $stmt->close();

            $stmt = $this->db->prepare("INSERT INTO informazione (IDNutrizionista, Esperienza, Specializzazione, Orari, Telefono) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('issss', $id_nutrizionista, $esperienza, $specializzazione, $orari, $telefono);
            $stmt->execute();
            $stmt->close();

            $stmt = $this->db->prepare("INSERT INTO possiede_q (IDNutrizionista, Titolo) VALUES (?, ?)");
            $stmt->bind_param('is', $id_nutrizionista, $titolo);
            $stmt->execute();
            $stmt->close();

            $stmt = $this->db->prepare("INSERT INTO indirizzo_prof (IDNutrizionista, Citta, Via, CAP, NCivico) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('issii', $id_nutrizionista, $citta, $via, $cap, $ncivico);
            $stmt->execute();
            $stmt->close();

            $this->db->commit();

            return $id_nutrizionista;
        } catch (Exception $e) {
            $this->db->rollback();
            throw $e;
        }
    }

    public function checkLoginCliente($id, $password){
        $stmt = $this->db->prepare("SELECT COUNT(*) AS isPresent FROM cliente WHERE IDCliente=? AND Password=?");
        $stmt->bind_param('is', $id, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLoginNutrizionista($id, $password){
        $stmt = $this->db->prepare("SELECT COUNT(*) AS isPresent FROM nutrizionista WHERE IDNutrizionista=? AND Password=?");
        $stmt->bind_param('is', $id, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getQualifiche(){
        $stmt = $this->db->prepare("SELECT * FROM qualifica");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNutrizionistaTable(){
        return $this->nutrizionistaTable;
    }


}