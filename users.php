<?php
  include('dbconn.php');
  session_start();
  echo $_SESSION['user'];

  if(!isset($_SESSION['user'])){
    header("Location: /morbi/morbi.php");
    exit();
  }
    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt -> execute();
    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $user_id;
    $i = 0;
    $j = 0;
    $searchValue;
  
    @$count = $_GET['count'];
     
    $searchValue = false;

    do{
        if($count != null){
                @$user_id = $_GET[$i];
                $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = :user_id");
                $stmt ->bindParam(':user_id', $user_id);
                $stmt ->execute();
            $value[$i] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $searchValue = true;
            }
        $i++;
    }while($i<$count);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Users</title>

    <!-- <link rel="stylesheet" href="swiper-bundle.min.css" /> -->

    <link rel="stylesheet" href="user.css" />
  </head>
  <body>
  <header>
      <!-- nav bar -->
      <nav class="navbar">
        <div class="container-fluid">
          <a class="logo"><b>MORBI</b></a>
          <form class="d-flex" role="search" method="POST" action="search.php">
            <input
              class="form-control me-2"
              type="search"
              name="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
    <button><a href="logout.php">Logout</a></button>
          </form>
        </div>
        <div class="profile">
          <a href="details.php"
            ><img src="<?php echo $value [$_SESSION['user'] - 1] ['user_image']  ?>" alt=""
          /></a> <!-- Added the reduired user image like this -->
        </div>
        
      </nav>
    </header>
    
  <?php
  
        if($searchValue){
        foreach($value as $item){?>
        
        
      <div class="slide-container swiper">
      <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              
              <div class="card-image">
                <img src="1.jpg" alt="" class="card-img" />
              </div>
            </div>
            <div class="card-content">
              <h2 class="name"><?php echo $item[0]['user_name'] ?></h2>
              <p class="description">
              <?php echo $item[0]['user_details'] ?>
              </p>
              <button class="button">View More</button>
            </div>
            
          </div>
            </div>
          </div>
        </div>
      </div>
     
        <?php 
        $j += 1;
        if($j>=$count){
          break;
        }
        }}
        
        else{ 
        }
    ?>
    <!-- profile -->
    <?php
        foreach ($value as $item){
          // echo $item['user_id']."id <br>";
          // echo $_SESSION['user'];
          if($item['user_id'] == $_SESSION['user']){
            continue;//skipp logger user bc we don't need to show message option for logged user 
          }
      ?>
    <div class="slide-container swiper">
      <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
          <div class="card swiper-slide">
            <div class="image-content">
              <span class="overlay"></span>

              
              <div class="card-image">
                <img src="<?php echo $item['user_image']  ?>" alt="" class="card-img"/>
              </div>
            </div>
            <div class="card-content">
              <h2 class="name"><?php echo $item['user_name']; ?></h2>
              <p class="description">
              <?php echo $item['user_details']; ?>
              </p>
              <p id="TOuser_id"><?php echo $item['user_id'];?></p>

              <!-- <button class="button" onclick="message()">Message💬</button> -->
              <!-- <button class="button" id="msg_btn" name="msg_btn" onclick="message()" value="1">Message💬</button> -->
              <a href= "./chat/chatmodule.php?toId=<?php echo $item['user_id'];?>"><button class="button" id="message_btn" >Message💬</button></a>
            </div>
            
          </div>
            </div>
          </div>
        </div>
      </div>

      <div class="swiper-button-next swiper-navBtn"></div>
      <div class="swiper-button-prev swiper-navBtn"></div>
      <div class="swiper-pagination"></div>
    </div>
    <?php }?>
  </body>
  <!-- <script src="script.js">  </script> -->
  
</html>
