<!--Formulaire de modification � partir de l'identifiant -->

<div class="container">

<form action="" method=post>
<fieldset>
<legend>Entrez la reference du materiel a restituer </legend>
<label> Reference :</label>
       <?php  
    
        $connect = connecterServeurBD();
         
         
                 
        $resultat = $connect->query('SELECT M_Ref FROM emprunter');
        $resultat->setFetchmode(PDO::FETCH_OBJ);
        ?>
      <select name="ref">

     	<?php
        while ($ligne = $resultat->fetch() ) {
            ?><option><?php echo "". $ligne->M_Ref; ?></option><?php
        }
               $resultat->closeCursor();
        ?>

      </select> 
</fieldset>
<button type="submit" class="btn btn-primary">Restituer</button>
<button type="reset" class="btn">Annuler</button>
</form>

</div>
