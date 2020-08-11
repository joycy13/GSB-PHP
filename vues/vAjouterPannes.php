< <!--Saisir les informations dans un formulaire!-->
<div class="container">
  <form action="" method=post>
    <fieldset>
      <legend>Entrez les donnees sur le materiel a déclarer </legend>
      <label>Numero : </label> <input type="text" placeholder="Entrer le numero" name="num" size="10" /><br />
      <label>Reference :</label>
      <?php  
      
        $connect = connecterServeurBD();

        $resultat = $connect->query('SELECT M_Ref FROM materiel');
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
      <label>Libelle : </label> <input type="text" placeholder="Entrer le libelle" name="lib" size="10" /><br /> 
      <label>Date debut : </label> <input type="date" placeholder="Entrer la date" name="dateD"/><br /> 
     
    </fieldset>
   
  <!-- date("Y-m-d")-->

    <button type="submit" class="btn btn-primary">Signaler</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>