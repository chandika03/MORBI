<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="morbi";
    $dsn="mysql:host=$host;dbname=$db;";
    $pdo=new PDO($dsn,$user,$pass);
    
    // if(!$pdo){
    //     die(('Connection Failed.'.mysqli_connect_error()));
    // }
?>
