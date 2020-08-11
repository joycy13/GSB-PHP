<?php

// MODIFs A FAIRE
// Ajouter en têtes 
// Voir : jeu de caractères à la connection

/** 
 * Se connecte au serveur de données                     
 * Se connecte au serveur de données à partir de valeurs
 * prédéfinies de connexion (hôte, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succès obtenu, le booléen false 
 * si problème de connexion.
 * @return resource identifiant de connexion
 */
 

function connecterServeurBD() 
{
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='8889';
    $PARAM_nom_bd='visiteurs'; // le nom de votre base de données
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe='root'; // mot de passe de l'utilisateur pour se connecter
    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
    return $connect;

    //$hote = "localhost";
    // $login = "root";
    // $mdp = "";
    // return mysql_connect($hote, $login, $mdp);
}   


/** 
 * Ferme la connexion au serveur de données.
 * Ferme la connexion au serveur de données identifiée par l'identifiant de 
 * connexion $idCnx.
 * @param resource $idCnx identifiant de connexion
 * @return void  
 */
function deconnecterServeurBD($idCnx) {

}


function listerVisiteur($mat)
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
      
           
      $requete="select * from visiteur";
      if ($mat!="")
      {
          $requete=$requete." where VIS_MATRICULE='".$mat."';";
      }
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();

      while($ligne)
      {
          $visiteur[$i]['mat']=$ligne->VIS_MATRICULE;
          $visiteur[$i]['nom']=$ligne->VIS_NOM;
          $visiteur[$i]['prenom']=$ligne->VIS_PRENOM;
          $visiteur[$i]['adresse']=$ligne->VIS_ADRESSE;
          $visiteur[$i]['codep']=$ligne->VIS_CP;
          $visiteur[$i]['ville']=$ligne->VIS_VILLE;
          $visiteur[$i]['dateE']=$ligne->VIS_DATEEMBAUCHE;
          
          $unVisiteur[$i] = new Visiteur($ligne->VIS_MATRICULE,
                            $ligne->VIS_NOM, 
                            $ligne->VIS_PRENOM,
                            $ligne->VIS_ADRESSE,
                            $ligne->VIS_CP,
                            $ligne->VIS_VILLE,
                            $ligne->VIS_DATEEMBAUCHE,  "");
          
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $unVisiteur;
}


