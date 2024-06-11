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
        s.IDCliente,
        s.IDNutrizionista
    FROM 
        SCELTA s
    WHERE 
        (s.IDCliente, s.Data, s.Ora) IN (
            SELECT 
                s2.IDCliente, 
                MAX(s2.Data) AS MaxData, 
                MAX(s2.Ora) AS MaxOra
            FROM 
                SCELTA s2
            GROUP BY 
                s2.IDCliente
        )
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
        s.IDCliente,
        c.Nome,
        s.IDNutrizionista,
        s.Data,
        s.Ora
    FROM 
        SCELTA s
    JOIN
        CLIENTE c ON s.IDCliente = c.IDCliente
    WHERE 
        (c.Nome, s.Data, s.Ora) IN (
            SELECT 
                c2.Nome, 
                MAX(s2.Data) AS MaxData, 
                MAX(s2.Ora) AS MaxOra
            FROM 
                SCELTA s2
            JOIN
                CLIENTE c2 ON s2.IDCliente = c2.IDCliente
            GROUP BY 
                c2.Nome
        )
)
SELECT 
    u.IDCliente,
    u.Nome AS NomeCliente,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
WHERE
    (u.Nome, u.Data, u.Ora) IN (
        SELECT 
            c3.Nome,
            MAX(s3.Data) AS MaxData,
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        JOIN
            CLIENTE c3 ON s3.IDCliente = c3.IDCliente
        WHERE
            LOWER(c3.Nome) LIKE LOWER(?)
        GROUP BY 
            c3.Nome
    );

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
        s.IDCliente,
        c.Nome,
        s.IDNutrizionista,
        s.Data,
        s.Ora
    FROM 
        SCELTA s
    JOIN
        CLIENTE c ON s.IDCliente = c.IDCliente
    WHERE 
        (c.Nome, s.Data, s.Ora) IN (
            SELECT 
                c2.Nome, 
                MAX(s2.Data) AS MaxData, 
                MAX(s2.Ora) AS MaxOra
            FROM 
                SCELTA s2
            JOIN
                CLIENTE c2 ON s2.IDCliente = c2.IDCliente
            GROUP BY 
                c2.Nome
        )
)
SELECT 
    u.IDCliente,
    u.Nome AS NomeCliente,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
WHERE
    (u.Nome, u.Data, u.Ora) IN (
        SELECT 
            c3.Nome,
            MAX(s3.Data) AS MaxData,
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        JOIN
            CLIENTE c3 ON s3.IDCliente = c3.IDCliente
        WHERE
            LOWER(c3.Cognome) LIKE LOWER(?)
        GROUP BY 
            c3.Cognome
    );

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
        s.IDCliente,
        c.Nome,
        s.IDNutrizionista,
        s.Data,
        s.Ora
    FROM 
        SCELTA s
    JOIN
        CLIENTE c ON s.IDCliente = c.IDCliente
    WHERE 
        (c.Nome, s.Data, s.Ora) IN (
            SELECT 
                c2.Nome, 
                MAX(s2.Data) AS MaxData, 
                MAX(s2.Ora) AS MaxOra
            FROM 
                SCELTA s2
            JOIN
                CLIENTE c2 ON s2.IDCliente = c2.IDCliente
            GROUP BY 
                c2.Nome
        )
)
SELECT 
    u.IDCliente,
    u.Nome AS NomeCliente,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
WHERE
    (u.Nome, u.Data, u.Ora) IN (
        SELECT 
            c3.Nome,
            MAX(s3.Data) AS MaxData,
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        JOIN
            CLIENTE c3 ON s3.IDCliente = c3.IDCliente
        WHERE
            LOWER(c3.Citta) LIKE LOWER(?)
        GROUP BY 
            c3.Citta
    );

        ");
        
        $stmt->bind_param('is', $idNutrizionista, $city);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getClienteByNameAndSurname($nome, $cognome, $idNutrizionista)
    {
        $stmt = $this->db->prepare("WITH UltimaScelta AS (
    SELECT 
        s.IDCliente,
        c.Nome,
        c.Cognome,
        s.IDNutrizionista,
        s.Data,
        s.Ora
    FROM 
        SCELTA s
    JOIN
        CLIENTE c ON s.IDCliente = c.IDCliente
    WHERE 
        (c.Nome, c.Cognome, s.Data, s.Ora) IN (
            SELECT 
                c2.Nome, 
                c2.Cognome,
                MAX(s2.Data) AS MaxData, 
                MAX(s2.Ora) AS MaxOra
            FROM 
                SCELTA s2
            JOIN
                CLIENTE c2 ON s2.IDCliente = c2.IDCliente
            GROUP BY 
                c2.Nome, c2.Cognome
        )
)
SELECT 
    u.IDCliente,
    u.Nome AS NomeCliente,
    u.Cognome AS CognomeCliente,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
WHERE
    (u.Nome, u.Cognome, u.Data, u.Ora) IN (
        SELECT 
            c3.Nome,
            c3.Cognome,
            MAX(s3.Data) AS MaxData,
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        JOIN
            CLIENTE c3 ON s3.IDCliente = c3.IDCliente
        WHERE
            LOWER(c3.Nome) LIKE LOWER(?) AND LOWER(c3.Cognome) LIKE LOWER(?)
        GROUP BY 
            c3.Nome, c3.Cognome
    );
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
        s.IDCliente,
        c.Nome,
        c.Cognome,
        s.IDNutrizionista,
        s.Data,
        s.Ora
    FROM 
        SCELTA s
    JOIN
        CLIENTE c ON s.IDCliente = c.IDCliente
    WHERE 
        (c.Nome, c.Cognome, s.Data, s.Ora) IN (
            SELECT 
                c2.Nome, 
                c2.Cognome,
                MAX(s2.Data) AS MaxData, 
                MAX(s2.Ora) AS MaxOra
            FROM 
                SCELTA s2
            JOIN
                CLIENTE c2 ON s2.IDCliente = c2.IDCliente
            GROUP BY 
                c2.Nome, c2.Cognome
        )
)
SELECT 
    u.IDCliente,
    u.Nome AS NomeCliente,
    u.Cognome AS CognomeCliente,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
