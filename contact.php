<?php
// Include header if your site has one
include('header.php'); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopee";

$conn = new mysqli($servername, $username, $password, $dbname);

// FORM SUBMIT
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $conn->query("INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')");
    $success = "Message sent successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us - Mobile Shopee</title>

    <link rel="stylesheet" href="/Mobile_Shopee-E-Commerce-Website/css/style.css">
</head>
<body>

<div class="contact-section">

    <!-- Background -->
    <div class="contact-bg">
        <h1>Contact Us</h1>
        <p>Any questions or remarks? Just write us a message!</p>
    </div>

    <!-- Main Card -->
    <div class="contact-box">
        <div class="contact-card">

            <div class="left">
                <div class="image"><img src="assets/faq/formimage.jpg" alt=""></div>
                <div class="container_new">
                    <div class="box">
                        <h4>Sydney</h4>
                        <p>45 Pirrama Rd, <br> Pyrmont NSW 2022</p>
                    </div>
                    <div class="box">
                        <h4>Sydney</h4>
                        <p>45 Pirrama Rd, <br> Pyrmont NSW 2022</p>
                    </div>
                    <div class="box">
                        <h4>Sydney</h4>
                        <p>45 Pirrama Rd, <br> Pyrmont NSW 2022</p>
                    </div>
                </div>
            </div>

            <!-- Right Form -->
            <div class="right">
                <h2>Get in Touch</h2>
                <p>Have an inquiry or some feedbak for us? Fill out the form below to contact our team.</p>

                <?php if(isset($success)) echo "<p class='success'>$success</p>"; ?>

                <form method="POST">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Enter your Name" required>
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Enter a valid email address" required>
                    <label for="">How can we help?</label>
                    <textarea name="message" rows="5" placeholder="" required></textarea>
                    <button type="submit" name="submit">SUBMIT</button>
                </form>
            </div>

        </div>
    </div>

</div>

</body>
</html>

<?php
// Include footer if your site has one
include('footer.php'); 
?>