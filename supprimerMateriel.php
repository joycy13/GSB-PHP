<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$uneRef=lireDonneePost("ref", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  supprimerMateriel($uneRef, $tabErreurs);
  if (nbErreurs($tabErreurs)==0)
  {
    $reussite = 1;
    $messageActionOk = "Le materiel a bien ete supprime";
  }

}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape==1)
{
  include($repVues."vSupprimerFormMateriel.php"); ;
}

include($repVues."pied.php") ;
?>
  
