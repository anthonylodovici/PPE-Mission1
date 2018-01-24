<?php
/**
 * Vue liste visiteur
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    Anthony Lodovici <anthony.lodovici@gmail.com>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */

?>
<div class="row">
    <div class="col-md-4">
        <h6><strong>Choisir le visiteur: </h6></strong>
    </div>
    <div class="col-md-4">
        <form action="index.php?uc=listeVisit&action=affDetail" 
              method="post" role="form">
            <div class="form-group">
                <label for="lstVisiteur" accesskey="n"></label>
                <select id="lstVisiteur" name="lstVisiteur" onchange="this.form.submit();" class="form-control">
                    <?php
                    foreach ($lesVisiteurs as $unVisiteur) {
                        $id = $unVisiteur['id'];
                        $visiteur = $unVisiteur['visiteur'];
                            ?>
                           <option selected value="<?php echo $id ?>"><?php echo $visiteur ?></option>
                        <?php
                    }
                    if (isset($visiteur)) { //si lstVisiteur est mis en POST
    global $pdo;
    $json = array(); //creer un tableau
    $visiteur = htmlentities(filter_input(INPUT_POST, 'lstVisiteur',FILTER_SANITIZE_STRING)); //recup la valeur de lstVisiteur
    $mois = array();
    try {
        foreach ($pdo->getLesVisiteursDisponibles() as $donnee_visiteur) {//recupere l'id de la marque selon le nom
            $id_mois_visiteur = $donnee_visiteur['lstVisiteur']; //attribut l'id a une var
        }
        foreach ($pdo->getLesMoisDisponibles2($visiteur) as $donnee_mois) {//trouve les modeles correspondant a la marque
            $mois[] = $donnee_mois; //assigne les valeurs dans un tableaux
        }
        foreach ($mois as $info_mois) { //Pour chaque case du tableaux
            $json[$info_mois['lstMoisCompta']] = utf8_encode($info_mois['lstMoisCompta']); // ajouter au tableaux JSON une valeur = a la case
        }
        echo json_encode($json); //envoyer a l'ajax
    } catch (PDOException $erreur) {
        die('Erreur : ' . $erreur->getMessage());
    }
} else {
    echo 'Erreur <br>'; //affiche message erreur
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
        <form action="index.php?uc=listeVisit&action=selectionnerMois" 
              method="post" role="form">
            <div class="form-group">
                <label for="lstMoisCompta" accesskey="n"></label>
                <select id="lstMois" name="lstMoisCompta" class="form-control">
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
                </select>
            </div>
        </form>
    </div>
</div>