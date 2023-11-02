<?php

require_once('./Controller/countryController.php');

try {

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'details') {
            if (isset($_GET['pays_id'])) {
                if ($_GET['pays_id'] > 0) {
                    $id = $_GET['pays_id'];
                    showCountryDetails($id);
                    //showCountryName($id);
                } else {
                    throw new Exception("Erreur : id non valide");
                }
            } else {
                throw new Exception("Erreur : pas d'id");
            }
        } elseif ($_GET['action'] == 'addCountryDetail') {
            if (isset($_GET['pays_id']) && $_GET['pays_id'] > 0){
                if (isset($_POST['detail'])) {
                    if (isset($_POST['donnees'])) {
                        addCountryDetail($_GET['pays_id'], $_POST['detail'], $_POST['donnees']);
                    } else {
                        echo "Erreur : Valeur non définie";
                    } 
                } else {
                    echo "Clé non valide";
                }
            } else {
                echo "Erreur : Identifiant de pays non valide";
            }
        } else {
            throw new Exception("Erreur : action non valide");
        }
        
    } else {
        showCountries();
    }
    
} catch (PDOException $e) {
    $msgErreur = $e->getMessage();
    echo "Erreur : " . $msgErreur;
}
