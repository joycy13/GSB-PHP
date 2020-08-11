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
    alert("Le prix doit être positif !");
    // et on indique de ne pas envoyer le formulaire
    return false;
  }
}
//]]>
</script>

<!--Saisie des informations dans un formulaire!-->
<div class="container">

<form name="formAjout" action="" method="post" onSubmit="return valider()">
  <fieldset>
    <legend>Entrez les donnees sur le visiteur a ajouter </legend>
    <label>Matricule : </label> <input type="text" placeholder="Entrer le matricule" name="mat" size="10" /><br />
    <label>Nom :</label> <input type="text" placeholder="Entrer le nom" name="nom" size="20" /><br />
    <label>Prenom :</label> <input type="text" placeholder="Entrer le prenom" name="prenom" size="10" /><br /> 
    <label>Adresse :</label> <input type="text" placeholder="Entrer l'adresse" name="adresse" size="10" /><br />
    <label>Code Postal :</label> <input type="text" placeholder="Entrer le code postal" name="codeP" size="10" /><br />
    <label>Ville :</label> <input type="text" placeholder="Entrer la ville" name="ville" size="10" /><br />
    <label>Date Embauche:</label> <input type="date" placeholder="Entrer la date d'embauche" name="dateE" size="10" /><br />
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>


