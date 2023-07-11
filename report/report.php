
<!DOCTYPE html>
<html>
  <head>
    <title>report</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <div id="report">
      <h3>Why are you reporting this user?</h3>
      <style>
        textarea {
            width: 300px;
            height: 200px;
        }
      </style>
      <form action="reportdb.php" method="POST">
        <input type="text" name="userId" value="<?php echo $_GET['userId'] ?>" readonly><br>
        <textarea id="reason" name="reason" placeholder="Enter your reasons here" required></textarea><br><br>
        <input type="submit" value="Submit">
      </form>
    </div>
    <script src="script.js"></script>
  </body>
</html>