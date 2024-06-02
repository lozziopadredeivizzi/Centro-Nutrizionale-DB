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
}

?>