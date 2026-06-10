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