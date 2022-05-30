<?php

$user       = 'root'; //Database username default from XAMMP
$dsn        = 'mysql:host=localhost; dbname=databaseName';
$password   = ''; //Original XAMMP password is empty - Change this after hosting

try{
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $ex){
    echo "Connection failed ".$ex->getMessage(); // Not for production
    // header("location:error_connection_page") // Recommended
}

?>