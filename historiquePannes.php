<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
  require($repInclude . "_init.inc.php");
  require($repInclude . "historiquePanne.php");
 
  $dateD="";
  if (isset($_GET['dateD']))
  {
  $dateD = $_GET['dateD'];
  }  
  $unePanne = historiquePannes();

  // Construction de la page Rechercher
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vHistoriquePannes.php");
  include($repVues."pied.php") ;
  ?>
    
