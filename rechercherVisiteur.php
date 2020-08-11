<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
require($repInclude . "visiteur.php");
$unMat=lireDonneePost("mat", ""); 

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
       
  $etape = 2;
  
  $unVisiteur=rechercherVisiteur($unMat);
  
  if ($unVisiteur->getMatricule() == "")
  {
    $message = "Aucun visiteur n'a ete trouve";   
    ajouterErreur($tabErreurs, $message); 
    
  }
  
}

// Construction de la page Rechercher
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");
if ($etape==1)
{
  include($repVues."vRechercherFormVisiteur.php"); ;
}
else
{
  $unVisiteur=rechercherVisiteur($unMat);
  include($repVues."vRechercherVisiteur.php") ;
}
include($repVues."pied.php") ;
?>
  

