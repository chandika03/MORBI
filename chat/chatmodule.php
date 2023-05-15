<?php 
  session_start();
  include('../dbconn.php');
  $toUser = $_GET['toId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="modal-dialog">
    <div class="modal_content">
      <div class="modal_header">
        <h4></h4>
      </div>
      <div class="modal_body">
        <ol>
        <?php 
          $users = $pdo->query("SELECT * FROM users ");
          $user_data = $users->fetchall(PDO::FETCH_ASSOC);
          foreach($user_data as $user){
            echo '<li>
            <a href="chatmodule.php?user_id=' . $user['user_id'].'">'.$user["user_name"].'</a>
            </li>';
          }
        ?>
        </ol>
      </div>
    </div>
  </div>
  <div class="wrapper">
        <div class="title">Message</div>
        <div class="form">
            <div class="inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
</body>
</html>