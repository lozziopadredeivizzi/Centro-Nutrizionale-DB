<?php

class DiarioTable
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCurrenDiary($idCliente)
    {
        $stmt = $this->db->prepare("SELECT d.*, n.*
FROM diario d
LEFT JOIN note n ON d.IDCliente = n.IDCliente 
                AND d.Data = n.Data 
                AND d.Ora = n.Ora 
                AND d.CodDiario = n.CodDiario
WHERE d.IDCliente = ? 
  AND d.IDNutrizionista = (
    SELECT IDNutrizionista 
    FROM scelta
    WHERE IDCliente = ? 
    ORDER BY Data DESC, Ora DESC 
    LIMIT 1
  )
  AND d.Data = (
    SELECT Data 
    FROM scelta 
    WHERE IDCliente = ? 
    ORDER BY Data DESC, Ora DESC 
    LIMIT 1
  )
  AND d.Ora = (
    SELECT Ora 
    FROM scelta 
    WHERE IDCliente = ? 
    ORDER BY Data DESC, Ora DESC 
    LIMIT 1
  )
");
        $stmt->bind_param('iiii', $idCliente, $idCliente, $idCliente, $idCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>