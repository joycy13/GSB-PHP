<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
require($repInclude . "materiel.php");
$uneRef=lireDonneePost("ref", ""); 

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
       
  $etape = 2;
  
  $unMateriel=rechercherMateriel($uneRef);
  
  if ($unMateriel->getReference() == "")
  {
    $message = "Aucun materiel n'a ete trouve";   
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
  include($repVues."vRechercherFormMateriel.php"); ;
}
else
{
  $unMateriel=rechercherMateriel($uneRef);
  include($repVues."vRechercherMateriel.php") ;
}
include($repVues."pied.php") ;
?>
  

