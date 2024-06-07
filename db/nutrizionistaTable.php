<?php

class NutrizionistaTable
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getNutrizionistaById($id)
    {
        $stmt = $this->db->prepare("SELECT *
        FROM nutrizionista n
        JOIN informazione i ON n.IDNutrizionista = i.IDNutrizionista
        JOIN indirizzo_prof ip ON n.IDNutrizionista = ip.IDNutrizionista
        JOIN possiede_q q ON n.IDNutrizionista = q.IDNutrizionista
        WHERE n.IDNutrizionista=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllNutrizionisti()
    {
        $stmt = $this->db->prepare("SELECT *
        FROM nutrizionista n
        JOIN informazione i ON n.IDNutrizionista = i.IDNutrizionista
        JOIN indirizzo_prof ip ON n.IDNutrizionista = ip.IDNutrizionista
        JOIN possiede_q q ON n.IDNutrizionista = q.IDNutrizionista
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function isSceltaPresent($idCliente)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS isPresent FROM scelta WHERE IDCliente=?");
        $stmt->bind_param('i', $idCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAttualNutrizionista($idCliente)
    {
        $stmt = $this->db->prepare("SELECT
        s.Data, 
        s.Ora,
        s.IDNutrizionista,
        n.Nome,
        n.Cognome,
        n.Email,
        n.MediaVoti,
        q.Titolo AS Qualifica,
        i.Esperienza,
        i.Specializzazione,
        i.Orari,
        i.Telefono,
        p.Citta,
        p.CAP,
        p.Via,
        p.NCivico
    FROM
        scelta s
    JOIN
        nutrizionista n ON s.IDNutrizionista = n.IDNutrizionista
    LEFT JOIN
        possiede_q q ON n.IDNutrizionista = q.IDNutrizionista
    LEFT JOIN
        informazione i ON n.IDNutrizionista = i.IDNutrizionista
    LEFT JOIN
        indirizzo_prof p ON n.IDNutrizionista = p.IDNutrizionista
    WHERE
        s.IDCliente = ?
    ORDER BY
        s.Data DESC,
        s.Ora DESC
    LIMIT 1;
    ");
        $stmt->bind_param('i', $idCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getStoricoNutrizionistiScelti($idCliente)
    {
        $stmt = $this->db->prepare("SELECT
        s.Data,
        s.Ora,
        s.IDCliente,
        s.IDNutrizionista,
        n.Nome,
        n.Cognome,
        n.Email,
        n.MediaVoti,
        q.Titolo AS Qualifica,
        i.Esperienza,
        i.Specializzazione,
        i.Orari,
        i.Telefono,
        p.Citta,
        p.CAP,
        p.Via,
        p.NCivico
    FROM
        SCELTA s
    JOIN
        NUTRIZIONISTA n ON s.IDNutrizionista = n.IDNutrizionista
    LEFT JOIN
        possiede_q q ON n.IDNutrizionista = q.IDNutrizionista
    LEFT JOIN
        INFORMAZIONE i ON n.IDNutrizionista = i.IDNutrizionista
    LEFT JOIN
        INDIRIZZO_PROF p ON n.IDNutrizionista = p.IDNutrizionista
    WHERE
        s.IDCliente = ?
    ORDER BY
        s.Data DESC,
        s.Ora DESC;
    ");
        $stmt->bind_param('i', $idCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNutrizionistiVicinoATe($idCliente)
    {
        $stmt = $this->db->prepare("SELECT DISTINCT n.IDNutrizionista, n.Nome, n.Cognome, i.Citta, i.CAP, pq.Titolo
FROM nutrizionista n
JOIN indirizzo_prof i ON n.IDNutrizionista = i.IDNutrizionista
JOIN possiede_q pq ON n.IDNutrizionista = pq.IDNutrizionista
JOIN cliente c ON i.Citta = c.Citta OR i.CAP = c.CAP
WHERE c.IDCliente = ?");
        $stmt->bind_param('i', $idCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNutrizionsitaByCAP($cap)
    {
        $stmt = $this->db->prepare("SELECT DISTINCT n.IDNutrizionista, n.Nome, n.Cognome, i.Citta, i.CAP, pq.Titolo
FROM nutrizionista n
JOIN indirizzo_prof i ON n.IDNutrizionista = i.IDNutrizionista
JOIN possiede_q pq ON n.IDNutrizionista = pq.IDNutrizionista
WHERE LOWER(i.CAP) LIKE LOWER(?)");
        $stmt->bind_param('i', $cap);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNutrizionistaByCity($citta)
    {
        $stmt = $this->db->prepare("SELECT DISTINCT n.IDNutrizionista, n.Nome, n.Cognome, i.Citta, i.CAP, pq.Titolo
FROM nutrizionista n
JOIN indirizzo_prof i ON n.IDNutrizionista = i.IDNutrizionista
JOIN possiede_q pq ON n.IDNutrizionista = pq.IDNutrizionista
WHERE LOWER(i.Citta) LIKE LOWER(?)");
        $stmt->bind_param('s', $citta);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>