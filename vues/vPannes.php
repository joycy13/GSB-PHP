  

 <!-- Affichage des informations sur les fleurs-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>
<?php
    if (isset($num))
    {
?>
        <h3><?php echo $num;?></h3>
<?php    
    }
?>
      </caption>
      <thead>
        <tr>
          <th>Numéro</th>
          <th>Référence</th>
          <th>Libelle</th>
          <th>Date début</th>
          
          
        </tr>
      </thead>
      <tbody>  
<?php
    $i = 0;
    while($i < count($unePanne))
    { 
 ?>     
        <tr>
            <td><?php echo $unePanne[$i]->getNumero()?></td>
            <td><?php echo $unePanne[$i]->getReference()?></td>
            <td><?php echo $unePanne[$i]->getLibelle()?></td>
            <td align="right"><?php echo $unePanne[$i]->getDateD()?></td>
<?php
        $i = $i + 1;
     }
?>         
       </tbody>       
     </table>    
  </div>

 
