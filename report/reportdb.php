<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /morbi/users.php");
if (!isset($_SESSION['user'])) {
    header("Location: /morbi/users.php");
    exit();
}

try {
    include('../dbconn.php');

    $conn = new PDO("mysql:host=127.0.0.1;dbname=morbidb", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // $userId =
$_POST['userId']; //get the username of user to be reported // echo
"->".$userId; // Process the report request // if (isset($_POST['userId']) &&
isset($_POST['reason'])) { $userId = $_POST['userId']; $reason =
$_POST['reason']; $reportedby = $_SESSION['user']; // Store the reported user
and report type in the database $sql = "INSERT INTO report (userid, reason,
byuser) VALUES (:userId, :reason, :byuser)"; $stmt = $conn->prepare($sql);
$stmt->bindParam(':userId', $userId); $stmt->bindParam(':reason', $reason);
$stmt->bindParam(':byuser', $reportedby); $stmt->execute(); echo "User reported
successfully"; // } } catch (PDOException $e) { echo "Connection failed: " .
$e->getMessage(); } ?>
<html>
  <head>
    <style></style>
  </head>
  <body>
    <button>
      <a href="../users.php">OK</a>
    </button>
  </body>
</html>

        echo "User reported successfully";
        header("Location: ../users.php");
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>