WHERE
    (u.Nome, u.Cognome, u.Data, u.Ora) IN (
        SELECT 
            c3.Nome,
            c3.Cognome,
            MAX(s3.Data) AS MaxData,
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        JOIN
            CLIENTE c3 ON s3.IDCliente = c3.IDCliente
        WHERE
            LOWER(c3.Nome) LIKE LOWER(?) AND LOWER(c3.Citta) LIKE LOWER(?)
        GROUP BY 
            c3.Nome, c3.Citta
    );
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
        s.IDCliente,
        c.Nome,
        c.Cognome,
        s.IDNutrizionista,
        s.Data,
        s.Ora
    FROM 
        SCELTA s
    JOIN
        CLIENTE c ON s.IDCliente = c.IDCliente
    WHERE 
        (c.Nome, c.Cognome, s.Data, s.Ora) IN (
            SELECT 
                c2.Nome, 
                c2.Cognome,
                MAX(s2.Data) AS MaxData, 
                MAX(s2.Ora) AS MaxOra
            FROM 
                SCELTA s2
            JOIN
                CLIENTE c2 ON s2.IDCliente = c2.IDCliente
            GROUP BY 
                c2.Nome, c2.Cognome
        )
)
SELECT 
    u.IDCliente,
    u.Nome AS NomeCliente,
    u.Cognome AS CognomeCliente,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
WHERE
    (u.Nome, u.Cognome, u.Data, u.Ora) IN (
        SELECT 
            c3.Nome,
            c3.Cognome,
            MAX(s3.Data) AS MaxData,
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        JOIN
            CLIENTE c3 ON s3.IDCliente = c3.IDCliente
        WHERE
            LOWER(c3.Cognome) LIKE LOWER(?) AND LOWER(c3.Citta) LIKE LOWER(?)
        GROUP BY 
            c3.Cognome, c3.Citta
    );
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
        s.IDCliente,
        c.Nome,
        c.Cognome,
        s.IDNutrizionista,
        s.Data,
        s.Ora
    FROM 
        SCELTA s
    JOIN
        CLIENTE c ON s.IDCliente = c.IDCliente
    WHERE 
        (c.Nome, c.Cognome, s.Data, s.Ora) IN (
            SELECT 
                c2.Nome, 
                c2.Cognome,
                MAX(s2.Data) AS MaxData, 
                MAX(s2.Ora) AS MaxOra
            FROM 
                SCELTA s2
            JOIN
                CLIENTE c2 ON s2.IDCliente = c2.IDCliente
            GROUP BY 
                c2.Nome, c2.Cognome
        )
)
SELECT 
    u.IDCliente,
    u.Nome AS NomeCliente,
    u.Cognome AS CognomeCliente,
    CASE 
        WHEN u.IDNutrizionista = ? THEN 'Sì'
        ELSE 'No'
    END AS E_L_ultima_scelta
FROM 
    UltimaScelta u
WHERE
    (u.Nome, u.Cognome, u.Data, u.Ora) IN (
        SELECT 
            c3.Nome,
            c3.Cognome,
            MAX(s3.Data) AS MaxData,
            MAX(s3.Ora) AS MaxOra
        FROM 
            SCELTA s3
        JOIN
            CLIENTE c3 ON s3.IDCliente = c3.IDCliente
        WHERE
            LOWER(c3.Cognome) LIKE LOWER(?) AND LOWER(c3.Citta) LIKE LOWER(?) AND LOWER(c3.Nome) LIKE LOWER(?)
        GROUP BY 
            c3.Cognome, c3.Citta, c3.Nome
    );
");
        
        $stmt->bind_param('isss', $idNutrizionista, $cognome, $city, $nome);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>