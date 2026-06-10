<?php
require_once('../functions.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Profile</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI", sans-serif;
}

body{
    background: linear-gradient(135deg,#f5f6fa,#e9eef7);
}

/* SIDEBAR */
.sidebar{
    position:fixed;
    width:240px;
    height:100vh;
    background: linear-gradient(180deg,#ee4d2d,#ff6a3d);
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

/* TOP HEADER */
.header{
    background:rgba(255,255,255,0.75);
    backdrop-filter: blur(12px);
    padding:20px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    display:flex;
    justify-content:space-between;
    align-items:center;
    animation:fadeIn 0.5s ease;
}

/* PROFILE TOP */
.profile-top{
    display:flex;
    align-items:center;
    gap:15px;
}

.avatar{
    width:70px;
    height:70px;
    border-radius:50%;
    background:#ee4d2d;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:28px;
    font-weight:bold;
}

.profile-info h2{
    margin-bottom:3px;
}

.profile-info p{
    color:#666;
    font-size:14px;
}

/* SECTION GRID */
.grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
    margin-top:20px;
}

/* CARD */
.card{
    background:rgba(255,255,255,0.75);
    backdrop-filter: blur(12px);
    padding:25px;
    border-radius:18px;
    box-shadow:0 15px 35px rgba(0,0,0,0.1);
    animation:slideUp 0.6s ease;
}

/* SECTION TITLE */
h3{
    color:#ee4d2d;
    margin-bottom:15px;
}

/* INPUT */
label{
    font-size:13px;
    color:#444;
}

input, textarea{
    width:100%;
    padding:12px;
    margin-top:5px;
    margin-bottom:15px;
    border-radius:10px;
    border:1px solid #ddd;
    outline:none;
    transition:0.3s;
    background:white;
}

input:focus, textarea:focus{
    border-color:#ee4d2d;
    box-shadow:0 0 10px rgba(238,77,45,0.2);
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:linear-gradient(90deg,#ee4d2d,#ff6a3d);
    color:white;
    font-size:15px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:translateY(-3px);
}

/* INFO BLOCK */
.info-box{
    background:white;
    padding:12px;
    border-radius:10px;
    margin-bottom:10px;
    box-shadow:0 5px 12px rgba(0,0,0,0.05);
    font-size:14px;
}

.info-title{
    font-size:12px;
    color:#888;
}

/* ANIMATIONS */
@keyframes fadeIn{
    from{opacity:0;}
    to{opacity:1;}
}

@keyframes slideUp{
    from{opacity:0; transform:translateY(30px);}
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
    <a href="add-blog.php">➕ Add Blog</a>
    <a href="profile.php">👤 Profile</a>
</div>

<!-- MAIN -->
<div class="main">

    <!-- HEADER -->
    <div class="header">

        <div class="profile-top">
            <div class="avatar">K</div>

            <div class="profile-info">
                <h2>Kumar</h2>
                <p>Administrator</p>
                <p>Joined: Jan 2026</p>
            </div>
        </div>

    </div>

    <!-- GRID -->
    <div class="grid">

        <!-- PERSONAL DETAILS -->
        <div class="card">

            <h3>Personal Details</h3>

            <form>

                <label>Username</label>
                <input type="text" value="admin_kumar">

                <label>Email Address</label>
                <input type="email" value="kumar.admin@sms.com">

                <label>First Name</label>
                <input type="text" value="Kumar">

                <label>Last Name</label>
                <input type="text" value="Admin">

                <label>Phone Number (Contact)</label>
                <input type="text" value="+91 9876543210">

                <label>Gender</label>
                <input type="text" value="Male">

                <label>Date of Birth</label>
                <input type="text" value="15 Aug 1995">

                <label>Address</label>
                <textarea rows="3">123, Tech Park Avenue, Sector 62, Noida, Uttar Pradesh</textarea>

                <button>Update Details</button>

            </form>

        </div>

        <!-- PASSWORD SECTION -->
        <div class="card">

            <h3>Change Password</h3>

            <form>

                <label>Current Password</label>
                <input type="password" placeholder="Enter current password">

                <label>New Password</label>
                <input type="password" placeholder="Enter new password">

                <label>Confirm Password</label>
                <input type="password" placeholder="Confirm new password">

                <button>Update Password</button>

            </form>

        </div>

    </div>

</div>

</body>
</html>