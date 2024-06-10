<?php

class ConsulenzaTable
{

  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function getConsulenza($idCliente)
  {
    $stmt = $this->db->prepare("SELECT consulenza.*, tipo.Tariffa
        FROM consulenza
        JOIN tipo_consulenza tipo ON consulenza.Tipo = tipo.Tipo
        WHERE consulenza.IDCliente = ? AND consulenza.IDNutrizionista = (SELECT IDNutrizionista 
            FROM scelta 
            WHERE IDCliente = ? 
            ORDER BY Data DESC, Ora DESC 
            LIMIT 1)
        AND consulenza.Completa = 'n';");
    $stmt->bind_param('ii', $idCliente, $idCliente);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getTypeConsulenza()
  {
    $stmt = $this->db->prepare("SELECT * FROM tipo_consulenza");
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function checkDisponibility($data, $oraInizio, $idCliente)
  {
    $stmt = $this->db->prepare("SELECT COUNT(*) AS count 
        FROM consulenza 
        WHERE Giorno = ? 
          AND IDNutrizionista = (
            SELECT IDNutrizionista 
            FROM scelta 
            WHERE IDCliente = ?
            ORDER BY Data DESC, Ora DESC 
            LIMIT 1
          )
          AND (
            (OraInizio <= ? AND OraFine > ?) OR  
            (OraInizio < ADDTIME(?, '01:00:00') AND OraFine > ADDTIME(?, '01:00:00'))
          )");
    $stmt->bind_param('sissss', $data, $idCliente, $oraInizio, $oraInizio, $oraInizio, $oraInizio);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getConsulenzeDaFare($idNutrizionista){
    $stmt = $this->db->prepare("SELECT * FROM consulenza WHERE IDNutrizionista=? AND Completa='n'");
    $stmt->bind_param('i', $idNutrizionista);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }
}

?>