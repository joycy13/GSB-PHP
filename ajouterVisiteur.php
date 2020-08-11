<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$unMatricule=lireDonneePost("mat", "");
$unNom=lireDonneePost("nom", "");
$unPrenom=lireDonneePost("prenom", "");
$uneAdresse=lireDonneePost("adresse", "");
$unCodePostale=lireDonneePost("codeP", "");
$uneVille=lireDonneePost("ville", "");
$uneDateEmbauche=lireDonneePost("dateE", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  ajouterVisiteur($unMatricule, $unNom, $unPrenom, $uneAdresse, $unCodePostale, $uneVille, $uneDateEmbauche,$tabErreurs);
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
include($repVues."vAjouterVisiteur.php") ;
include($repVues."pied.php") ;
?>
  
