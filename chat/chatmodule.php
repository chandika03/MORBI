<?php 
  session_start();
  echo $_SESSION['user'];
  if(!isset($_SESSION['user'])){
    header("Location: /login.php");
    exit();
  }
  include('../dbconn.php');
  $toUser = $_GET['toId'];
  $fromUser = $_SESSION['user'];

  $stmt1 = $pdo->query("SELECT * FROM message WHERE fromUser=$fromUser AND toUser=$toUser");
  $info=$stmt1->fetchAll(PDO::FETCH_ASSOC);
  if(empty($info)){
    $stmt = $pdo->prepare("INSERT INTO message (fromUser, toUser) VALUE (:fromuser,:touser)");
    $stmt->bindParam(':fromuser', $fromUser);
    $stmt->bindParam(':touser', $toUser);
    $stmt->execute();
  }

  $stmt2=$pdo->prepare("SELECT * FROM message WHERE fromUser =:toUser AND toUser = :fromUser");
  $stmt2->bindParam(':toUser', $toUser);
  $stmt2->bindParam(':fromUser', $fromUser);
  $stmt2->execute();
  $reply_info=$stmt2->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Message</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="user.css" />
</head>
<body>
  <div class="modal-dialog">
    <div class="modal_content">
      <div class="modal_header">
        <h4></h4>
      </div>
      <div class="image-content">
        <span class="overlay"></span>
        <div class="card-image">
          <img src="1.jpg" alt="" class="card-img" />
        </div>
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
                <div class="reply">
                  <?php 
                    if(empty($reply_info)){
                      echo "";
                    }
                    else{
                      foreach($reply_info as $reply){
                        echo $reply['message'];
                      }
                    }
                  ?>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
              <form action='message.php?toId=<?php echo $toUser;?>' method="post">
                <input id="data" name="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
              </form>
            </div>
        </div>
    </div>
    <script>
        // $(document).ready(function(){
        //     $("#send-btn").on("click", function(){
        //         $value = $("#data").val();
        //         $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
        //         $(".form").append($msg);
        //         $("#data").val('');
                
        //         // start ajax code
        //         $.ajax({
        //             url: 'message.php',
        //             type: 'POST',
        //             data: 'text='+$value,
        //             success: function(result){
        //                 $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
        //                 $(".form").append($replay);
        //                 // when chat goes down the scroll bar automatically comes to the bottom
        //                 $(".form").scrollTop($(".form")[0].scrollHeight);
        //             }
        //         });
        //     });
        // });
    </script>
</body>
</html>