<?php
require ('../Model/countryModel.php');


try {

    if (isset($_GET['pays_id'])) {
       
        $id = intval($_GET['pays_id']);
        if ($id!= 0) {
            
            $detail = getDetails($id);
            $pays = getOneCountry($id);
            require('../View/detailsView.php');  
            // require('../View/countriesView.php');
        } else {
            throw new Exception("Identifiant pays incorrect");
        }   
    } else {
        throw new Exception("Il n'y a pas de pays correspondant");
    }
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    return $msgErreur;
    // require ('vueErreur.php');
}