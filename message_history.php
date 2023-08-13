<?php
  include('dbconn.php');
  session_start();

  if(!isset($_SESSION['user'])){
    header("Location: /morbi/morbi.php");
    exit();
  }

  $user_id = $_SESSION['user'];

  $query = "SELECT * FROM message WHERE fromuser = :userid";
  $stmt = $pdo->prepare($query);
  $stmt -> bindParam(':userid',$user_id);
  $stmt -> execute();
  $value = $stmt->fetchAll(PDO::FETCH_ASSOC);   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chat History</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #ffeaea;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }

      .chat-container {
        text-align: center;
      }

      .chat-heading {
        font-size: 32px;
        color: #9a208c;
        margin-bottom: 20px;
      }

      .chat-table {
        border-collapse: collapse;
        width: 90%;
        background-color: #fff;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.2s ease;
      }

      .chat-table th,
      .chat-table td {
        padding: 10px 20px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }

      .chat-table th {
        background-color: #9a208c;
        color: white;
      }

      .user-avatar {
        font-size: 20px;
        width: 30px;
      }

      .user-avatar::before {
        content: attr(data-avatar);
      }

      .user-avatar::before {
        margin-right: 10px;
        background-color: #9a208c;
        color: white;
        border-radius: 50%;
        padding: 5px;
        display: inline-block;
      }

      .chat-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
      }

      .chat-table tbody tr:hover {
        background-color: #f0f0f0;
      }

      .back-button {
        margin-top: 20px;
        margin-left: 23rem;
      }

      .back-link {
        color: #9a208c;
        font-size: 18px;
        text-decoration: none;
        transition: color 0.3s ease;
      }

      .back-link:hover {
        color: #e11299;
      }
    </style>
  </head>
  <body>
    <div class="chat-container">
      <h1 class="chat-heading">Welcome to Chat History</h1>
      <table class="chat-table">
        <thead>
          <tr>
            <th>Sender</th>
            <th>Message</th>
            <th>Time</th>
          </tr>
        </thead>
        <tbody>
          <?php
          
          foreach($value as $item){ 
            ?>
          <tr>
            <td class="user-avatar" data-avatar="👤"><?php echo $item['toUser'] ?></td>
            <td><?php echo $item['message'] ?></td>
            <td><?php echo $item['timestamp'] ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="back-button">
        <a href="users.php" class="back-link">← Back</a>
      </div>
    </div>
  </body>
</html>