function ajouterVisiteur($mat, $nom, $prenom,$adresse, $codep, $ville, $dateE, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$mat."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : le visiteur existe deja !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Créer la requête d'ajout 
       $requete="insert into visiteur"
       ."(VIS_MATRICULE,VIS_NOM,VIS_PRENOM,VIS_ADRESSE,VIS_CP,VIS_VILLE,VIS_DATEEMBAUCHE) values ('"
       .$mat."','"
       .$nom."','"
       .$prenom."','"
       .$adresse."','"
       .$codep."','"
       .$ville."','"
       .$dateE."');";
       echo $requete;

        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le visiteur a ete correctement ajoutee";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout du visiteur a echoue !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "Probleme a la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

function listerMateriel($ref)
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
      
           
      $requete="select * from materiel";
      if ($ref!="")
      {
          $requete=$requete." where M_Ref='".$ref."';";
      }
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();

      while($ligne)
      {
          $materiel[$i]['ref']=$ligne->M_Ref;
          $materiel[$i]['lib']=$ligne->M_Lib;
          
          $unMateriel[$i] = new Materiel($ligne->M_Ref,
                            $ligne->M_Lib, "");

          
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $unMateriel;
}


function ajouterMateriel($ref, $lib,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    // Vérifier que la référence saisie n'existe pas déja
    $requete="select * from materiel";
    $requete=$requete." where M_Ref = '".$ref."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
      $message="Echec de l'ajout : le materiel existe deja !";
      ajouterErreur($tabErr, $message);
    }
    else
    {
      // Créer la requête d'ajout 
       $requete="insert into materiel"
       ."(M_Ref,M_Lib) values ('"
       .$ref."','"
       .$lib."')";
       

        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le materiel a ete correctement ajoutee";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'ajout du materiel a echoue !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  }
  else
  {
    $message = "Probleme a la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

function rechercherVisiteur($mat)
{
    $connexion = connecterServeurBD();
   
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE='".$mat."';";  
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant 
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet   

    $ligne = $jeuResultat->fetch();
    if($ligne)
    {

          $unVisiteur = new Visiteur($ligne->VIS_MATRICULE,
                            $ligne->VIS_NOM, 
                            $ligne->VIS_PRENOM,
                            $ligne->VIS_ADRESSE,
                            $ligne->VIS_CP,
                            $ligne->VIS_VILLE,
                            $ligne->VIS_DATEEMBAUCHE,  "");
    }
    else 
    {
          $unVisiteur = new Visiteur ("","","","","","","");
      
    }
    $jeuResultat->closeCursor();   // fermer le jeu de résultat

  return $unVisiteur;
}

function rechercherMateriel($ref)
{
    $connexion = connecterServeurBD();
    
    $requete="select * from materiel";
    $requete=$requete." where M_Ref='".$ref."';";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet  
  
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
        $unMateriel = new Materiel($ligne->M_Ref,
                            $ligne->M_Lib, "");
      
    }
    else 
    {
     $unMateriel = new Materiel("","");
      
    }
    
    $jeuResultat->closeCursor();   // fermer le jeu de résultat
  
  return $unMateriel;
}

function rechercherRefVisiteur($mat,&$tabErr)
{
  $visiteur=array();
  
  $connexion = connecterServeurBD();
  
  // Création de la requête
  $requete="select * from visiteur";
  $requete=$requete." where VIS_MATRICULE = '".$mat."';"; 
  
  $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $ligne = $jeuResultat->fetch();

  if($ligne)
  {
    $visiteur['mat']=$ligne["VIS_MATRICULE"];
    $visiteur['nom']=$ligne["VIS_NOM"];
    $visiteur['prenom']=$ligne["VIS_PRENOM"];
    $visiteur['adresse']=$ligne["VIS_ADRESSE"];
    $visiteur['codep']=$ligne["VIS_CP"];
    $visiteur['ville']=$ligne["VIS_VILLE"];
    $visiteur['dateE']=$ligne["VIS_DATEEMBAUCHE"];

  }

  return $visiteur;
}

function rechercherRefMateriel($ref,&$tabErr)
{
  $materiel=array();
  
  $connexion = connecterServeurBD();
  
  // Création de la requête
  $requete="select * from materiel";
  $requete=$requete." where M_Ref = '".$ref."';"; 
  
  $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $ligne = $jeuResultat->fetch();

  if($ligne)
  {
    $materiel['ref']=$ligne["M_Ref"];
    $materiel['lib']=$ligne["M_Lib"];
  }

  return $materiel;
}

function modifierVisiteur($mat, $nom, $prenom, $adresse, $codep, $ville, $dateE, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if ($connexion) 
  {

    // Créer la requête de modification 

    $requete="update visiteur "
       ."SET VIS_MATRICULE= '".$mat."',
       VIS_NOM='".$nom. "',
       VIS_PRENOM='".$prenom."',
       VIS_ADRESSE='".$adresse."',
       VIS_CP='".$codep."',
       VIS_VILLE='".$ville."',
       VIS_DATEEMBAUCHE='".$dateE."'
       where VIS_MATRICULE= '".$mat."'";

    // Lancer la requête de modification
    $ok=$connexion->query($requete); 
   
    // Si la requête a échoué
    if ($ok==false)
    {
      $message = "Attention, la modification visiteur a echoue !!!";
      ajouterErreur($tabErr, $message);
    }
    else 
    {
      $message = "Le visiteur a ete correctement modifie";
      ajouterErreur($tabErr, $message);	
    } 

  }
  else
  {
    $message = "Probleme a la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

function modifierMateriel($ref, $lib,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if ($connexion) 
  {

    // Créer la requête de modification 

    $requete ="update materiel set M_Ref ='".$ref.
      "',M_Lib='".$lib.
      "' where M_Ref='".$ref."';";

    // Lancer la requête de modification
    $ok=$connexion->query($requete); 
   
    // Si la requête a échoué
    if ($ok==false)
    {
      $message = "Attention, la modification du materiel a echoue !!!";
      ajouterErreur($tabErr, $message);
    }
    else 
    {
      $message = "Le materiel a correctement ete modifie";
      ajouterErreur($tabErr, $message);	
    } 

  }
  else
  {
    $message = "Probleme a la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

function supprimerVisiteur($mat,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // Vérifier que la référence saisie existe
    $requete="select * from visiteur";
    $requete=$requete." where VIS_MATRICULE = '".$mat."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
       // Créer la requête de suppression 
       $requete ="delete from visiteur where VIS_MATRICULE='".$mat."';";  
   
       // Lancer la requête de suppression
       $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si échec de la requete
        if ($ok==FALSE)
        {
          $message = "Attention, la suppression du visiteur a echoue !!!";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Le visiteur a ete correctement supprime";
          ajouterErreur($tabErr, $message);	
        } 
  
    } 
    else
    {
      $message="Echec de la suppression : le matricule n'existe pas !";
      ajouterErreur($tabErr, $message);
    }  
}

function supprimerMateriel($ref,&$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
    
    // Vérifier que la référence saisie existe
    $requete="select * from materiel";
    $requete=$requete." where M_Ref = '".$ref."';"; 
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
    //$jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
    
    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
       // Créer la requête de suppression 
       $requete ="delete from materiel where M_Ref='".$ref."';";  
  
       // Lancer la requête de suppression
       $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
          
        // Si échec de la requete
        if ($ok==FALSE)
        {
          $message = "Attention, la suppression du materiel a echoue !!!";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Le materiel a ete correctement supprime";
          ajouterErreur($tabErr, $message);	
        } 
  
    } 
    else
    {
      $message="Echec de la suppression : la reference n'existe pas !";
      ajouterErreur($tabErr, $message);
    }  
}

function ajouterEmprunt($dateD, $mat, $ref, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    $date=date("Y-m-d") ;
      // Créer la requête d'ajout 
       $requete="insert into emprunter "
       ."(date_d, VIS_MATRICULE, M_Ref) VALUES ('"
       .$dateD."', '"
       .$mat."', '"
       .$ref."');";
       
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le materiel a été correctement emprunte";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, l'emprunt du materiel a échoué !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

function listerEmprunt()
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
           
      $requete="select date_d, VIS_MATRICULE, M_Ref from emprunter where date_r is NULL ";
     
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();

      while($ligne)
      {
          $emprunt[$i]['dateD']=$ligne->date_d;
          $emprunt[$i]['mat']=$ligne->VIS_MATRICULE;
          $emprunt[$i]['ref']=$ligne->M_Ref;
     
          
          $unEmprunt[$i] = new Emprunt($ligne->date_d, $ligne->VIS_MATRICULE, $ligne->M_Ref);

          
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $unEmprunt;
}
function historiqueEmprunt()
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
           
      $requete="select * from emprunter";
     
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();

      while($ligne)
      {
          $emprunt[$i]['dateD']=$ligne->date_d;
          $emprunt[$i]['mat']=$ligne->VIS_MATRICULE;
          $emprunt[$i]['ref']=$ligne->M_Ref;
          $emprunt[$i]['dateR']=$ligne->date_r;
     
          
          $unEmprunt[$i] = new historiqueEmprunt($ligne->date_d, $ligne->VIS_MATRICULE, $ligne->M_Ref, $ligne->date_r);

          
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $unEmprunt;
}

function restituerRefMateriel($ref,&$tabErr)
{
  $emprunt=array();
  
  $connexion = connecterServeurBD();
  
  // Création de la requête
  $requete="select * from emprunter";
  $requete=$requete." where M_Ref = '".$ref."';"; 
  
  $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $ligne = $jeuResultat->fetch();

  if($ligne)
  {
    $emprunt['dateR']=$ligne["date_r"];
    $emprunt['mat']=$ligne["VIS_MATRICULE"];
    $emprunt['ref']=$ligne["M_Ref"];
  }

  return $emprunt;
}

function restituerMateriel($dateR, $mat, $ref, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    $dateRet=date("Y-m-d") ;
      // Créer la requête d'ajout 
           $requete="update emprunter" 
       ." set date_r= '".$dateR."'"
       ." where M_Ref= '".$ref."' and VIS_MATRICULE= '".$mat."'  ;";

       
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Le materiel a été correctement restitue";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, la restitution du materiel a échoué !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

function ajouterPanne($num, $ref, $lib, $dateD, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    $date=date("Y-m-d") ;
      // Créer la requête d'ajout 
       $requete="insert into pannes "
       ."(P_Num, M_Ref, P_Lib, DateD) VALUES ('"
       .$num."', '"
       .$ref."', '"
       .$lib."', '"
       .$dateD."');";
       
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "La panne a correctement ete signalee";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, le signal a échoué !!!";
          ajouterErreur($tabErr, $message);
          echo ($requete);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }
}

function listerPannes()
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
           
      $requete="select P_Num, M_Ref, P_Lib, DateD from pannes where DateF is NULL ";
     
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();

      while($ligne)
      {
          $pannes[$i]['num']=$ligne->P_Num;
          $pannes[$i]['ref']=$ligne->M_Ref;
          $pannes[$i]['lib']=$ligne->P_Lib;
          $pannes[$i]['dateD']=$ligne->DateD;
          
          $unePanne[$i] = new Pannes($ligne->P_Num, $ligne->M_Ref, $ligne->P_Lib, $ligne->DateD);

          
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $unePanne;
}

function historiquePannes()
{
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
           
      $requete="select * from pannes";
     
      
      $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $jeuResultat->fetch();

      while($ligne)
      {
          $pannes[$i]['num']=$ligne->P_Num;
          $pannes[$i]['ref']=$ligne->M_Ref;
          $pannes[$i]['lib']=$ligne->P_Lib;
          $pannes[$i]['dateD']=$ligne->DateD;
          $pannes[$i]['dateF']=$ligne->DateF;
          
          $unePanne[$i] = new historiquePannes($ligne->P_Num, $ligne->M_Ref, $ligne->P_Lib, $ligne->DateD, $ligne->DateF);

          
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;
      }
  }
  $jeuResultat->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $unePanne;
}

function retirerRefPanne($ref,&$tabErr)
{
  $panne=array();
  
  $connexion = connecterServeurBD();
  
  // Création de la requête
  $requete="select * from pannes";
  $requete=$requete." where M_Ref = '".$ref."';"; 
  
  $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $ligne = $jeuResultat->fetch();

  if($ligne)
  {
    $panne['dateF']=$ligne["DateF"];
    $panne['num']=$ligne["P_Num"];
    $panne['ref']=$ligne["M_Ref"];
  }

  return $panne;
}

function retirerPannes($dateF, $num, $ref, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = connecterServeurBD();
  
  // Si la connexion au SGBD à réussi
  if (TRUE) 
  {
    
    $dateRet=date("Y-m-d") ;
      // Créer la requête d'ajout 
           $requete="update pannes" 
       ." set DateF= '".$dateF."'"
       ." where M_Ref= '".$ref."' and P_Num= '".$num."'  ;";

       
        // Lancer la requête d'ajout 
        $ok=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
       
        // Si la requête a réussi
        if ($ok)
        {
          $message = "Pb de panne resolu";
          ajouterErreur($tabErr, $message);
        }
        else
        {
          $message = "Attention, le retrait de la panne a echouee !!!";
          ajouterErreur($tabErr, $message);
        } 

    }
    // fermer la connexion
    // deconnecterServeurBD($idConnexion);
  
  else
  {
    $message = "problème à la connexion <br />";
    ajouterErreur($tabErr, $message);
  }

}
?>
