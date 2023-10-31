<?php

/**
 * connection à la base de données
 * @return PDO
 */
function getDb()
{
    $username = "root";
    $password = "";
    $dsn = "mysql:host=localhost; dbname=countries; port=3306; charset=utf8";
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;  
}

/**
 * tous les pays
 * @return array
 */
function getCountries()
{
    $bdd = getDb();
    $sql = "SELECT * FROM countries ORDER BY pays";
    $countries = $bdd->prepare($sql);
    $countries->execute();
    return $countries->fetchAll();
    
    $bdd = null;
}

/**
 * Summary of getOneCountry
 * @param mixed $id_pays
 * @return array
 */
function getOneCountry($id_pays)
{
    $bdd = getDb();
    $sql = "SELECT pays FROM countries WHERE id_pays=".$id_pays;
    $country = $bdd->prepare($sql);
    $country->execute();
    return $country->fetchAll();
    
    $bdd = null;
}

/**
 * Détails sur chaque pays
 * @param mixed $country_id
 * @return array
 */
function getDetails($pays_id)
{
    $bdd = getDb();
    $sql = "SELECT * FROM countries INNER JOIN details ON details.pays_id=countries.id_pays WHERE pays_id = ". $pays_id;
    $pays_id = $bdd->prepare($sql);
    $pays_id->execute();
    return $pays_id->fetchAll();
    
    $bdd = null;
}