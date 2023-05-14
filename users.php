<?php
  include('dbconn.php');
  session_start();

    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt -> execute();
    $value = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $user_id;
    $i = 0;
    $j = 0;
    $searchValue;
    @$user_id = $_GET[$i];
  @$count = $_GET['count'];

    do{
        if($user_id != null){
                $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = :user_id");
                $stmt ->bindParam(':user_id', $user_id);
                $stmt ->execute();
            $value[$i] = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $searchValue = true;
            }

            
          else{
            $searchValue = false;
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
    <title>Responsive Card Slider</title>

    <link rel="stylesheet" href="css/swiper-bundle.min.css" />

    <link rel="stylesheet" href="user.css" />
  </head>
  <body>
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
    ?>
    <header>
      <!-- nav bar -->
      <nav class="navbar">
        <div class="container-fluid">
          <a class="logo">MORBI</a>
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
            <button>
            <a href="details.php">Insert</a>
        </button>
          </form>
        </div>
      </nav>
    </header>

    <!-- profile -->
    <?php
        foreach ($value as $item){
      ?>
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
              <h2 class="name"><?php echo $item['user_name'] ?></h2>
              <p class="description">
              <?php echo $item['user_details'] ?>
              </p>

              <button class="button" onclick="message()">Message💬</button>
            </div>
            
          </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

      <div class="swiper-button-next swiper-navBtn"></div>
      <div class="swiper-button-prev swiper-navBtn"></div>
      <div class="swiper-pagination"></div>
    </div>
    <?php }?>
  </body>
  <script src="js/script.js">  </script>
  <script>
    function message(){
      window.location.replace("./chat/bot.php");
    }
  </script>
</html>
