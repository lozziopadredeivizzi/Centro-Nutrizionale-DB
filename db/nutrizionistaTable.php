<?php 

class NutrizionistaTable{

    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getNutrizionistaById($id){
        $stmt = $this->db->prepare("SELECT * FROM nutrizionista WHERE IDNutrizionista=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNutrizionistaInfoById($id){
        $stmt = $this->db->prepare("SELECT * FROM informazione WHERE IDNutrizionista=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>