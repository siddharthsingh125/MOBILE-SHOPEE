<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopee"; // must match the exact database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// Include header for consistent navigation and styles
include('header.php');
?>

<div class="bolgherosection" style="background-image: url('assets/faq/background.png');">
  <div class="container">
    <div class="uppersection">
      <div class="left">
        <h2>Latest Mobile Trends & Tech Insights</h2>
        <p>Stay updated with the latest news, smartphone launches, gadget reviews, buying guides, and expert tips from <strong>Mobile Shopee</strong>. Explore helpful articles that make it easier to choose the right mobile phone, accessories, and tech products for your needs.</p>
      </div>
      <div class="right">
        <div class="image">
          <img src="assets/faq/phone.png" alt="">
        </div>
      </div>
    </div>
    <div class="bottomsection">
      <div class="box">
        <h4>Latest Smartphones</h4>
        <p>Shop the newest smartphones with powerful features and stylish designs at great prices.</p>
      </div>
       <div class="box">
        <h4>Genuine Accessories</h4>
        <p>Find original chargers, earphones, covers, and mobile essentials for every device.</p>
      </div>
       <div class="box">
        <h4>Secure Shopping</h4>
        <p>Enjoy safe payments, quick delivery, and easy returns with trusted support.</p>
      </div>
    </div>
  </div>
</div>
<div class="reliablesystem">
    <div class="container">
        <h4> Mobile Shopee Meets Smart Performance</h4>
        <p> Discover smartphones built with advanced technology, powerful processors, long-lasting batteries, and ultra-fast connectivity to match your everyday needs.</p>
        <div class="layout">
            <div class="box">
                <div class="circle">
                    <div>
                        <h3>5x</h3>
                    </div>
                </div>
                <h6>faster processor performance</h6>
            </div>
            <div class="box">
                <div class="circle">
                    <div>
                        <h3>17x</h3>
                    </div>
                </div>
                <h6>smoother gaming experience</h6>
            </div>
            <div class="box">
                <div class="circle">
                    <div>
                        <h3>20x</h3>
                    </div>
                </div>
                <h6>better battery backup</h6>
            </div>
            <div class="box">
                <div class="circle">
                    <div>
                        <h3>100%</h3>
                    </div>
                </div>
                <h6>stronger network connectivity</h6>
            </div>
        </div>
        <div class="color"></div>
    </div>
</div>
<div class="container my-5">
    <h1 class="text-center mb-4">Our Blog</h1>
    <div class="row">

    <?php
    // Fetch blog posts from the database
    $sql = "SELECT * FROM blogs ORDER BY created_at DESC"; // adjust table/columns
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card h-100">';
            echo '<img class="card-img-top" src="' . $row['image'] . '" alt="' . $row['title'] . '">';
            echo '<div class="card-body">';
            echo '<div class="card-date">' . date("d F Y", strtotime($row['created_at'])) . '</div>';
            echo '<h5 class="card-title">' . $row['title'] . '</h5>';
            echo '<p class="card-text">' . substr($row['content'], 0, 150) . '...</p>';
            echo '<a href="blog_single.php?id=' . $row['id'] . '" class="btn btn-primary">Read More</a>';
            echo '</div></div></div>';
        }
    } else {
        echo "<p class='text-center'>No blog posts found.</p>";
    }
    ?>

    </div>
</div>

<?php
include('footer.php'); // includes your footer
$conn->close();        // close database connection
?>