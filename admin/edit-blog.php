<?php

require_once('../functions.php');

$id = $_GET['id'];

$blogQuery = mysqli_query($db->con, "SELECT * FROM blogs WHERE id=$id");
$blog = mysqli_fetch_assoc($blogQuery);

if(isset($_POST['title'])){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    $sql = "
        UPDATE blogs
        SET
        title='$title',
        content='$content',
        image='$image'
        WHERE id=$id
    ";

    mysqli_query($db->con, $sql);

    header("Location: blogs.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Blog</title>

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

/* TOPBAR */
.topbar{
    background:white;
    padding:15px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
    margin-bottom:20px;
    animation:fadeIn 0.5s ease;
}

/* CONTAINER */
.container{
    display:flex;
    gap:20px;
}

/* FORM CARD */
.card{
    flex:2;
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    animation:slideUp 0.6s ease;
}

/* PREVIEW CARD */
.preview{
    flex:1;
    background:white;
    padding:20px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    animation:fadeIn 0.6s ease;
}

/* INPUTS */
label{
    font-size:14px;
    color:#444;
}

input, textarea{
    width:100%;
    padding:12px;
    margin-top:6px;
    margin-bottom:15px;
    border:1px solid #ddd;
    border-radius:10px;
    outline:none;
    transition:0.3s;
}

input:focus, textarea:focus{
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

/* IMAGE PREVIEW BOX */
.preview-box{
    width:100%;
    height:200px;
    border:2px dashed #ddd;
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#aaa;
    font-size:13px;
    margin-top:10px;
}

/* TITLE STYLE */
h2{
    color:#ee4d2d;
    margin-bottom:15px;
}

/* ANIMATION */
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
    <a href="blogs.php">📝 Blogs</a>
    <a href="add-blog.php">➕ Add Blog</a>
    <a href="#">🛒 Orders</a>
    <a href="profile.php">👤 Profile</a>
</div>

<!-- MAIN -->
<div class="main">

    <div class="topbar">
        <h2>Edit Blog</h2>
        <p>Update your blog content</p>
    </div>

    <div class="container">

        <!-- FORM -->
        <div class="card">

            <h2>✏️ Edit Blog</h2>

            <form method="POST">

                <label>Title</label>
                <input type="text" name="title"
                       value="<?php echo $blog['title']; ?>">

                <label>Content</label>
                <textarea name="content" rows="10"><?php echo $blog['content']; ?></textarea>

                <label>Image Path</label>
                <input type="text" name="image"
                       value="<?php echo $blog['image']; ?>">

                <button type="submit">Update Blog</button>

            </form>

        </div>

        <!-- PREVIEW -->
        <div class="preview">
            <h3>Blog Preview</h3>

            <p><b>Title:</b></p>
            <p><?php echo $blog['title']; ?></p>

            <br>

            <p><b>Content Preview:</b></p>
            <p style="font-size:13px;color:#555;">
                <?php echo substr($blog['content'],0,200); ?>...
            </p>

            <div class="preview-box">
                Image preview will show here
            </div>
        </div>

    </div>

</div>

</body>
</html>