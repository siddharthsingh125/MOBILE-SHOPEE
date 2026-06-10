<?php
require_once('../functions.php');

$products = $product->getData();
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Products</title>

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
    padding:25px;
}

/* TOP BAR */
.topbar{
    background:white;
    padding:15px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
    margin-bottom:20px;
    animation:fadeIn 0.5s ease;
}

/* CARD */
.card{
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    animation:slideUp 0.6s ease;
}

/* BUTTONS */
a.btn{
    text-decoration:none;
    display:inline-block;
    padding:10px 14px;
    border-radius:8px;
    font-size:14px;
    transition:0.3s;
}

.add-btn{
    background:#ee4d2d;
    color:white;
}

.add-btn:hover{
    background:#d63f22;
    transform:scale(1.05);
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
    overflow:hidden;
    border-radius:10px;
}

th{
    background:#ee4d2d;
    color:white;
    padding:12px;
    text-align:left;
}

td{
    padding:12px;
    border-bottom:1px solid #eee;
}

/* ROW HOVER */
tr{
    transition:0.3s;
}

tr:hover{
    background:#fff3f0;
    transform:scale(1.01);
}

/* ACTION BUTTONS */
.action a{
    padding:6px 10px;
    border-radius:6px;
    text-decoration:none;
    font-size:13px;
    margin-right:5px;
    transition:0.3s;
}

.edit{
    background:#2196f3;
    color:white;
}

.edit:hover{
    background:#0b7dda;
}

.delete{
    background:#f44336;
    color:white;
}

.delete:hover{
    background:#d32f2f;
}

/* ANIMATIONS */
@keyframes fadeIn{
    from{opacity:0;}
    to{opacity:1;}
}

@keyframes slideUp{
    from{transform:translateY(20px); opacity:0;}
    to{transform:translateY(0); opacity:1;}
}

</style>

</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>🛍️ Admin Panel</h2>
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="products.php">📦 Products</a>
    <a href="add-product.php">➕ Add Product</a>
    <a href="blogs.php">📝 Blogs</a>
    <a href="profile.php">👤 Profile</a>
</div>

<!-- MAIN -->
<div class="main">

    <div class="topbar">
        <h2>Manage Products</h2>
        <p>View, edit and delete your products</p>
    </div>

    <div class="card">

        <a href="add-product.php" class="btn add-btn">+ Add New Product</a>

        <table>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>

            <?php foreach($products as $item){ ?>

            <tr>

                <td><?php echo $item['item_id']; ?></td>
                <td><?php echo $item['item_name']; ?></td>
                <td>₹<?php echo $item['item_price']; ?></td>

                <td class="action">
                    <a class="edit" href="edit-product.php?id=<?php echo $item['item_id']; ?>">Edit</a>
                    <a class="delete"
                       href="delete-product.php?id=<?php echo $item['item_id']; ?>"
                       onclick="return confirm('Delete this product?')">
                       Delete
                    </a>
                </td>

            </tr>

            <?php } ?>

        </table>

    </div>

</div>

</body>
</html>