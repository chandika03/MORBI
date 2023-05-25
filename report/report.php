<!DOCTYPE html>
<html>
  <head>
    <title>report</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <div id="reportOptions">
      <select>
        <option disabled selected value="">Report this user</option>
        <option value="option">Spam</option>
        <option value="option">Inapproprite Content</option>
        <option value="option">Harassment</option>
      </select>
        <button>
            <a href="  /morbi/users.php">Submit</a>
        </button>    
    </div>
    <script src="script.js"></script>
  </body>
</html>
<?php
session_start();
echo $_SESSION['user'];

if(!isset($_SESSION['user'])){
    header("Location:  /morbi/users.php");
    exit();
}
try {
    include('../dbconn.php');

    $conn = new PDO("mysql:host=$localhost;dbname=$morbidb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Process the report request
    if (isset($_POST['userId']) && isset($_POST['reportType'])) {
        $userId = $_POST['userId'];
        $reportType = $_POST['reportType'];

        // Store the reported user and report type in the database
        $sql = "INSERT INTO reports (reported_user_id, report_type) VALUES (:userId, :reportType)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':reportType', $reportType);
        $stmt->execute();

        echo "User reported successfully";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>