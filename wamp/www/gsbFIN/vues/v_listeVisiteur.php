
      
      <h3>Visiteurs à sélectionner : </h3>
      <form action="index.php?uc=validerFrais&action=voirEtatFrais" method="post">
          <input type="hidden" name="unMois" value="<?php echo $moisASelectionner ?>" />
      <div class="corpsForm">
         
      <p>
	 
        <label for="lstVisiteurs" accesskey="n">Visiteurs : </label>
        <select id="lstVisiteurs" name="lstVisiteur">
            <?php
                        
			foreach ($lesVisiteurs as $unVisiteur)
			{
                            $id = $unVisiteur['id'];
			    $nom = $unVisiteur['nom'];
                            $prenom = $unVisiteur['prenom'];
                            if($id == $visiteurASelectionner){
                            ?>
                            <option selected value="<?php echo $id ?>"><?php echo $nom."/".$prenom ?> </option>
                            <?php 
                            }
                            else{ ?>
                            <option value="<?php echo $id ?>"><?php echo  $nom."/".$prenom ?> </option>
                            <?php 
                            }
			
			}
           
		   ?>    
            
        </select>
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
</form>