  

 <!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($dateD))
    {
?>
        <h3><?php echo $dateD;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>Date début</th>
          <th>Matricule</th>
          <th>Référence</th>
          <th>Date fin</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($unEmprunt))
    { 
 ?>     
        <tr>
            <td><?php echo $unEmprunt[$i]->getDateD()?></td>
            <td><?php echo $unEmprunt[$i]->getMatricule()?></td>
            <td><?php echo $unEmprunt[$i]->getReference()?></td>
            <td align="right"><?php echo $unEmprunt[$i]->getDateR()?></td>
<?php
        $i = $i + 1;
     }
?>         
       </tbody>       
     </table>    
  </div>

 
