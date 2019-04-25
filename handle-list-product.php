<?php
//includes
require_once('connexion-db.php');
require_once('db-utils.php');
require_once('product.php');

function getAllProducts()
{
    //getting the connection from the database
    $connection = connectionDB();

    //find all the products
    $utility = new Utils($connection);
    $result = $utility->findAll();
    return $result;
}

