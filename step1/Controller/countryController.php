<?php

require_once('Model/countryModel.php');

// echo "hola";
/**
 * affiche tous les pays
 * @return array
 */
function showCountries()
{

    try {
        $countries = getCountries();
        require('View/countriesView.php');
        return $countries;
    } catch (PDOException $e) {
        $msgErreur = $e->getMessage();
        echo "Erreur : " . $msgErreur;
    }
}



/**
 * affiche les détails d'un pays
 * @return array
 */
function showCountryDetails($id)
{
    try {
        $countryName = getCountry($id);
        $detail = getDetails($id);
        require('View/detailsView.php');
    } catch (PDOException $e) {
        $msgErreur = $e->getMessage();
        echo "Erreur : " . $msgErreur;
    }
}

/**
 * Summary of addCountryDetail
 * @param int $pays_id
 * @param mixed $detail
 * @param mixed $donnees
 * @return void
 */
function addCountryDetail ($pays_id, $detail, $donnees, )
{
    $result = saveCountryDetail($pays_id, $detail, $donnees);

    if ($result == false) {
        die ("Erreur : Impossible 'ajouter le nouveau détail");
    } else {
        header('Location: index.php?action=showCountryDetails&pays_id='.$pays_id);
    }

}

