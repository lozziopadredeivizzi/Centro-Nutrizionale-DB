<?php

require_once ("nutrizionistaTable.php");
require_once ("clienteTable.php");
require_once ("recensioniTable.php");
require_once ("consulenzaTable.php");

class DatabaseConnection
{

    private $db;
    private $nutrizionistaTable;
    private $clienteTable;
    private $recensioniTable;
    private $consulenzaTable;

    //Connection db
    public function __construct($servername, $username, $password, $dbname, $port)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);

        if ($this->db->connect_error) {
            die("Connection Failed: " . $this->db->connect_error);
        }

        $this->nutrizionistaTable = new NutrizionistaTable($this->db);
        $this->clienteTable = new ClienteTable($this->db);
        $this->recensioniTable = new RecensioniTable($this->db);
        $this->consulenzaTable = new ConsulenzaTable($this->db);

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

    public function checkLoginCliente($id, $password)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS isPresent FROM cliente WHERE IDCliente=? AND Password=?");
        $stmt->bind_param('is', $id, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLoginNutrizionista($id, $password)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS isPresent FROM nutrizionista WHERE IDNutrizionista=? AND Password=?");
        $stmt->bind_param('is', $id, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getQualifiche()
    {
        $stmt = $this->db->prepare("SELECT * FROM qualifica");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function impostaNutrizionista($idCliente, $idNutrizionista)
    {
        $stmt = $this->db->prepare("INSERT INTO scelta(IDCliente, Ora, Data, IDNutrizionista) VALUES(?, CURTIME(), CURDATE(), ?)");
        $stmt->bind_param('ii', $idCliente, $idNutrizionista);
        $stmt->execute();
    }

    public function setMediaVotiToNutrizionista($idNutrizionista, $media)
    {
        $stmt = $this->db->prepare("UPDATE nutrizionista SET MediaVoti=? WHERE IDNutrizionista=?");
        $stmt->bind_param('ii', $media, $idNutrizionista);
        $stmt->execute();
    }

    public function addEmptyScheda($dataInzio, $idCliente)
    {
        $stmt = $this->db->prepare("INSERT INTO scheda(dataInizioValidita, IDCliente, CodiceObiettivo) VALUES(?,?,?) ");
        $codiceObiettivoDefoult = 9;
        $stmt->bind_param('sii', $dataInzio, $idCliente, $codiceObiettivoDefoult);
        $stmt->execute();
        $codiceScheda = $stmt->insert_id;
        return $codiceScheda;
    }

    public function addNewConsulenza($idCliente, $oraInizio, $oraFine, $data, $codiceScheda, $completa, $presenza, $online, $tipo)
    {
        $stmt = $this->db->prepare("INSERT INTO consulenza (IDCliente, CodiceScheda, IDNutrizionista, OraInizio, OraFine, Giorno, Completa, Presenza, Online, Tipo) 
        SELECT ?, 
                ?,      
               IDNutrizionista, 
               ?, 
               ?, 
               ?, 
               ?, 
               ?, 
               ?, 
               ? 
        FROM scelta 
        WHERE IDCliente = ? 
        ORDER BY Data DESC, Ora DESC 
        LIMIT 1
        ");
        $stmt->bind_param('iisssssssi', $idCliente, $codiceScheda, $oraInizio, $oraFine, $data, $completa, $presenza, $online, $tipo, $idCliente);
        $stmt->execute();
    }

    public function getNutrizionistaTable()
    {
        return $this->nutrizionistaTable;
    }

    public function getClienteTable()
    {
        return $this->clienteTable;
    }
    public function getRecensioniTable()
    {
        return $this->recensioniTable;
    }

    public function getConsulenzaTable()
    {
        return $this->consulenzaTable;
    }
}
