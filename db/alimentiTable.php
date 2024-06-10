<?php 

class AliementiTable{

    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAllAlimenti(){
        $stmt = $this->db->prepare("SELECT * FROM alimento");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllPasti(){
        $stmt = $this->db->prepare("SELECT * FROM pasto");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>