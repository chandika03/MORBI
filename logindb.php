<?php
    session_start();
    include('dbconn.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = ('SELECT user_email, user_password FROM users');
    $stmt = $pdo->prepare($query);
    $stmt -> execute();

    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // $org_username = $value[0]['username'];
    // $org_password = $value[0]['password'];
    foreach($value as $item){
        if($email == $item['user_email'] && $password == $item['user_password']){
            $_SESSION['user_email'] = $email;
            header("Location: /morbi/users.php");
        }
        else{
            $invalid = "Invalid cred!";
            header("Location: /morbi/morbi.php?invalid= $invalid");
        }
    }
?>