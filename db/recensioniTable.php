<?php

class RecensioniTable
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function getRecensioniByNutrizionistaId($idNutrizionista)
  {
    $stmt = $this->db->prepare("SELECT * FROM recensione WHERE IDNutrizionista = ?");
    $stmt->bind_param('i', $idNutrizionista);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function getRecensioniByClienteId($idCliente)
  {
    $stmt = $this->db->prepare("SELECT * FROM recensione WHERE IDCliente = ?");
    $stmt->bind_param('i', $idCliente);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function addRecensione($idCliente, $idNutrizionista, $voto, $commento)
  {
    $stmt = $this->db->prepare("INSERT INTO recensione (IDCliente, IDNutrizionista, Voto, Commento) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('iiis', $idCliente, $idNutrizionista, $voto, $commento);
    $stmt->execute();
  }

  public function getMediaVotiByNutrizionistaId($idNutrizionista)
  {
    $stmt = $this->db->prepare("SELECT AVG(Voto) as MediaVoti FROM recensione WHERE IDNutrizionista = ?");
    $stmt->bind_param('i', $idNutrizionista);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  public function getNumeroTotaleRecensioniByNutrizionistaId($idNutrizionista)
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS NumeroTotaleRecensioni FROM recensione WHERE IDNutrizionista = ?");
        $stmt->bind_param('i', $idNutrizionista);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Nuova funzione per ottenere recensioni e il loro numero totale
    public function getRecensioniECountByNutrizionistaId($idNutrizionista)
    {
        $recensioni = $this->getRecensioniByNutrizionistaId($idNutrizionista);
        $numeroTotaleRecensioni = $this->getNumeroTotaleRecensioniByNutrizionistaId($idNutrizionista);
        return array(
            "recensioni" => $recensioni,
            "numeroTotaleRecensioni" => $numeroTotaleRecensioni["NumeroTotaleRecensioni"]
        );
    }
}
