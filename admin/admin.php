<!DOCTYPE html>
<html>
<head>
  <title>Reported User Profiles</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <style>
    body {
  background-color: #ffeaea;
  color: #9a208c;
  font-family: Arial, sans-serif;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 10px;
  border: 1px solid #e11299;
}

th {
  background-color: #e11299;
  color: #fff;
}

tr:nth-child(even) {
  background-color: #f5c6ec;
}

tr:hover {
  background-color: #ffeaea;
}

  </style>
</head>
<body>
  <table>
    <tr>
      <th>ID</th>
      <th>By User</th>
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
        echo "<td>".$row['byuser']."</td>";
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
  <button>
  <a href="../morbi.php>Logout</a>
  </button>
</body>
</html>