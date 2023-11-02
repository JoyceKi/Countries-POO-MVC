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
 * pour le titre du tableau dans détails.php
 * @param mixed $id_pays
 * @return array
 */
function getCountry($pays_id)
{
    $bdd = getDb();
    $sql = "SELECT pays FROM countries WHERE id_pays = :idPays ";
    $country = $bdd->prepare($sql);
    $country->bindParam(':idPays', $pays_id);
    $country->execute();
    return $country->fetch();
    
    //$bdd = null;
}


/**
 * Summary of getDetails
 * @param mixed $pays_id
 * @return array
 */
function getDetails($pays_id)
{
    $bdd = getDb();
    $sql = "SELECT * FROM countries INNER JOIN details ON details.pays_id=countries.id_pays WHERE pays_id = ". $pays_id;
    $pays_id = $bdd->prepare($sql);
    $pays_id->execute();
    return $pays_id->fetchAll();
    
    //$bdd = null;
}

/**
 * Summary of saveCountryDetail
 * @param int $pays_id
 * @param mixed $detail
 * @param mixed $donnees
 * @return array
 */
function saveCountryDetail( $pays_id, $detail, $donnees) 
{
    $bdd = getDB();
    $sql = "INSERT INTO details (pays_id, detail, donnees) VALUES (:pays_id, :detail, :donnees,)";
    $result = $bdd->prepare($sql);
    $result->bindParam(':pays_id',$pays_id, PDO::PARAM_INT);
    $result->bindParam(':detail',$detail, PDO::PARAM_STR);
    $result->bindParam(':donnees ', $donnees, PDO::PARAM_STR);
    $result->execute();
    return $result->fetchAll();
}