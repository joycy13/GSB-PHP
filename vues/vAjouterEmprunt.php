< <!--Saisir les informations dans un formulaire!-->
<div class="container">
  <form action="" method=post>
    <fieldset>
      <legend>Entrez les donnees sur le materiel a emprunter </legend>
      <label> Matricule visiteur :</label>
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
       
        ?>

      </select>  

      <label>Reference materiel :</label>
      <?php  
      
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
      <label>Date emprunt : </label> <input type="date" placeholder="Entrer la date" name="dateD"/><br /> 
     
    </fieldset>
   
  <!-- date("Y-m-d")-->

    <button type="submit" class="btn btn-primary">Emprunter</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>