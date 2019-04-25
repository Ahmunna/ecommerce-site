<?php

//includes
require_once('connexion-db.php');
require_once('product.php');
require_once('db-utils.php');

//getting the parameters from the get
$name = $_GET['name'];
$quantity = $_GET['quantity'];
$price = $_GET['price'];
$category=$_GET['category'];

//getting the connection from the database
$connection = connectionDB();

//creating a Product object
$product = new Product($name,$quantity,$price,$category);

//adding the product to the database
try
{
    $utility = new Utils($connection);
    $utility->addProduct($product);
    header('Location: success.php');
}
catch(Exception $e)
{
    $message="Error in Adding the product";
    header('Location: add-product.php');
}

