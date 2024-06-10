<?php 

class ObiettiviTable{

    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAllObiettivi(){
        $stmt = $this->db->prepare("SELECT * FROM obiettivo");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>