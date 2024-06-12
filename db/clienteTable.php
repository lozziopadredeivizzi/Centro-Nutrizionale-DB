<?php

class ClienteTable
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getClienteById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM cliente WHERE IDCliente=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNutrizionistaClientsList($idNutrizionista)
    {
        $stmt = $this->db->prepare("SELECT
        s.Data,
        s.Ora,
        s.IDCliente,
        s.IDNutrizionista,
        c.Nome,
        c.Cognome,
        c.Email,
        c.Citta
    FROM
        SCELTA s
    JOIN
        cliente c ON s.IDCliente = c.IDCliente
    WHERE
        s.IDNutrizionista = ?
    ORDER BY
        s.Data DESC,
        s.Ora DESC;");
        $stmt->bind_param('i', $idNutrizionista);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkIfYouAreLastChoice($idNutrizionista)
    {
        $stmt = $this->db->prepare("WITH UltimaScelta AS (
    SELECT 
        s1.IDCliente,
        s1.IDNutrizionista,
        s1.Data,
        s1.Ora
    FROM 
        SCELTA s1
    INNER JOIN (
        SELECT 
            s2.IDCliente, 
            MAX(s2.Data) AS MaxData
        FROM 
            SCELTA s2
        GROUP BY 
            s2.IDCliente
    ) MaxDate ON s1.IDCliente = MaxDate.IDCliente AND s1.Data = MaxDate.MaxData
    INNER JOIN (
        SELECT 
            s3.IDCliente, 
            s3.Data, 
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        GROUP BY 
            s3.IDCliente, s3.Data
    ) MaxTime ON s1.IDCliente = MaxTime.IDCliente AND s1.Data = MaxTime.Data AND s1.Ora = MaxTime.MaxOra
)
SELECT 
    u.IDCliente,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u;

");
        $stmt->bind_param('i', $idNutrizionista);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNumberOfConsulenze($idCliente, $idNutrizionista)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS count FROM consulenza WHERE IDCliente=? AND IDNutrizionista=? AND Completa='s'");
        $stmt->bind_param('ii', $idCliente, $idNutrizionista);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getClienteByName($nome, $idNutrizionista)
    {
        $stmt = $this->db->prepare("WITH UltimaScelta AS (
    SELECT 
        s1.IDCliente,
        s1.IDNutrizionista,
        s1.Data,
        s1.Ora
    FROM 
        SCELTA s1
    INNER JOIN (
        SELECT 
            s2.IDCliente, 
            MAX(s2.Data) AS MaxData
        FROM 
            SCELTA s2
        GROUP BY 
            s2.IDCliente
    ) MaxDate ON s1.IDCliente = MaxDate.IDCliente AND s1.Data = MaxDate.MaxData
    INNER JOIN (
        SELECT 
            s3.IDCliente, 
            s3.Data, 
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        GROUP BY 
            s3.IDCliente, s3.Data
    ) MaxTime ON s1.IDCliente = MaxTime.IDCliente AND s1.Data = MaxTime.Data AND s1.Ora = MaxTime.MaxOra
)
SELECT 
    u.IDCliente,
    c.Nome,
    c.Cognome,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
INNER JOIN 
    CLIENTE c ON u.IDCliente = c.IDCliente
WHERE 
    LOWER(c.Nome) LIKE LOWER(?);
");

        $stmt->bind_param('is', $idNutrizionista, $nome);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getClienteBySurname($cognome, $idNutrizionista)
    {
        $stmt = $this->db->prepare("WITH UltimaScelta AS (
    SELECT 
        s1.IDCliente,
        s1.IDNutrizionista,
        s1.Data,
        s1.Ora
    FROM 
        SCELTA s1
    INNER JOIN (
        SELECT 
            s2.IDCliente, 
            MAX(s2.Data) AS MaxData
        FROM 
            SCELTA s2
        GROUP BY 
            s2.IDCliente
    ) MaxDate ON s1.IDCliente = MaxDate.IDCliente AND s1.Data = MaxDate.MaxData
    INNER JOIN (
        SELECT 
            s3.IDCliente, 
            s3.Data, 
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        GROUP BY 
            s3.IDCliente, s3.Data
    ) MaxTime ON s1.IDCliente = MaxTime.IDCliente AND s1.Data = MaxTime.Data AND s1.Ora = MaxTime.MaxOra
)
SELECT 
    u.IDCliente,
    c.Nome,
    c.Cognome,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
INNER JOIN 
    CLIENTE c ON u.IDCliente = c.IDCliente
WHERE 
    LOWER(c.Cognome) LIKE LOWER(?);  -- Sostituisci ? con il nome del cliente da filtrare
");

        $stmt->bind_param('is', $idNutrizionista, $cognome);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getClienteByCity($city, $idNutrizionista)
    {
        $stmt = $this->db->prepare("WITH UltimaScelta AS (
    SELECT 
        s1.IDCliente,
        s1.IDNutrizionista,
        s1.Data,
        s1.Ora
    FROM 
        SCELTA s1
    INNER JOIN (
        SELECT 
            s2.IDCliente, 
            MAX(s2.Data) AS MaxData
        FROM 
            SCELTA s2
        GROUP BY 
            s2.IDCliente
    ) MaxDate ON s1.IDCliente = MaxDate.IDCliente AND s1.Data = MaxDate.MaxData
    INNER JOIN (
        SELECT 
            s3.IDCliente, 
            s3.Data, 
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        GROUP BY 
            s3.IDCliente, s3.Data
    ) MaxTime ON s1.IDCliente = MaxTime.IDCliente AND s1.Data = MaxTime.Data AND s1.Ora = MaxTime.MaxOra
)
SELECT 
    u.IDCliente,
    c.Nome,
    c.Cognome,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
INNER JOIN 
    CLIENTE c ON u.IDCliente = c.IDCliente
WHERE 
    LOWER(c.Citta) LIKE LOWER(?);");

        $stmt->bind_param('is', $idNutrizionista, $city);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getClienteByNameAndSurname($nome, $cognome, $idNutrizionista)
    {
        $stmt = $this->db->prepare("WITH UltimaScelta AS (
    SELECT 
        s1.IDCliente,
        s1.IDNutrizionista,
        s1.Data,
        s1.Ora
    FROM 
        SCELTA s1
    INNER JOIN (
        SELECT 
            s2.IDCliente, 
            MAX(s2.Data) AS MaxData
        FROM 
            SCELTA s2
        GROUP BY 
            s2.IDCliente
    ) MaxDate ON s1.IDCliente = MaxDate.IDCliente AND s1.Data = MaxDate.MaxData
    INNER JOIN (
        SELECT 
            s3.IDCliente, 
            s3.Data, 
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        GROUP BY 
            s3.IDCliente, s3.Data
    ) MaxTime ON s1.IDCliente = MaxTime.IDCliente AND s1.Data = MaxTime.Data AND s1.Ora = MaxTime.MaxOra
)
SELECT 
    u.IDCliente,
    c.Nome,
    c.Cognome,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
INNER JOIN 
    CLIENTE c ON u.IDCliente = c.IDCliente
WHERE 
    LOWER(c.Nome) LIKE LOWER(?) AND LOWER(c.Cognome) LIKE LOWER(?);
");

        $stmt->bind_param('iss', $idNutrizionista, $nome, $cognome);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getClienteByNameAndCity($nome, $city, $idNutrizionista)
    {
        $stmt = $this->db->prepare("WITH UltimaScelta AS (
    SELECT 
        s1.IDCliente,
        s1.IDNutrizionista,
        s1.Data,
        s1.Ora
    FROM 
        SCELTA s1
    INNER JOIN (
        SELECT 
            s2.IDCliente, 
            MAX(s2.Data) AS MaxData
        FROM 
            SCELTA s2
        GROUP BY 
            s2.IDCliente
    ) MaxDate ON s1.IDCliente = MaxDate.IDCliente AND s1.Data = MaxDate.MaxData
    INNER JOIN (
        SELECT 
            s3.IDCliente, 
            s3.Data, 
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        GROUP BY 
            s3.IDCliente, s3.Data
    ) MaxTime ON s1.IDCliente = MaxTime.IDCliente AND s1.Data = MaxTime.Data AND s1.Ora = MaxTime.MaxOra
)
SELECT 
    u.IDCliente,
    c.Nome,
    c.Cognome,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
INNER JOIN 
    CLIENTE c ON u.IDCliente = c.IDCliente
WHERE 
    LOWER(c.Nome) LIKE LOWER(?) AND LOWER(c.Citta) LIKE LOWER(?);
");

        $stmt->bind_param('iss', $idNutrizionista, $nome, $city);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getClienteBySurnameAndCity($cognome, $city, $idNutrizionista)
    {
        $stmt = $this->db->prepare("WITH UltimaScelta AS (
    SELECT 
        s1.IDCliente,
        s1.IDNutrizionista,
        s1.Data,
        s1.Ora
    FROM 
        SCELTA s1
    INNER JOIN (
        SELECT 
            s2.IDCliente, 
            MAX(s2.Data) AS MaxData
        FROM 
            SCELTA s2
        GROUP BY 
            s2.IDCliente
    ) MaxDate ON s1.IDCliente = MaxDate.IDCliente AND s1.Data = MaxDate.MaxData
    INNER JOIN (
        SELECT 
            s3.IDCliente, 
            s3.Data, 
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        GROUP BY 
            s3.IDCliente, s3.Data
    ) MaxTime ON s1.IDCliente = MaxTime.IDCliente AND s1.Data = MaxTime.Data AND s1.Ora = MaxTime.MaxOra
)
SELECT 
    u.IDCliente,
    c.Nome,
    c.Cognome,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
INNER JOIN 
    CLIENTE c ON u.IDCliente = c.IDCliente
WHERE 
    LOWER(c.Cognome) LIKE LOWER(?) AND LOWER(c.Citta) LIKE LOWER(?);
");

        $stmt->bind_param('iss', $idNutrizionista, $cognome, $city);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getClienteByNameSurnameAndCity($nome, $cognome, $city, $idNutrizionista)
    {
        $stmt = $this->db->prepare("WITH UltimaScelta AS (
    SELECT 
        s1.IDCliente,
        s1.IDNutrizionista,
        s1.Data,
        s1.Ora
    FROM 
        SCELTA s1
    INNER JOIN (
        SELECT 
            s2.IDCliente, 
            MAX(s2.Data) AS MaxData
        FROM 
            SCELTA s2
        GROUP BY 
            s2.IDCliente
    ) MaxDate ON s1.IDCliente = MaxDate.IDCliente AND s1.Data = MaxDate.MaxData
    INNER JOIN (
        SELECT 
            s3.IDCliente, 
            s3.Data, 
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        GROUP BY 
            s3.IDCliente, s3.Data
    ) MaxTime ON s1.IDCliente = MaxTime.IDCliente AND s1.Data = MaxTime.Data AND s1.Ora = MaxTime.MaxOra
)
SELECT 
    u.IDCliente,
    c.Nome,
    c.Cognome,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
INNER JOIN 
    CLIENTE c ON u.IDCliente = c.IDCliente
WHERE 
    LOWER(c.Cognome) LIKE LOWER(?) AND LOWER(c.Citta) LIKE LOWER(?) AND LOWER(c.Nome) LIKE LOWER(?);
");

        $stmt->bind_param('isss', $idNutrizionista, $cognome, $city, $nome);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>