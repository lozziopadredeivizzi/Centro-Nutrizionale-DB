<?php

require_once ("nutrizionistaTable.php");
require_once ("clienteTable.php");
require_once ("recensioniTable.php");
require_once ("consulenzaTable.php");
require_once ("diarioTable.php");
require_once ("alimentiTable.php");
require_once ("eserciziTable.php");
require_once ("obiettiviTable.php");
require_once ("schedaTable.php");

class DatabaseConnection
{

    private $db;
    private $nutrizionistaTable;
    private $clienteTable;
    private $recensioniTable;
    private $consulenzaTable;
    private $diarioTable;
    private $alimentiTable;
    private $eserciziTable;
    private $obiettiviTable;
    private $schedaTable;

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
        $this->diarioTable = new DiarioTable($this->db);
        $this->alimentiTable = new AliementiTable($this->db);
        $this->eserciziTable = new EserciziTable($this->db);
        $this->obiettiviTable = new ObiettiviTable($this->db);
        $this->schedaTable = new SchedaTable($this->db);

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

    public function createNewDiary($idCliente)
    {
        $stmt1 = $this->db->prepare("SELECT COUNT(*) AS count FROM diario");
        $stmt1->execute();
        $result = $stmt1->get_result();
        $row = $result->fetch_assoc();
        $codDiario = $row['count'];
        $stmt1->close();

        $stmt = $this->db->prepare(" INSERT INTO diario (IDCliente, Data, Ora, IDNutrizionista, CodDiario)
            VALUES (
                ?, 
                CURDATE(), 
                (SELECT Ora FROM scelta WHERE IDCliente = ? ORDER BY Data DESC, Ora DESC LIMIT 1), 
                (SELECT IDNutrizionista FROM scelta WHERE IDCliente = ? ORDER BY Data DESC, Ora DESC LIMIT 1), 
                ?
            )
        ");

        $stmt->bind_param('iiii', $idCliente, $idCliente, $idCliente, $codDiario);
        $stmt->execute();
    }

    public function addNota($idCliente, $azione, $nota, $data, $ora)
    {
        $stmt1 = $this->db->prepare("SELECT COUNT(*) AS count FROM note");
        $stmt1->execute();
        $result = $stmt1->get_result();
        $row = $result->fetch_assoc();
        $idNota = $row['count'];
        $stmt1->close();

        $stmt = $this->db->prepare("INSERT INTO note (IDCliente, codDiario, Data, Ora, Nota, DataNota, OrarioNota, IdNota, OggettoNota)
VALUES (?,( SELECT codDiario
            FROM DIARIO
            WHERE IDCliente = ?
            AND Data = ( SELECT Data 
                         FROM SCELTA 
                         WHERE IDCliente = ? 
                         ORDER BY Data DESC, Ora DESC 
                         LIMIT 1)
            AND Ora = ( SELECT Ora 
                        FROM SCELTA 
                        WHERE IDCliente = ? 
                        ORDER BY Data DESC, Ora DESC 
                        LIMIT 1)),
          ( SELECT Data
            FROM SCELTA
            WHERE IDCliente = ?
            ORDER BY Data DESC, Ora DESC
            LIMIT 1),
          ( SELECT Ora
            FROM SCELTA
            WHERE IDCliente = ?
            ORDER BY Data DESC, Ora DESC
            LIMIT 1), ?, ?, ?, ?, ?)");
        $stmt->bind_param('iiiiiisssis', $idCliente, $idCliente, $idCliente, $idCliente, $idCliente, $idCliente, $nota, $data, $ora, $idNota, $azione);
        $stmt->execute();
    }

    public function addTabellaAlimenti($idCliente, $idNutrizionista)
    {
        $stmt = $this->db->prepare("INSERT INTO tabella_pasto (CodiceScheda, CodTabPasti) 
                                    SELECT c.CodiceScheda, c.CodiceScheda  
                                    FROM consulenza c 
                                    WHERE c.IDCliente = ? AND Completa='n' AND c.IDNutrizionista = ?;");
        $stmt->bind_param('ii', $idCliente, $idNutrizionista);
        $stmt->execute();
    }

    public function addTabellaAllenamento($idCliente, $idNutrizionista)
    {
        $stmt = $this->db->prepare("INSERT INTO tabella_allenamento (CodiceScheda, CodTabAll) 
                                    SELECT c.CodiceScheda, c.CodiceScheda  
                                    FROM consulenza c 
                                    WHERE c.IDCliente = ? AND Completa='n' AND c.IDNutrizionista = ?;");
        $stmt->bind_param('ii', $idCliente, $idNutrizionista);
        $stmt->execute();
    }

    public function addTabellaConsigli($idCliente, $idNutrizionista)
    {
        $stmt = $this->db->prepare("INSERT INTO tabella_consiglo (CodiceScheda, CodTabCons) 
                                    SELECT c.CodiceScheda, c.CodiceScheda  
                                    FROM consulenza c 
                                    WHERE c.IDCliente = ? AND Completa='n' AND c.IDNutrizionista = ?;");
        $stmt->bind_param('ii', $idCliente, $idNutrizionista);
        $stmt->execute();
    }

    public function addAlimentoPrescritto($alimento, $quantita, $idCliente, $idNutrizionista, $pasto)
    {
        $stmt = $this->db->prepare("INSERT INTO alimento_prescritto(CodiceScheda, CodTabPasti, NomeAlimento, QuantitaPrescr) 
                                    SELECT c.CodiceScheda, c.CodiceScheda, ?, ? 
                                    FROM consulenza c 
                                    WHERE c.IDCliente = ? AND Completa='n' AND c.IDNutrizionista = ?");
        $stmt->bind_param('siii', $alimento, $quantita, $idCliente, $idNutrizionista);
        $stmt->execute();
        $stmt->close();

        $stmt = $this->db->prepare("INSERT INTO appartiene(CodiceScheda, CodTabPasti, NomeAlimento, QuantitaPrescr, NomePasto)
                                    SELECT c.CodiceScheda, c.CodiceScheda, ?, ?, ? 
                                    FROM consulenza c 
                                    WHERE c.IDCliente = ? AND Completa='n' AND c.IDNutrizionista = ?");
        $stmt->bind_param('sisii', $alimento, $quantita, $pasto, $idCliente, $idNutrizionista);
        $stmt->execute();
    }

    public function addAlimentoOpzionale($alimentoPrescr, $quantitaPrescr, $alimentoOpz, $quantitaOpz, $idCliente, $idNutrizionista)
    {
        $stmt = $this->db->prepare("INSERT INTO alimento_alternativo(Pos_CodiceScheda, Pos_CodTabPasti, Pos_NomeAlimento, Pos_QuantitaPrescr, NomeAlimento, QuantitaAlter)
                                    SELECT c.CodiceScheda, c.CodiceScheda, ?, ?, ?, ? 
                                    FROM consulenza c 
                                    WHERE c.IDCliente = ? AND Completa='n' AND c.IDNutrizionista = ? ");
        $stmt->bind_param('sisiii', $alimentoPrescr, $quantitaPrescr, $alimentoOpz, $quantitaOpz, $idCliente, $idNutrizionista);
        $stmt->execute();
    }

    public function addExercice($idCliente, $idNutrizionista, $frequenza, $durata, $nomeEsercizio)
    {
        $stmt1 = $this->db->prepare("SELECT COUNT(*) AS count FROM esercizio_in_tabella WHERE CodiceScheda=(SELECT CodiceScheda FROM consulenza WHERE IDCliente=? AND Completa='n' AND IDNutrizionista=?)");
        $stmt1->bind_param('ii', $idCliente, $idNutrizionista);
        $stmt1->execute();
        $result = $stmt1->get_result();
        $row = $result->fetch_assoc();
        $posizione = $row['count'];
        $stmt1->close();

        $stmt = $this->db->prepare("INSERT INTO esercizio_in_tabella(CodiceScheda, CodTabAll, Posizione, FrequenzaSettimanale, Durata, NomeEsercizio)
                                    SELECT c.CodiceScheda, c.CodiceScheda, ?, ?, ?, ? 
                                    FROM consulenza c 
                                    WHERE c.IDCliente = ? AND Completa='n' AND c.IDNutrizionista = ? ");
        $stmt->bind_param('iissii', $posizione, $frequenza, $durata, $nomeEsercizio, $idCliente, $idNutrizionista);
        $stmt->execute();
    }

    public function addConsiglio($testo, $idCliente, $idNutrizionista)
    {
        $stmt = $this->db->prepare("INSERT INTO consiglio(CodiceScheda, CodTabCons, Descrizione)
                                    SELECT c.CodiceScheda, c.CodiceScheda, ? 
                                    FROM consulenza c 
                                    WHERE c.IDCliente = ? AND Completa='n' AND c.IDNutrizionista = ?");
        $stmt->bind_param('sii', $testo, $idCliente, $idNutrizionista);
        $stmt->execute();
    }

    public function updateSchedaInfo($idCliente, $idNutrizionista, $durata, $obiettivo)
    {
        $stmt = $this->db->prepare("UPDATE scheda 
                                    SET CodiceObiettivo = (SELECT CodiceObiettivo FROM obiettivo WHERE Descrizione = ?), 
                                        Durata = ? 
                                    WHERE CodiceScheda = (SELECT CodiceScheda FROM consulenza WHERE IDCliente = ? AND Completa='n' AND IDNutrizionista = ?)");
        $stmt->bind_param('siii', $obiettivo, $durata, $idCliente, $idNutrizionista);
        $stmt->execute();
    }

    public function updateConsulenza($idCliente, $idNutrizionista)
    {
        $stmt = $this->db->prepare("UPDATE consulenza SET Completa='s' WHERE Completa='n' AND IDCliente=? AND IDNutrizionista=?");
        $stmt->bind_param('ii', $idCliente, $idNutrizionista);
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

    public function getDiarioTable()
    {
        return $this->diarioTable;
    }

    public function getAlimentiTable()
    {
        return $this->alimentiTable;
    }

    public function getEserciziTable()
    {
        return $this->eserciziTable;
    }

    public function getObiettiviTable()
    {
        return $this->obiettiviTable;
    }

    public function getSchedaTable(){
        return $this->schedaTable;
    }
}
