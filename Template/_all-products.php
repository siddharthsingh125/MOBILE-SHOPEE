<?php
// Bring $conn from parent into scope
global $conn;
?>

<?php
// Include all products (database connection already exists)
include('Template/_all-products.php');

// Include top sale section
include('Template/_top-sale.php');

// Include footer
include('footer.php');

// Close database connection at the end
$conn->close();
?>