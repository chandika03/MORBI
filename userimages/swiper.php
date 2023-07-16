<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
        
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
/* === Google Font Import - Poppins === */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');


* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #ffeaea;
}
/* nav */
.header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  padding: 20px 100px;
  background: #9a208c;
  display: flex;
  justify-content: space-between;
  align-items: center;
  z-index: 99;
}

.logo {
  font-size: 32px;
  color: #fff;
  text-decoration: none;
  font-weight: 700;
}

.navbar a {
  font-size: 18px;
  color: #fff;
  text-decoration: none;
  font-weight: 500;
  margin-right: 40px;
}

section {
  position: relative;
  height: 470px;
  width: 1075px;
  display: flex;
  align-items: center;
}

.swiper {
  width: 1000px;
}

.card {
  position: relative;
  background: #fff;
  border-radius: 20px;
  height: 400px;
  margin: 20px 0;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

.card::before {
  content: "";
  position: absolute;
  
  height: 40%;
  width: 100%;
  background: #ffeaea; /* Updated color */
  color: black;
  border-radius: 20px 20px 0 0;
}

.card .card-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 30px;
  position: relative;
  z-index: 100;
}

section .card .image {
  height: 140px;
  width: 140px;
  border-radius: 20%;
  padding: 3px;
  background: #9a208c; 
  margin-top: 30px;
}

section .card .image img {
  height: 100%;
  width: 100%;
  object-fit: cover;
  border-radius: 20%;
  border: 3px solid #fff;
}

.card .media-icons {
  position: absolute;
  top: 12px;
  right: 95px;
  display: flex;
  flex-direction: row;
  align-items: center;
}

.card .media-icons i {
  color: #9a208c; 
  opacity: 0.6;
  margin-top: 10px;
  transition: all 0.3s ease;
  cursor: pointer;
  margin: 10px;
}

.card .media-icons i:hover {
  opacity: 2;
}

.card .name-bio-age-address{
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 20px;
  color: black;
}

.name-bio-age-address .name {
  font-size: 20px;
  font-weight: 600;
}

.name-bio-age-address .bio {
  font-size: 15px;
  font-weight: 500;
}

.name-bio-age-address .age {
  font-size: 15px;
  font-weight: 500;
}

.name-bio-age-address .address{
  font-size: 15px;
  font-weight: 500;
  color:black;

}
.card .button {
  width: 100%;
  display: flex;
  justify-content: space-around;
  margin-top: 20px;
}

.card .button button {
  background: #9a208c; 
  outline: none;
  border: none;
  color: #fff;
  padding: 8px 22px;
  border-radius: 10px;
  font-size: 14px;
  transition: all 0.3s ease;
  cursor: pointer;
}

.button button:hover {
  background: #e11299; 
}

.swiper-pagination {
  position: absolute;
  top: 470px;
}

.swiper-pagination-bullet {
    
  height: 7px;
  width: 26px;
  border-radius: 25px;
  background: white;
}

.swiper-button-next,
.swiper-button-prev {

  opacity: 0.7;
  color: black;
  transition: all 0.3s ease;
 
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
  opacity: 1;
  color: white;
}
.header input{
  width: 10rem;
  height: 2rem;
  border-radius: 10px;
  border: none;
  border: 1px solid #fff;
  padding-left: 1rem;
}
.header i{
  position: relative;
  
  left: -2rem;
  color: #9a208c;
}

    </style>
</head>
<body>
<header class="header">
      <a href="#" class="logo">MORBI</a>
      <nav class="navbar">
        <a href="#">Home</a>
  <input type="search" placeholder="Search">
  <i class="fa-solid fa-magnifying-glass"></i>
      </nav>
    </header>


<section>
    
    <div class="swiper mySwiper container">
      <div class="swiper-wrapper content">

        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="1.jpg" alt="">
            </div>
            <div class="media-icons">
            <a href="https://www.facebook.com" target="_blank">
             <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank">
             <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank">
             <i class="fab fa-instagram"></i>
            </a>
             
            </div>

            <div class="name-bio-age-address">
              <span class="name">Ally Pearson</span>
              <span class="age">20</span>
              <span class="address">Nepal</span>
              <span class="bio">Web Developer</span>
            </div>

         

            <div class="button">
              <button class="aboutMe">message💬</button>
              
            </div>
          </div>
        </div>
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="2.jpg" alt="">
            </div>

            <div class="media-icons">
            <a href="https://www.facebook.com" target="_blank">
             <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank">
             <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank">
             <i class="fab fa-instagram"></i>
            </a>
             
            </div>

            <div class="name-bio-age-address">
              <span class="name">Dominic Wells</span>
              <span class="age">26</span>
              <span class="address">USA</span>
              <span class="bio">Software Engineer</span>
            </div>

            

            <div class="button">
            <button class="aboutMe">message💬</button>
              
            </div>
          </div>
        </div>
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="images/3.jpg" alt="">
            </div>

            <div class="media-icons">
            <a href="https://www.facebook.com" target="_blank">
             <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank">
             <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank">
             <i class="fab fa-instagram"></i>
            </a>
             
            </div>

            <div class="name-bio-age-address">
              <span class="name">Kylie Smith</span>
              <span class="age">29</span>
              <span class="address">Thailand</span>
              <span class="bio">UX/UI Desinger</span>
            </div>

          
            <div class="button">
            <button class="aboutMe">message💬</button>
            
            </div>
          </div>
        </div>
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="4.jpg" alt="">
            </div>

            <div class="media-icons">
            <a href="https://www.facebook.com" target="_blank">
             <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank">
             <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank">
             <i class="fab fa-instagram"></i>
            </a>
             
            </div>

            <div class="name-bio-age-address">
              <span class="name">Stephanie Xia</span>
              <span class="age">22</span>
              <span class="address">Nepal</span>
              <span class="bio">Backend Developer</span>
            </div>

            

            <div class="button">
            <button class="aboutMe">message💬</button>
             
            </div>
          </div>
        </div>
        <div class="swiper-slide card">
          <div class="card-content">
            <div class="image">
              <img src="5.jpg" alt="">
            </div>

            <div class="media-icons">
            <a href="https://www.facebook.com" target="_blank">
             <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank">
             <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank">
             <i class="fab fa-instagram"></i>
            </a>
             
            </div>

           
      </div>
    </div>

    <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination">
      </div>
  </section>

  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <script src="./swiper.js"></script>

</body>
</html>