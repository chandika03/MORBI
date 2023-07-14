
<!DOCTYPE html>
<html>
  <head>
    <title>report</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
        /* textarea {
            width: 300px;
            height: 200px;
        }
         */
        body {
        background-color: #ffeaea;
        color: #9a208c;
        font-family: Arial, sans-serif;
        padding: 100px;
      }

      #report {
        background-color: #f5c6ec;
        padding: 20px;
        border-radius: 5px;
      }

      h3 {
        color: #e11299;
        text-align: center;
      }

      form {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      .number {
        padding: 20px;
        width: 300px;
        height: 10px;
        display:flex;
        justify-content: center;
      }

      input[type="text"],
      textarea {
        width: 300px;
        height: 200px;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #9a208c;
        border-radius: 5px;
      }

      input[type="submit"] {
        background-color: #9a208c;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
      }

      input[type="submit"]:hover {
        background-color: #e11299;
      }
      </style>
  </head>
  <body>
    <div id="report">
      <h3>Why are you reporting this user?</h3>
      
      <form action="reportdb.php" method="POST"><div class="number">
        <input type="text" name="userId" value="<?php echo $_GET['userId'] ?>" readonly>
        </div>
        <textarea id="reason" name="reason" placeholder="Enter your reasons here" required></textarea><br><br>
        <input type="submit" value="Submit">
      </form>
    </div>
    <script src="script.js"></script>
  </body>
</html>