<?php

class Emprunt
{
  private $_dated;     
  private $_dater;  
  private $_matricule;  
  private $_reference; 
  
  public function __construct($dateD, $mat, $ref)
  {
    // N'oubliez pas qu'il faut assigner la valeur d'un attribut uniquement depuis son setter !
    $this->_dated = $dateD;
    $this->_matricule = $mat;
    $this->_reference = $ref;
  
  }
  
  public function setDateD($dateD)
  {
      $this->_dated = $dateD;
  }
        
  public function getDateD()
  {
      return $this->_dated;
  }      
    public function setDateR($dateR)
  {
      $this->_dater = $dateR;
  }
        
  public function getDateR()
  {
      return $this->_dater;
  }      
 
  public function setMatricule($mat)
  {
      $this->_matricule = $mat;
  }
        
  public function getMatricule()
  {
      return $this->_matricule;
  }      

  public function setReference($ref)
  {
      $this->_reference = $ref;
  }
        
  public function getReference()
  {
      return $this->_reference;
  }      
        
}
?>
