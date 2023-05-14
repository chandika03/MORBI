<?php
    include('dbconn.php');
    // $gender = $_POST['gender'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    // $age = $_POST['age'];
    $cpassword = $_POST["cpassword"];

    if($password == $cpassword){
        $query = ('INSERT INTO users(user_password, user_name, user_email) VALUES (:password, :name, :email)');
        $stmt = $pdo->prepare($query);
        // $stmt -> bindParam(':gender',$gender);
        $stmt -> bindParam(':password',$password);
        $stmt -> bindParam(':name',$name);
        $stmt -> bindParam(':email',$email);
        // $stmt -> bindParam(':age',$age);
    
        $stmt -> execute();

    header("Location: /morbi/morbi.php");
    }
    else{
        $invalid = "Password didn't Matched";
        header("Location: /morbi/morbi.php?invalid= $invalid");
    }
    
?>
?>