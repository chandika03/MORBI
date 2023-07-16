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
    <?php
      include '../dbconn.php';
    // PHP code to fetch and display user profiles from the database
  // Include the database connection file

    // Fetch user profiles from the database
    $query = "SELECT * FROM users,report WHERE report.userid = users.user_id";
    $statement = $pdo->query($query);
    $reportedto = $statement->fetch(PDO::FETCH_ASSOC);

    $query = "SELECT * FROM users,report WHERE report.byuser = users.user_id";
    $statement = $pdo->query($query);
    $reportedby = $statement->fetch(PDO::FETCH_ASSOC);
    
    ?>
<body>
    <table>
      <tr>
        <th>Reported User</th>
        <th>Reported By</th>
        <th>Reason</th>
        <th>Action</th>
      </tr>
      <!-- <?php //foreach($reportedto as $reportedto): ?> -->
      <tr>
        <td><?php echo $reportedby['user_name']; ?></td>
        <td><?php echo $reportedto['user_name']; ?></td>
        <td><?php echo $reportedto['reason']; ?></td>
        <td><a href="delete.php?id=<?php echo $reportedto['userid']; ?>">Delete</a></td>
      </tr>
      <!-- <?php //endforeach; ?> -->
    </table>
</body>
</html>