<?php
    include('dbconn.php');

    @$invalid = $_POST['invalid'];
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="morbi.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Login</title>
    <script src="script.js" defer></script>
  </head>
  <body>
    <!-- <div class="container my-5">
      <?php if($invalid != null){?>
       <div class="alert alert-danger mb-3" role="alert"> 
        <?php echo $invalid ?>
      </div>
      <?php }?>
    </div>
  -->
    <header class="header">
      <a href="#" class="logo">MORBI</a>

      <nav class="navbar">
        <a href="#">Home</a>
        <a href="#">About us</a>
        <button class="btnLogin-popup">Login</button>
      </nav>
    </header>

    <section class="section">
      <div class="wrapper">
        <span class="icon-close">
          <i class="bx bx-x"></i>
        </span>

        <div class="logreg-box">
          <!-- Login popup -->
          <div class="form-box login">
            <div class="logreg-title">
              <h2>Login</h2>
              <p>Please login to use the platform</p>
            </div>
            <form action="logindb.php" method="POST">
              <div class="input-box">
                <span class="icon"><i class="bx bxs-user"></i> </span>
                <input type="text" name="email" required />
                <label>Email</label>
              </div>

              <div class="input-box">
                <span class="icon"><i class="bx bxs-lock-alt"></i> </span>
                <input type="password" name="password" required />
                <label>Password</label>
              </div>

              <div class="remember-forgot">
                <label><input type="checkbox" />Remember me </label>
                <a href="#"> Forgot Password?</a>
              </div>

              <button type="submit" class="btn">Login</button>

              <div class="logreg-link">
                <p>Don't have an account?</p>
                <a href="#" class="register-link">Sign Up</a>
              </div>
            </form>
          </div>

          <!-- Sign In form -->
          <div class="form-box signin">
            <div class="logreg-title">
              <h2>Sign In Form</h2>
              <p>Please provide the follwing to verify your identity</p>
            </div>
            <form action="signupdb.php" method="post">
              <div class="input-box">
                <span class="icon"><i class="bx bxs-user"></i> </span>
                <input type="text" name="name" required />
                <label>Full Name</label>
              </div>

              <div class="input-box">
                <span class="icon"><i class="bx bxs-envelope"></i> </span>
                <input type="email" name="email" required />
                <label>Email Address</label>
              </div>

              <div class="input-box">
                <span class="icon"><i class="bx bxs-lock-alt"></i> </span>
                <input type="password" name="password" required />
                <label>Password</label>
              </div>

              <div class="input-box">
                <span class="icon"><i class="bx bxs-lock-alt"></i> </span>
                <input type="password" name="cpassword" required />
                <label>Confirm Password</label>
              </div>

              <button type="submit" class="btn">Sign In</button>
              <div class="logreg-link">
                <p>
                  Already have an account?<a href="#" class="login-link"
                    >Login</a
                  >
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
