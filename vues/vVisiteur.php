

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($nom))
    {
?>
        <h3><?php echo $nom;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>Matricule</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Adresse</th>
          <th>Code postal</th>
          <th>Ville</th>
          <th>Date d'embauche</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($unVisiteur))
    { 
 ?>     
        <tr>
            <td><?php echo $unVisiteur[$i]->getMatricule()?></td>
            <td><?php echo $unVisiteur[$i]->getNom()?></td>
            <td align="right"><?php echo $unVisiteur[$i]->getPrenom()?></td>
            <td align="right"><?php echo $unVisiteur[$i]->getAdresse()?></td>
            <td align="right"><?php echo $unVisiteur[$i]->getCodeP()?></td>
            <td align="right"><?php echo $unVisiteur[$i]->getVille()?></td>
            <td align="right"><?php echo $unVisiteur[$i]->getDateE()?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>         
       </tbody>       
     </table>    
  </div>

 
