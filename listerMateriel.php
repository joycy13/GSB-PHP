<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
  require($repInclude . "_init.inc.php");
  require($repInclude . "materiel.php");
 
  $ref="";
  if (isset($_GET['ref']))
  {
  $ref = $_GET['ref'];
  }  
  $unMateriel = listerMateriel($ref);

  // Construction de la page Rechercher
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vMateriel.php");
  include($repVues."pied.php") ;
  ?>
    
