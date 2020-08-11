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
      <legend>Entrez les donnees sur le materiel a modifier </legend>
      <label> Reference :</label>
      <label><?php echo $materiel["ref"]; ?> </label>
      <input type="hidden" placeholder="Entrer la reference" name="ref" value="<?php echo $materiel["ref"]; ?>" /><br />
      <label> Libelle :</label>
      <input type="text" placeholder="Entrer le libelle" name="lib" value="<?php echo $materiel["lib"]; ?>" size="20" /><br />
    </fieldset>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>



