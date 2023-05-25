<?php 
  include('dbconn.php');
  session_start();


  $stmt = $pdo->prepare("SELECT * FROM users");
  $stmt -> execute();
  $value = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $loggeduserid=$_SESSION['user'];
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

    $query = "UPDATE users SET user_name= :name, user_email=:email, user_age=:age, user_gender=:gender, user_details=:bio WHERE user_id = :userid";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':userid', $loggeduserid);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':bio', $bio);
    $stmt->execute();
    header("Location: users.php");
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
  <?php 
    $userkostmt = $pdo->prepare("SELECT * FROM users WHERE user_id =:user_id ");
    $userkostmt -> bindParam(":user_id", $loggeduserid);
    $userkostmt->execute();
    $user_information = $userkostmt -> fetchall(PDO::FETCH_ASSOC);
    foreach($user_information as $user_info){
  ?>
  <body>
    <div class="update-profile">
      <form action="#" method="POST" enctype="multipart/form-data">
      <div class="inputBox">
        
        <!-- <img
          src="Screenshot 2023-05-06 094402.png"
          alt="profile picture"
          style="border-radius: 50%"
          width="100"
        />-->
        <br /> 
        <br /> 
        <label>Full Name</label>
        <input type="text" name="name" value="<?php echo $user_info['user_name']?>" placeholder="Full Name"/><br />

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $user_info['user_email']?>" placeholder="Email"/><br />

        <label>Age</label>
        <input type="text" name="age" value="<?php echo $user_info['user_age']?>" placeholder="Age" /><br />

        <label for="gender">Gender:</label><br />
        <input type="radio" id="male" name="gender" value="male" />
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" />
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="other" />
        <label for="other">Other</label><br />
        <br /><br />
        <label for="imageInput">Select an image:</label>
        <input type="file" id="imageInput" name="image" accept="image/*" value="<?php echo $user_info['user_image']?>"/>
 
        <br>
        <br>
        <label>Bio:</label><br />
        <textarea id="bio" name="bio" rows="4" cols="50" placeholder="Bio"><?php echo $user_info['user_details']?>
        </textarea><br />

        <?php  }?>
        <input type="submit" value="Submit" />
        <button>
            <a href="users.php">Back</a>
        </button>
        </form>
      </div>
    </div>
  </body>
</html>
<?php
//   if ($_SERVER["REQUEST_METHOD"] === "POST") {
//   $targetDir = "/images"; // Specify the directory to save the uploaded image
//   $targetFile = $targetDir . basename($_FILES["image"]["name"]);
//   $uploadOk = 1;
//   $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

//   // Check if the file is an actual image
//   $check = getimagesize($_FILES["image"]["tmp_name"]);
//   if ($check === false) {
//     echo "Error: File is not an image.";
//     $uploadOk = 0;
//   }

//   // Check if the file already exists
//   if (file_exists($targetFile)) {
//     echo "Error: File already exists.";
//     $uploadOk = 0;
//   }

//   // Check the file size (optional)
//   if ($_FILES["image"]["size"] > 500000) {
//     echo "Error: File size is too large.";
//     $uploadOk = 0;
//   }

//   // Allow only specific file formats (optional)
//   if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg") {
//     echo "Error: Only JPG, JPEG, and PNG files are allowed.";
//     $uploadOk = 0;
//   }

//   // Move the uploaded file to the target directory
//   if ($uploadOk === 1) {
//     if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
//       echo "Image uploaded successfully.";
//     } else {
//       echo "Error: Failed to upload image.";
//     }
//   }
// }
?>
