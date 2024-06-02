<?php 

class ConsulenzaTable{

    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getConsulenza($idCliente){
        $stmt = $this->db->prepare("SELECT consulenza.*, tipo.Tariffa
        FROM consulenza
        JOIN tipo_consulenza tipo ON consulenza.Tipo = tipo.Tipo
        WHERE consulenza.IDCliente = ?
        AND consulenza.Completa = 'n';");
        $stmt->bind_param('i', $idCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTypeConsulenza(){
        $stmt = $this->db->prepare("SELECT * FROM tipo_consulenza");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>