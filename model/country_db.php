<?php
require('../model/database.php');


// functions to interact with the countries table
function get_country(){
	global $db;
    $query = 'SELECT * FROM countries
              ORDER BY countryName';
    $statement = $db->prepare($query);
    $statement->execute();
    $countries = $statement->fetchAll();
    $statement->closeCursor();
    return $countries;
	
}


function get_country_by_name($country_name){
	global $db;
    $query = 'SELECT * FROM countries
              WHERE countryName = :country_name';
    $statement = $db->prepare($query);
    $statement->bindValue(':country_name', $country_name);
    $statement->execute();
    $country = $statement->fetch();
    $statement->closeCursor();
    return $country;
	
}

function get_country_by_code($country_code){
	global $db;
    $query = 'SELECT * FROM countries
              WHERE countryCode = :country_code';
    $statement = $db->prepare($query);
    $statement->bindValue(':country_code', $country_code);
    $statement->execute();
    $country = $statement->fetch();
    $statement->closeCursor();
    return $country;
	
}

?>
