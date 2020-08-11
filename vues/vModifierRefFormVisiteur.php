<!--Formulaire de modification à partir de l'identifiant -->

<div class="container">

<form action="" method=post>
<fieldset>
<legend>Entrez le matricule du materiel a modifier </legend>
<label> Matricule :</label>
       <?php  
    
        $connect = connecterServeurBD();
         
         
                 
        $resultat = $connect->query('SELECT VIS_MATRICULE FROM visiteur');
        $resultat->setFetchmode(PDO::FETCH_OBJ);
        ?>
      <select name="mat">

     	<?php
        while ($ligne = $resultat->fetch() ) {
            ?><option><?php echo "". $ligne->VIS_MATRICULE; ?></option><?php
        }
               $resultat->closeCursor();
        ?>

      </select> 
</fieldset>
<button type="submit" class="btn btn-primary">Modifier</button>
<button type="reset" class="btn">Annuler</button>
</form>

</div>
