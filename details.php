<?php 
  include('dbconn.php');
  session_start();


  $stmt = $pdo->prepare("SELECT * FROM users");
  $stmt -> execute();
  $value = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $user_id;
  $i = 0;
  $j = 0;
  $searchValue;
  @$user_id = $_GET[$i];
@$count = $_GET['count'];

  do{
      if($user_id != null){
              $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = :user_id");
              $stmt ->bindParam(':user_id', $user_id);
              $stmt ->execute();
          $value[$i] = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $searchValue = true;
          }


        else{
          $searchValue = false;
        }
      $i++;
  }while($i<$count);

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $bio = $_POST['bio'];

    $query = "INSERT INTO users(user_name, user_email, user_age, user_gender,user_details) VALUES (:name,:email,:age, :gender, :bio)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':bio', $bio);
    $stmt->execute();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Profile</title>
    <!-- <link rel="stylesheet" href="user.css" /> -->
  </head>
  <body>
    <div class="update-profile">
      <form action="#" method="POST" enctype="multipart/form-data">
      <div class="inputBox">
        <label for="profile-pic">Profile Picture:</label><br />
        <img
          src="Screenshot 2023-05-06 094402.png"
          alt="profile picture"
          style="border-radius: 50%"
          width="100"
        /><br />

        <label>Full Name</label>
        <input type="text" name="name" /><br />

        <label>Email</label>
        <input type="email" name="email" /><br />

        <label>Age</label>
        <input type="number" name="age" /><br />

        <label for="gender">Gender:</label><br />
        <input type="radio" id="male" name="gender" value="male" />
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" />
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="other" />
        <label for="other">Other</label><br />
        <br /><br />

        <label>Bio:</label><br />
        <textarea id="bio" name="bio" rows="4" cols="50"></textarea><br />

        <input type="submit" value="Submit" />
        </form>
      </div>
    </div>
  </body>
</html>
