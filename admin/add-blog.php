<?php
require_once('../functions.php');

if(isset($_POST['title'])){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    $sql = "
    INSERT INTO blogs
    (title, content, image)
    VALUES
    ('$title', '$content', '$image')
    ";

    mysqli_query($db->con, $sql);

    header("Location: blogs.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Blog</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: "Segoe UI", sans-serif;
}

body{
    background: linear-gradient(135deg, #f5f6fa, #e9eef7);
}

/* SIDEBAR */
.sidebar{
    position:fixed;
    width:240px;
    height:100vh;
    background: linear-gradient(180deg, #ee4d2d, #ff6a3d);
    color:white;
    padding:20px;
    box-shadow: 5px 0 20px rgba(0,0,0,0.1);
}

.sidebar h2{
    margin-bottom:25px;
}

.sidebar a{
    display:flex;
    gap:10px;
    align-items:center;
    color:white;
    text-decoration:none;
    padding:12px;
    margin:8px 0;
    border-radius:10px;
    background:rgba(255,255,255,0.12);
    transition:0.3s;
}

.sidebar a:hover{
    background:rgba(255,255,255,0.25);
    transform:translateX(5px);
}

/* MAIN */
.main{
    margin-left:240px;
    padding:30px;
}

/* TOP BAR */
.topbar{
    background: rgba(255,255,255,0.7);
    backdrop-filter: blur(10px);
    padding:18px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    margin-bottom:25px;
    animation:fadeIn 0.5s ease;
}

/* LAYOUT */
.container{
    display:flex;
    gap:25px;
}

/* FORM CARD */
.card{
    flex:2;
    background: rgba(255,255,255,0.75);
    backdrop-filter: blur(12px);
    padding:30px;
    border-radius:18px;
    box-shadow:0 15px 35px rgba(0,0,0,0.1);
    animation:slideUp 0.6s ease;
}

/* PREVIEW */
.preview{
    flex:1;
    background: rgba(255,255,255,0.75);
    backdrop-filter: blur(12px);
    padding:20px;
    border-radius:18px;
    box-shadow:0 15px 35px rgba(0,0,0,0.1);
    animation:fadeIn 0.6s ease;
}

/* TITLE */
h2{
    color:#ee4d2d;
    margin-bottom:15px;
}

/* FLOATING LABEL STYLE INPUT */
.field{
    position:relative;
    margin-bottom:18px;
}

input, textarea{
    width:100%;
    padding:14px;
    border-radius:12px;
    border:1px solid #ddd;
    outline:none;
    background:white;
    transition:0.3s;
    font-size:14px;
}

input:focus, textarea:focus{
    border-color:#ee4d2d;
    box-shadow:0 0 10px rgba(238,77,45,0.25);
    transform:scale(1.02);
}

/* BUTTON */
button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:12px;
    background: linear-gradient(90deg, #ee4d2d, #ff6a3d);
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
    box-shadow:0 10px 20px rgba(238,77,45,0.3);
}

button:hover{
    transform:translateY(-3px);
    box-shadow:0 15px 25px rgba(238,77,45,0.4);
}

/* PREVIEW BOX */
.preview-box{
    width:100%;
    height:200px;
    border-radius:15px;
    border:2px dashed #ddd;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#aaa;
    font-size:13px;
    margin-top:10px;
    transition:0.3s;
}

.preview-box:hover{
    border-color:#ee4d2d;
    color:#ee4d2d;
}

/* SMALL CARD STYLE PREVIEW TEXT */
.preview h3{
    color:#333;
    margin-bottom:10px;
}

.preview p{
    font-size:13px;
    color:#666;
    margin-bottom:10px;
}

/* ANIMATIONS */
@keyframes fadeIn{
    from{opacity:0;}
    to{opacity:1;}
}

@keyframes slideUp{
    from{transform:translateY(30px); opacity:0;}
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
        <h2>✨ Create New Blog</h2>
        <p>Publish beautiful content for your store</p>
    </div>

    <div class="container">

        <!-- FORM -->
        <div class="card">

            <h2>✍️ Blog Editor</h2>

            <form method="POST">

                <div class="field">
                    <input type="text" name="title" placeholder="Enter blog title" required>
                </div>

                <div class="field">
                    <textarea name="content" rows="8" placeholder="Write your blog content..." required></textarea>
                </div>

                <div class="field">
                    <input type="text" name="image" placeholder="Image path (e.g. images/blog.jpg)" required>
                </div>

                <button type="submit">🚀 Publish Blog</button>

            </form>

        </div>

        <!-- PREVIEW -->
        <div class="preview">

            <h3>📄 Live Preview</h3>

            <p>Title will appear after save</p>
            <p>Content preview will be shown here</p>

            <div class="preview-box">
                🖼️ Blog Image Preview Area
            </div>

        </div>

    </div>

</div>

</body>
</html>