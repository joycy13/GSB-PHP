<?php
      
              if ( nbErreurs($tabErreurs) > 0 ) 
              {
 ?>
 <div class="container">

 <?php             
                echo toStringErreurs($tabErreurs);
 ?>
 </div>            
 <?php               
              }
?>
