<?php

require_once('../functions.php');

$id = $_GET['id'];

if(isset($_POST['item_name'])){

    $brand = $_POST['item_brand'];
    $name = $_POST['item_name'];
    $price = $_POST['item_price'];
    $image = $_POST['item_image'];

    $sql = "
        UPDATE product
        SET
        item_brand='$brand',
        item_name='$name',
        item_price='$price',
        item_image='$image'
        WHERE item_id=$id
    ";

    mysqli_query($db->con, $sql);

    header("Location: products.php");
    exit();
}

$productData = $product->getProduct($id);

$item = $productData[0];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

<h1>Edit Product</h1>

<form method="POST">

    Brand:
    <input type="text"
           name="item_brand"
           value="<?php echo $item['item_brand']; ?>">
    <br><br>

    Product Name:
    <input type="text"
           name="item_name"
           value="<?php echo $item['item_name']; ?>">
    <br><br>

    Price:
    <input type="number"
           step="0.01"
           name="item_price"
           value="<?php echo $item['item_price']; ?>">
    <br><br>

    Image:
    <input type="text"
           name="item_image"
           value="<?php echo $item['item_image']; ?>">
    <br><br>

    <button type="submit">
        Update Product
    </button>

</form>

</body>
</html>