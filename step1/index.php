<?php

require_once ('./Model/countryModel.php');

try {
$countries = getCountries();
require('View/countriesView.php');
} catch (PDOException $e) {
    $msgErreur = $e->getMessage();
    echo "Erreur : " . $msgErreur;
}

?>


