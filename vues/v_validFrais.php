<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
    <div class="col-md-4">
        <h6><strong>Choisir le visiteur: </h6></strong>
    </div>
    <div class="col-md-4">
        <form action="index.php?uc=listeVisit&action=selectionnerVisiteur" 
              method="post" role="form">
            <div class="form-group">
                <label for="lstVisiteur" accesskey="n"></label>
                <select onchange="this.form.submit()" id="lstVisiteur" name="lstVisiteur" class="form-control">
                    <?php
                    foreach ($lesVisiteurs as $unVisiteur) {
                        $id = $unVisiteur['id'];
                        $visiteur = $unVisiteur['visiteur'];
                            ?>
                           <option selected value="<?php echo $id ?>"><?php echo $visiteur ?></option>
                        <?php
                    }
                    ?> 
                </select>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <h6><strong>Mois:</h6></strong>
    </div>
    <div class="col-md-4">
        <form action="index.php?uc=c_gererFrais&action=retourneMois" 
              method="post" role="form">
            <div class="form-group">
                <label for="lstMois" accesskey="n"></label>
                <select id="lstMois" name="lstMois" class="form-control">
                    <?php
                    foreach ($lesMois as $unMois) {
                        $mois = $unMois['mois'];
                        $numAnnee = $unMois['numAnnee'];
                        $numMois = $unMois['numMois'];
                        if ($mois == $moisASelectionner) {
                            ?>
                            <option selected value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                        } else {
                            ?>
                            <option value="<?php echo $mois ?>">
                                <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                        }
                    }
                    ?>    
<input id="ok" type="submit" value="Valider" class="btn btn-success" 
                   role="button">
                </select>
            </div>
        </form>
    </div>
</div>
