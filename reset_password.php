<html>
    <head></head>
    <body>
<div class="form-box forgot-password">
  <div class="logreg-title">
    <h2>Forgot Password</h2>
    <p>Enter your email to reset your password</p>
  </div>
  <form action="reset_password.php" method="post">
    <div class="input-box">
      <span class="icon"><i class="bx bxs-envelope"></i></span>
      <input type="email" name="email" required />
      <label>Email</label>
    </div>
    <div class="input-box">
      <span class="icon"><i class="bx bxs-lock-alt"></i></span>
      <input type="password" name="new_password" required />
      <label>New Password</label>
    </div>
    <div class="input-box">
      <span class="icon"><i class="bx bxs-lock-alt"></i></span>
      <input type="password" name="confirm_password" required />
      <label>Confirm Password</label>
    </div>
    <button type="submit" class="btn" name="reset_password">Reset Password</button>
  </form>
</div>
</body>
</html>
<?php
include('dbconn.php');
session_start();

if (isset($_POST['reset_password'])) {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the email exists in your database using PDO
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Check if new password and confirm password match
        if ($new_password === $confirm_password) {
            // Hash the new password
            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the user's password in the database using PDO
            $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE id = :user_id");
            $stmt->bindParam(':password', $hashed_new_password);
            $stmt->bindParam(':user_id', $user['id']);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Password reset successful
                echo "Password reset successful. You can now log in with your new password.";
            } else {
                echo "Error updating the password.";
            }
        } else {
            echo "New password and confirm password do not match.";
        }
    } else {
        echo "Email not found in the database.";
    }
}
?>
