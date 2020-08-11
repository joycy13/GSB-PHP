

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
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($unVisiteur))
    { 
 ?>     
        <tr>
            <td><?php echo $unVisiteur->getMatricule()?></td>
            <td><?php echo $unVisiteur->getNom()?></td>
            <td align="right"><?php echo $unVisiteur->getPrenom()?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>         
       </tbody>       
     </table>    
  </div>

 
