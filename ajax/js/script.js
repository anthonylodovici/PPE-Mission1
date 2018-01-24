$(document).ready(function () {
   // majMois();//appel de la fonction
     
    $('#lstVisiteur').on('change', function () {//chaque fois qu'on choisis un visiteur
        majMois(); //appel de la fonction
    });
 
    function majMois() { //function qui met a jour le modele de la voiture selon la marque
        var mois = $('#lstMoisCompta'); //recuperation de l'id de la liste des mois
        var visiteur = $('#lstVisiteur').val(); //recuperation de la valeur de la liste des visiteurs
        mois.empty(); // vidage des valeurs de modele
 
        $.ajax({//appel d'ajax
            type: 'POST',
            url: 'www/vues/v_listeVisiteurs.php',
            data: {visiteur:visiteur}, //envoi en post ?visiteur='LEVISITEUR'
            dataType: 'json',
            beforeSend: function (hxr, data) {
                console.log(hxr);
                console.log(data);
            },
            success: function (json) { //si ca réussi execute une fonction selon paramtere envoyer par le php
                mois.append('<option value="0">Choisissez un mois</option>'); //ajoute une option par défaut
                $.each(json, function (value) { //pour chaque valeur
                    mois.append('<option value="' + value + '">' + value + '</option>'); //ajoute une option
                });
            },
            error: function (hxr, data) {
                console.log(hxr);
                console.log(data);
            }
        });
 
    }
});