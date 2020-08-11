  

<!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($ref))
    {
?>
        <h3><?php echo $ref;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>Reference</th>
          <th>Libelle</th>
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
        
    while($i < count($unMateriel))
    { 
 ?>     
        <tr>
            <td><?php echo $unMateriel[$i]->getReference()?></td>
            <td align="right"><?php echo $unMateriel[$i]->getLibelle()?></td>
        </tr>
<?php
        $i = $i + 1;
     }
?>         
       </tbody>       
     </table>    
  </div>

 
