<?php

class Materiel
{
  private $_reference;       
  private $_libelle;   
  
  public function __construct($ref, $lib)
  {
    // N'oubliez pas qu'il faut assigner la valeur d'un attribut uniquement depuis son setter !
    $this->_reference = $ref;
    $this->_libelle = $lib;
  
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
        
}
?>
