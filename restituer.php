  <?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Ajouter"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources nécessaires au fonctionnement de l'application

  $repVues = './vues/';
  require("./include/_bdGestionDonnees.lib.php");
  require("./include/_gestionSession.lib.php");
  require("./include/_utilitairesEtGestionErreurs.lib.php");
  // démarrage ou reprise de la session
  initSession();
  // initialement, aucune erreur ...
  $tabErreurs = array();


// DEBUT du contrôleur rechercher.php 

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  if (count($_POST)==1)
  {
    
    $uneRef=$_POST["ref"];
    $emprunt=restituerRefMateriel($uneRef, $tabErreurs);
    // Si une fleur est trouvée, on passe à l'étape suivante
    //var_dump($materiel);
    if (count($emprunt)>0)
    {
      $etape = 2;
    }
    else
    {
      // Aucune fleur n'est trouvée
      // Afficher un message d'erreur
      $message="Echec de la modification : la reference n'existe pas !";
      ajouterErreur($tabErreurs, $message);
      // Revenir à l'étape 1
      $etape = 1;
    }

  }
  else
  {
    $etape = 3;
    $uneDateR=$_POST["dateR"];
    $uneRef=$_POST["ref"];
    $unMat=$_POST["mat"];
    restituerMateriel($uneDateR, $unMat, $uneRef,$tabErreurs);
    // Message de réussite pour l'affichage
    if (nbErreurs($tabErreurs)==0)
    {
      $reussite = 1;
      $messageActionOk = "Le materiel a ete correctement modifie";
    }
  }
}


// Début de l'affichage (les vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues ."erreur.php");

switch ($etape)
{  
  case 1 :
   include($repVues."vRestituerRefMateriel.php");
   break;
  case 2 :
   include($repVues."vRestituerMateriel.php");
   break;
}
include($repVues."pied.php") ;
?>



