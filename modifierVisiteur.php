<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources n�cessaires au fonctionnement de l'application

  $repVues = './vues/';
  require("./include/_bdGestionDonnees.lib.php");
  require("./include/_gestionSession.lib.php");
  require("./include/_utilitairesEtGestionErreurs.lib.php");
  // d�marrage ou reprise de la session
  initSession();
  // initialement, aucune erreur ...
  $tabErreurs = array();


// DEBUT du contr�leur rechercher.php 

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  if (count($_POST)==1)
  {
    
    $unMat=$_POST["mat"];
    $visiteur = rechercherRefVisiteur($unMat, $tabErreurs);
    // Si une fleur est trouv�e, on passe � l'�tape suivante
    //var_dump($materiel);
    if (count($visiteur)>0)
    {
      $etape = 2;
    }
    else
    {
      // Aucune fleur n'est trouv�e
      // Afficher un message d'erreur
      $message="Echec de la modification : le matricule n'existe pas !";
      ajouterErreur($tabErreurs, $message);
      // Revenir � l'�tape 1
      $etape = 1;
    }

  }
  else
  {
    $etape = 3;
    $unMat=$_POST["mat"];
    $unNom=$_POST["nom"];
    $unPrenom=$_POST["prenom"];
    $uneAdresse=$_POST["adresse"];
    $unCP=$_POST["codep"];
    $uneVille=$_POST["ville"];
    $uneDateE=$_POST["dateE"];
    modifierVisiteur($unMat, $unNom, $unPrenom, $uneAdresse, $unCP, $uneVille, $uneDateE,$tabErreurs);
    // Message de r�ussite pour l'affichage
    if (nbErreurs($tabErreurs)==0)
    {
      $reussite = 1;
      $messageActionOk = "Le visiteur a ete correctement modifie";
    }
  }
}


// D�but de l'affichage (les vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");

switch ($etape)
{  
  case 1 :
   include($repVues."vModifierRefFormVisiteur.php");
   break;
  case 2 :
   include($repVues."vModifierFormVisiteur.php");
   break;
}
include($repVues."pied.php") ;
?>



