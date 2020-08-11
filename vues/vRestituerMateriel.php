<script type="text/javascript">
//<![CDATA[

function valider(){
 frm=document.forms['formAjout'];
  // si le prix est positif
  if(frm.elements['prix'].value >0) {
    // les données sont ok, on peut envoyer le formulaire    
    return true;
  }
  else {
    // sinon on affiche un message
    alert("Le libelle ne pas doit nul !");
    // et on indique de ne pas envoyer le formulaire
    return false;
  }
}
//]]>
</script>

<?php 
if (isset($message))
  {
?>
    <div class="container"><?php echo $message ?> </div>
<?php
  }
?>
 
<!--Saisir les informations dans un formulaire!-->
<div class="container">
  <form action="" method=post>
    <fieldset>
      <legend>Entrez les donnees sur le materiel a restituer </legend>
      <label> Reference :</label>
      <label><?php echo $emprunt["ref"]; ?> </label>
      <input type="hidden" placeholder="Entrer la reference" name="ref" value="<?php echo $emprunt["ref"]; ?>" /><br />
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
      <label> Date restitution :</label>
      <input type="date" placeholder="Entrer le date de restitution" name="dateR" value="<?php echo $emprunt["dateR"]; ?>" size="20" /><br />
    </fieldset>
    <button type="submit" class="btn btn-primary">Restituer</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>



