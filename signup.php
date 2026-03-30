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

// SIGNUP LOGIC
if (isset($_POST['signup'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Check if email already exists
    $check = $conn->query("SELECT * FROM users WHERE email='$email'");

    if ($check->num_rows > 0) {
        $error = "Email already exists!";
    } else {

        // Insert user data
        if ($conn->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')")) {

            // Optional: store session
            $_SESSION['email'] = $email;

            // Redirect to homepage (auto login)
            header("Location: index.php");
            exit();
        } else {
            $error = "Something went wrong!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - Mobile Shopee</title>

    <!-- CSS FIX (Absolute Path) -->
    <link rel="stylesheet" href="/Mobile_Shopee-E-Commerce-Website/css/style.css">

    <style>
        body {
            font-family: Arial;
            background: #f8f8f8;
            margin: 0;
        }

        .loginpage {
            text-align: center;
        }

        .uppersection img {
            width: 100%;
            max-height: 250px;
            object-fit: cover;
        }

        .lowersecction {
            margin-top: -80px;
        }

        .form-box {
            margin: auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative;
        }

        .form-box .image img {
            width: 100px;
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
        }

        h2 {
            margin-top: 40px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #fb6f78;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        p {
            text-align: center;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>

<div class="loginpage">

    <!-- Hero Image -->
    <div class="uppersection">
        <img src="/Mobile_Shopee-E-Commerce-Website/assets/faq/loginhero.jpg" alt="">
    </div>

    <div class="lowersecction">
        <div class="form-box">

            <!-- Logo -->
            <div class="image">
                <img src="/Mobile_Shopee-E-Commerce-Website/assets/faq/logo.png" alt="">
            </div>

            <h2>Sign Up Now</h2>

            <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

            <form method="POST">

                <label>Username *</label>
                <input type="text" name="name" placeholder="Enter your Username" required>

                <label>Email *</label>
                <input type="email" name="email" placeholder="Enter Email" required>

                <label>Password *</label>
                <input type="password" name="password" placeholder="Enter Password" required>

                <button type="submit" name="signup">Sign Up</button>

            </form>

            <p>Already have an account? <a href="login.php">Login</a></p>

        </div>
    </div>
</div>

</body>
</html>