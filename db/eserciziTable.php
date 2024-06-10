<?php 

class EserciziTable{

    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAllExercises(){
        $stmt = $this->db->prepare("SELECT * FROM esercizio");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>