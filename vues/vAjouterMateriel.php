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
    <legend>Entrez les données sur le materiel a ajouter </legend>
    <label>Reference : </label> <input type="text" placeholder="Entrer la reference" name="ref" size="10" /><br />
    <label>Libelle :</label> <input type="text" placeholder="Entrer le libelle" name="lib" size="20" /><br />
  </fieldset>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <button type="reset" class="btn">Annuler</button>
  <p />
</form>
</div>


