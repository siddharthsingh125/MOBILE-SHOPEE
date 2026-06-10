<?php
require_once('../functions.php');

if(isset($_POST['item_name'])){

    $brand = $_POST['item_brand'];
    $name = $_POST['item_name'];
    $price = $_POST['item_price'];
    $image = $_POST['item_image'];

    $sql = "
        INSERT INTO product
        (item_brand,item_name,item_price,item_image,item_register)
        VALUES
        (
            '$brand',
            '$name',
            '$price',
            '$image',
            NOW()
        )
    ";

    mysqli_query($db->con, $sql);

    header("Location: products.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial;
}

body{
    background:#f5f6fa;
}

/* SIDEBAR */
.sidebar{
    position:fixed;
    width:240px;
    height:100vh;
    background:#ee4d2d;
    color:white;
    padding:20px;
}

.sidebar h2{
    margin-bottom:25px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px;
    margin:8px 0;
    border-radius:8px;
    background:rgba(255,255,255,0.1);
    transition:0.3s;
}

.sidebar a:hover{
    background:rgba(255,255,255,0.25);
}

/* MAIN */
.main{
    margin-left:240px;
    padding:30px;
}

/* TOP BAR */
.topbar{
    background:white;
    padding:15px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
    margin-bottom:20px;
}

/* FORM CARD */
.card{
    background:white;
    width:500px;
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.1);
    animation:fadeIn 0.6s ease;
}

/* TITLE */
h1{
    color:#ee4d2d;
    margin-bottom:20px;
}

/* INPUT */
label{
    font-size:14px;
    color:#444;
}

input{
    width:100%;
    padding:12px;
    margin-top:6px;
    margin-bottom:15px;
    border:1px solid #ddd;
    border-radius:10px;
    outline:none;
    transition:0.3s;
}

input:focus{
    border-color:#ee4d2d;
    box-shadow:0 0 8px rgba(238,77,45,0.3);
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    border:none;
    background:#ee4d2d;
    color:white;
    border-radius:10px;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#d63f22;
    transform:scale(1.03);
}

/* LAYOUT */
.container{
    display:flex;
    gap:20px;
}

/* IMAGE PREVIEW BOX */
.preview{
    flex:1;
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.1);
    height:fit-content;
    animation:fadeIn 0.6s ease;
}

.preview-box{
    width:100%;
    height:250px;
    border:2px dashed #ddd;
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#aaa;
    font-size:14px;
    margin-top:10px;
}

/* ANIMATION */
@keyframes fadeIn{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}

</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>🛍️ Admin Panel</h2>
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="products.php">📦 Products</a>
    <a href="blogs.php">📝 Blogs</a>
    <a href="#">🛒 Orders</a>
    <a href="profile.php">👤 Profile</a>
</div>

<!-- MAIN -->
<div class="main">

    <div class="topbar">
        <h2>Add New Product</h2>
    </div>

    <div class="container">

        <!-- FORM -->
        <div class="card">

            <h1>➕ Add Product</h1>

            <form method="POST">

                <label>Brand</label>
                <input type="text" name="item_brand" placeholder="Enter brand">

                <label>Product Name</label>
                <input type="text" name="item_name" placeholder="Enter product name">

                <label>Price</label>
                <input type="number" step="0.01" name="item_price" placeholder="Enter price">

                <label>Image Path</label>
                <input type="text" name="item_image" placeholder="images/product.jpg">

                <button type="submit">Add Product</button>

            </form>

        </div>

        <!-- PREVIEW -->
        <div class="preview">
            <h3>Image Preview</h3>
            <div class="preview-box">
                Product image will show here
            </div>
        </div>

    </div>

</div>

</body>
</html>