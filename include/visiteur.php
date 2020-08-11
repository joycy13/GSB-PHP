<?php

class Visiteur
{
  private $_matricule;       
  private $_nom; 
  private $_prenom;  
  private $_adresse;
  private $_codep;
  private $_ville;
  private $_dateE;  
  
  public function __construct($mat, $nom, $prenom, $adresse, $codep, $ville, $dateE)
  {
    // N'oubliez pas qu'il faut assigner la valeur d'un attribut uniquement depuis son setter !
    $this->_matricule = $mat;
    $this->_nom = $nom;
    $this->_prenom = $prenom;
    $this->_adresse = $adresse;
    $this->_codep = $codep;
    $this->_ville = $ville;
    $this->_dateE = $dateE;
  
  }
  
  public function setMatricule($mat)
  {
      $this->_matricule = $mat;
  }
        
  public function getMatricule()
  {
      return $this->_matricule;
  }      
 
  public function setNom($nom)
  {
      $this->_nom = $nom;
  }

  public function getNom()
  {
      return $this->_nom;
  }

  public function setPrenom($prenom)
  {
      $this->_prenom = $prenom;
  }

  public function getPrenom()
  {
      return $this->_prenom;
  }    

  public function setAdresse($adresse)
  {
      $this->_adresse = $adresse;
  }

  public function getAdresse()
  {
      return $this->_adresse;
  } 
 
  public function setCodeP($codep)
  {
      $this->_codep = $codep;
  }

  public function getCodeP()
  {
      return $this->_codep;
  } 
 
  public function setVille($ville)
  {
      $this->_ville = $ville;
  }

  public function getVille()
  {
      return $this->_ville;
  } 
  
  public function setDateE($dateE)
  {
      $this->_dateE = $dateE;
  }

  public function getDateE()
  {
      return $this->_dateE;
  }   
  
}
