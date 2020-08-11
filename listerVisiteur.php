<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
  require($repInclude . "_init.inc.php");
  require($repInclude . "visiteur.php");
 
  $mat="";
  if (isset($_GET['mat']))
  {
  $mat = $_GET['mat'];
  }  
  $unVisiteur = listerVisiteur($mat);

  // Construction de la page Rechercher
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vVisiteur.php");
  include($repVues."pied.php") ;
  ?>
    