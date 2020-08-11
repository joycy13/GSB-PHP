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
      <legend>Entrez les donnees sur le visiteur a modifier </legend>
      <label> Matricule :</label>
      <label><?php echo $visiteur["mat"]; ?> </label>
      <input type="hidden" placeholder="Entrer le matricule" name="mat" value="<?php echo $visiteur["mat"]; ?>" /><br />
      <label> Nom :</label>
      <input type="text" placeholder="Entrer le nom" name="nom" value="<?php echo $visiteur["nom"]; ?>" size="20" /><br />
      <label> Prenom :</label>
      <input type="text" placeholder="Entrer le prenom" name="prenom" value="<?php echo $visiteur["prenom"]; ?>" size="20" /><br />
      <label> Adresse :</label>
      <input type="text" placeholder="Entrer l'adresse" name="adresse" value="<?php echo $visiteur["adresse"]; ?>" size="20" /><br />
      <label> Code postal :</label>
      <input type="text" placeholder="Entrer le code postal" name="codep" value="<?php echo $visiteur["codep"]; ?>" size="20" /><br />
      <label> Ville :</label>
      <input type="text" placeholder="Entrer la ville" name="ville" value="<?php echo $visiteur["ville"]; ?>" size="20" /><br />
      <label> Date d'embauche :</label>
      <input type="date" placeholder="Entrer la date" name="dateE" value="<?php echo $visiteur["dateE"]; ?>" size="20" /><br /> 
    </fieldset>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>



