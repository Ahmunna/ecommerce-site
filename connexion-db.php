<?php

//configuration
function connectionDB()
{
    $servername="127.0.0.1";
    $username="admin";
    $password="admin";
    $dbname="ecommerce";
    $dsn="mysql:host=$servername;dbname=$dbname";


    try {
        $conn = new PDO($dsn, $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        file_put_contents("log.txt","Connected Successfully");
        return $conn;
        }
    catch(PDOException $e)
        {
            file_put_contents("log.txt",$e->getMessage());
            return null;
        }

}


?>