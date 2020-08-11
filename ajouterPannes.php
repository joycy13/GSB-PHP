<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
require($repInclude . "pannes.php");

$unNumero=lireDonneePost("num", ""); 
$uneReference=lireDonneePost("ref", "");
$unLibelle=lireDonneePost("lib", "");
$uneDateD=lireDonneePost("dateD", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  ajouterPanne($unNumero, $uneReference, $unLibelle, $uneDateD, $tabErreurs);
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
include($repVues."vAjouterPannes.php") ;
include($repVues."pied.php") ;
?>
  
