<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MORBI - Online Dating Platform</title>
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <style>
   
      /* === Google Font Import - Poppins === */
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      body {
        background-color: #ffeaea;
      }

      .navbar {
        background-color: #9a208c;
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .logo {
        color: #ffeaea;
        font-size: 24px;
        font-weight: bold;
        text-decoration: none;
      }

      .text-container {
        max-width: 600px;
        margin: 50px auto;
        text-align: center;
      }

      .text-center {
        color: #e11299;
      }

      .para p {
        color: #9a208c;
        text-align: justify;
      }

      .list {
        margin: 50px auto;
        text-align: center;
      }

      .list h4 {
        color: #e11299;
        font-weight: 600;
      }

      

      .list li {
        margin-bottom: 10px;
        color: #9a208c;
      }

      .back-button {
        margin-top: 20px;
       padding-left: 45rem;
       margin-bottom: 2px;
      }

      .back-button a {
        color: #9a208c;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease;
        
      }

      .back-button a:hover {
        color: #e11299;
      }

      /* footer */
      .footer {
        background-color: #f9b5d0;
        padding: 30px 40rem;
      }
     
      .footer-col h4 {
        font-size: 20px;
        color: #e11299;
        text-transform: capitalize;
        margin-bottom: 35px;
        font-weight: 500;
        position: relative;
      }
      .footer-col h4::before {
        content: "";
        position: absolute;
        left: 0px;
        bottom: -10px;
        background-color: #9a208c;
        height: 2px;
        box-sizing: border-box;
        width: 50px;
      }
      

      .footer-col .social-links a {
        display: inline-block;
        height: 40px;
        width: 40px;
        background-color: rgba(255, 255, 255, 0.2);
        margin: 0 10px 10px 0;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        color: #ffffff;
        transition: all 0.5s ease;
      }
      .footer-col .social-links a:hover {
        color: #24262b;
        background-color: #ffffff;
      }
    </style>
  </head>
  <body>
    <nav class="navbar">
      <a href="../morbi.php" class="logo">MORBI</a>
    </nav>

    <div class="text-container">
      <h3 class="text-center">Welcome to MORBI</h3>
      <div class="para">
        <p>
          MORBI is an online dating platform that is primarily designed for
          connecting individuals looking for connections or matrimonial
          alliances. It is a part of Global matrimony. Register with us for FREE
          to find a partner of your choice. Take advantage of our user-friendly
          search features to find a bride or groom. Join us and begin your happy
          journey today<br />
          <br />This website will allow users to look for other registered users
          who share their interests. To engage with possible partners, users
          will be able to establish extensive profiles that include photos and
          personal information. This website will have an easy-to-use layout
          that will allow users to easily browse through profiles and
          communicate with other members via chat.This website will allow users
          to look for other registered users who share their interests. To
          engage with possible partners, users will be able to establish
          extensive profiles that include photos and personal information. This
          website will have an easy-to-use layout that will allow users to
          easily browse through profiles and communicate with other members via
          chat.
          <br />
        </p>
      </div>
    </div>
    <div class="list">
      <h4>4 EASY STEPS TO FIND THE RIGHT MATCH</h4>
      <ol>
        <li>Create an account</li>
        <li>Browse other registered accounts according to your preference</li>
        <li>Connect with them through message</li>
        <li>Make friends, or create matrimonial alliances with people</li>
      </ol>
    </div>
    <div class="back-button">
      <a href="users.php">⬅Back</a>
    </div>
  </body>
  <footer class="footer">
    

        <div class="footer-col">
          <h4>Connect with us</h4>
          <div class="social-links">
            <a href="https://www.facebook.com" target="_blank">
              <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.twitter.com" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com" target="_blank">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.youtube.com" target="_blank">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</html>
