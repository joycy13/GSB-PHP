<script type="text/javascript">
//<![CDATA[

function valider(){
 frm=document.forms['formAjout'];
  // si le prix est positif
  if(frm.elements['prix'].value >0) {
    // les donn�es sont ok, on peut envoyer le formulaire    
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
      <legend>Entrez les donnees sur la panne a retirer </legend>
      <label> Reference :</label>
      <label><?php echo $panne["ref"]; ?></label>
      <input type="hidden" placeholder="Entrer la reference" name="ref" value="<?php echo $panne["ref"]; ?>" /><br />
      <label> Numero :</label>
      <input type="text" placeholder="Entrer le numero de la panne" name="num" value="<?php echo $panne["num"]; ?>" size="20" /><br />
      <label> Date fin de panne :</label>
      <input type="date" placeholder="Entrer le date de fin de panne" name="dateF" value="<?php echo $panne["dateF"]; ?>" size="20" /><br />
    </fieldset>
    <button type="submit" class="btn btn-primary">Retirer</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>



