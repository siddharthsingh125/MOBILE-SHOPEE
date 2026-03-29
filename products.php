<?php
// include header
include('header.php');

// connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopee";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
?>

<div class="container my-5">
    <h1 class="pdpheading">Mobiles</h1>
    <div class="pdphero">
    <div class="container_new">
        <div class="box"><img src="assets/faq/hero1.avif" alt="Image 1"></div>
        <div class="box"><img src="assets/faq/hero2.avif" alt="Image 1"></div>
        <div class="box"><img src="assets/faq/hero3.avif" alt="Image 1"></div>
        <div class="box"><img src="assets/faq/hero5.avif" alt="Image 1"></div>
        <div class="box"><img src="assets/faq/hero6.avif" alt="Image 1"></div>
        <div class="box"><img src="assets/faq/hero7.avif" alt="Image 1"></div>
    </div>
</div>
<div class="pdpcontent">
<h2><strong>Buy Top Mobile Phones at Prices You’ll Love</strong></h2>
<p><span style="">Need to upgrade your </span><strong>mobile phone</strong><span style="">? You’re in the right place. When visiting Reliance Digital, the experience of exploring mobiles is easy, thrilling, and hassle-free. Whether it is the most basic </span><strong>mobile phone</strong><span style=""> or a smartphone with all the features you need, we have choices that are reasonable across all budgets and lifestyles. Find the </span><strong>latest mobile phones </strong><span style="">of the leading brands, easily compare features and get great offers at the same time. When you </span><strong>buy a mobile phone with us online</strong><span style="">, you purchase real products, easy payment options and fast delivery, so your next upgrade is only a few clicks away.</span></p>
</div>
    <h1 class="text-center mb-4">All Products</h1>
    <div class="row">
        <?php
        $sql = "SELECT * FROM product ORDER BY item_id DESC";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card h-100">';
                echo '<a href="product.php?item_id=' . $row['item_id'] . '">';
                echo '<img class="card-img-top" src="' . $row['item_image'] . '" alt="' . $row['item_name'] . '">';
                echo '</a>';
                echo '<div class="card-body text-center">';
                echo '<h5 class="card-title">' . $row['item_name'] . '</h5>';
                echo '<p class="price">$' . $row['item_price'] . '</p>';
                echo '<a href="product.php?item_id=' . $row['item_id'] . '" class="btn btn-primary">View Details</a>';
                echo '</div></div></div>';
            }
        } else {
            echo "<p class='text-center'>No products found.</p>";
        }
        ?>
    </div>
</div>

<?php
include('footer.php');
$conn->close();
?>