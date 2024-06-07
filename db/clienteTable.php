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
}

?>