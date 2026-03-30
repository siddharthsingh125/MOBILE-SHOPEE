<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopee";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$pass'");
    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Mobile Shopee</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body { font-family: Arial; background: #f8f8f8; }
        .form-box { margin: 100px auto; padding: 30px; background: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        input { width: 100%; padding: 10px; margin-bottom: 15px; }
        button { width: 100%; padding: 10px; background: #fb6f78; color: white; border: none; cursor: pointer; }
        p { text-align: center; }
    </style>
</head>
<body>

<div class="loginpage">
    <div class="uppersection"><img src="assets/faq/loginhero.jpg" alt=""></div>
    <div class="lowersecction">
        <div class="form-box">
            <div class="image"><img src="assets/faq/logo.png" alt=""></div>
            <h2 style="text-align:center;">Login Now</h2>
            <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <form method="POST">
                <label for="">Email *</label>
                <input type="email" name="email" placeholder="Enter Email" required>
                <label for="">Password *</label>
                <input type="password" name="password" placeholder="Enter Password" required>
                <button type="submit" name="login">Login</button>
            </form>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</div>

</body>
</html>