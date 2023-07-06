<!DOCTYPE html>
<html>
<head>
  <title>Reported User Profiles</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Reported Reason</th>
      <th>Action</th>
    </tr>
    <?php
    // PHP code to fetch and display user profiles from the database
  // Include the database connection file
include '../dbconn.php';
    // Fetch user profiles from the database
    $query = "SELECT * FROM users";
    $statement = $pdo->query($query);

    // Generate table rows dynamically
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$row['user_id']."</td>";
        echo "<td>".$row['user_name']."</td>";
        echo "<td>".$row['user_email']."</td>";
    }
    $query = "SELECT * FROM report";
    $statement = $pdo->query($query);
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<td>".$row['reason']."</td>";
        echo "</tr>";
    }
    ?>
  </table>
</body>
</html>