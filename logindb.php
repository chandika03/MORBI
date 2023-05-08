<?php
    session_start();
    include('dbconn.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = ('SELECT email,password FROM signup');
    $stmt = $pdo->prepare($query);
    $stmt -> execute();

    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // $org_username = $value[0]['username'];
    // $org_password = $value[0]['password'];
    foreach($value as $item){
        if($email == $item['email'] && $password == $item['password']){
            $_SESSION['email'] = $email;
            header("Location: /morbi/homepage.php");
        }
    }
    if (!isset($_SESSION['email'])){
    $invalid = "Invalid Credentials!";
    header("Location: /morbi/login.php?invalid= $invalid");}
?>