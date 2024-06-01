<?php 

class ClienteTable{

    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getClienteById($id){
        $stmt = $this->db->prepare("SELECT * FROM cliente WHERE IDCliente=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>