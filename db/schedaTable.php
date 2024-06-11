<?php

class SchedaTable
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getActualScheda($idCliente)
    {
        $stmt = $this->db->prepare("SELECT c.CodiceScheda, s.DataInizioValidita, s.Durata, o.Descrizione AS Obiettivo 
                                    FROM consulenza c 
                                    JOIN scheda s ON c.CodiceScheda = s.CodiceScheda
                                    LEFT JOIN obiettivo o ON s.CodiceObiettivo = o.CodiceObiettivo
                                    WHERE c.IDCliente=? AND c.Completa='s' 
                                    ORDER BY c.Giorno DESC, c.OraInizio DESC 
                                    LIMIT 1");
        $stmt->bind_param('i', $idCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAlimentiTableFromScheda($codScheda)
    {
        $stmt = $this->db->prepare("SELECT ap.NomeAlimento, ap.QuantitaPrescr, app.NomePasto, aa.NomeAlimento AS NomeAlimentoAlter, aa.QuantitaAlter
                                    FROM scheda s
                                    JOIN tabella_pasto t ON s.CodiceScheda = t.CodiceScheda
                                    LEFT JOIN alimento_prescritto ap ON t.CodTabPasti = ap.CodTabPasti
                                    LEFT JOIN alimento_alternativo aa ON t.CodTabPasti = aa.Pos_CodTabPasti 
                                                                      AND ap.NomeAlimento = aa.Pos_NomeAlimento
                                                                      AND ap.QuantitaPrescr = aa.Pos_QuantitaPrescr
                                    LEFT JOIN appartiene app ON t.CodTabPasti = app.CodTabPasti
                                                             AND ap.NomeAlimento = app.NomeAlimento
                                                             AND ap.QuantitaPrescr = app.QuantitaPrescr
                                    WHERE s.CodiceScheda = ? ");
        $stmt->bind_param('i', $codScheda);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEserciziTableFromScheda($codScheda)
    {
        $stmt = $this->db->prepare("SELECT t.FrequenzaSettimanale, t.Durata, t.NomeEsercizio, e.Descrizione
                                    FROM scheda s
                                    JOIN tabella_allenamento ta ON s.CodiceScheda = ta.CodiceScheda
                                    LEFT JOIN esercizio_in_tabella t ON ta.CodTabAll = t.CodTabAll
                                    LEFT JOIN esercizio e ON t.NomeEsercizio = e.NomeEsercizio
                                    WHERE t.CodiceScheda = ?");
        $stmt->bind_param('i', $codScheda);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getConsigliTableFromScheda($codScheda)
    {
        $stmt = $this->db->prepare("SELECT c.Descrizione 
                                    FROM scheda s
                                    JOIN tabella_consiglo t ON s.CodiceScheda = t.CodiceScheda
                                    LEFT JOIN consiglio c ON t.CodTabCons = c.CodTabCons
                                    WHERE s.CodiceScheda = ?");
        $stmt->bind_param('i', $codScheda);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getStoricoSchede($idCliente)
    {
        $stmt = $this->db->prepare("SELECT s.Durata, s.DataInizioValidita, o.Descrizione AS Obiettivo, c.Tipo, s.CodiceScheda 
                                    FROM scheda s
                                    JOIN obiettivo o ON s.CodiceObiettivo = o.CodiceObiettivo
                                    LEFT JOIN consulenza c ON s.CodiceScheda = c.CodiceScheda 
                                    WHERE s.IDCliente=?
                                    ORDER BY s.DataInizioValidita DESC");
        $stmt->bind_param('i', $idCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSchedaByCod($codScheda)
    {
        $stmt = $this->db->prepare("SELECT s.CodiceScheda, s.DataInizioValidita, s.Durata, o.Descrizione AS Obiettivo 
                                    FROM scheda s 
                                    JOIN obiettivo o ON s.CodiceObiettivo = o.CodiceObiettivo
                                    WHERE s.CodiceScheda = ?");
        $stmt->bind_param('i', $codScheda);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>