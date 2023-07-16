<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <form method="post" action="login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
    <?php
session_start();
include '../dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username = :username AND password = :password";
    $statement = $pdo->prepare($query);
    $statement->execute(['username' => $username, 'password' => $password]);
    $admin = $statement->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        $_SESSION['admin_id'] = $admin['admin_id'];
        $_SESSION['username'] = $admin['username'];
        header('Location: admin.php');
        exit();
    } else {
        echo "Invalid login credentials";
    }
}
?>

</body>
</html>