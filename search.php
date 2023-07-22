<?php
    include('dbconn.php');
    session_start();

    // if (!isset($_SESSION['username'])) {
    //   header('Location: login.php');
    //   exit();
    // }

    if(isset($_POST['search']));{
        $name = strtolower($_POST['search']); // convert search string to lowercase
        // $name =$_POST['search'];
    }
    $stmt =$pdo->prepare("SELECT * FROM users where lower(user_name) LIKE :name");
    $stmt->bindParam(':name', $name_like);
    $name_like = '%' . $name . '%';
    $stmt -> execute();
    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $get_id = array();

    foreach($value as $item){
        $get_id[] = $item['user_id']; //used to take array of id's
        // echo $get_id[1];
        $count++;
    }
    // echo $count;
    // Converting the array to a query string
    $queryString = http_build_query($get_id);
    
    // Sending the values using the header function
    // header("Location: /MORBI/users.php?count=$count&$queryString");
    header("Location: /MORBI/users.php?value=$value");

?>