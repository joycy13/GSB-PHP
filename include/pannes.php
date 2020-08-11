<?php

class Pannes
{
  private $_numero;
  private $_reference;
  private $_libelle;     
  private $_dated;  
  private $_datef;  
   
  
  public function __construct($num, $ref, $lib, $dateD)
  {
    // N'oubliez pas qu'il faut assigner la valeur d'un attribut uniquement depuis son setter !
    $this->_numero = $num;
    $this->_reference = $ref;
    $this->_libelle = $lib;
    $this->_dated = $dateD;
  
  }
  
    public function setNumero($num)
  {
      $this->_numero = $num;
  }
        
  public function getNumero()
  {
      return $this->_numero;
  } 

  public function setReference($ref)
  {
      $this->_reference = $ref;
  }
        
  public function getReference()
  {
      return $this->_reference;
  }      

  public function setLibelle($lib)
  {
      $this->_libelle = $lib;
  }
        
  public function getLibelle()
  {
      return $this->_libelle;
  }

  public function setDateD($dateD)
  {
      $this->_dated = $dateD;
  }
        
  public function getDateD()
  {
      return $this->_dated;
  }      
    public function setDateF($dateF)
  {
      $this->_datef = $dateF;
  }
        
  public function getDateF()
  {
      return $this->_datef;
  }            
}
?>
