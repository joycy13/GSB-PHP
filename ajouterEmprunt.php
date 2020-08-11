<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
require($repInclude . "emprunt.php");
 
$uneDateD=lireDonneePost("dateD", "");
$unMatricule=lireDonneePost("mat", "");
$uneReference=lireDonneePost("ref", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  ajouterEmprunt($uneDateD, $unMatricule, $uneReference, $tabErreurs);
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
include($repVues."vAjouterEmprunt.php") ;
include($repVues."pied.php") ;
?>
  
