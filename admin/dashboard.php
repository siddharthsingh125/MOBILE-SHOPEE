<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
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
    transition:0.4s ease;
    overflow:hidden;
}

/* COLLAPSED SIDEBAR */
.sidebar.small{
    width:70px;
}

/* LOGO */
.logo{
    font-size:22px;
    font-weight:bold;
    margin-bottom:20px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.toggle-btn{
    cursor:pointer;
    font-size:20px;
}

/* MENU LINKS */
.menu a{
    display:flex;
    align-items:center;
    gap:10px;
    color:white;
    text-decoration:none;
    padding:12px;
    border-radius:8px;
    margin:8px 0;
    transition:0.3s;
}

.menu a:hover{
    background:rgba(255,255,255,0.2);
}

/* hide text when small */
.sidebar.small .text{
    display:none;
}

/* MAIN */
.main{
    margin-left:240px;
    padding:20px;
    transition:0.4s ease;
}

.main.small{
    margin-left:70px;
}

/* TOP BAR */
.topbar{
    background:white;
    padding:15px;
    border-radius:10px;
    display:flex;
    justify-content:space-between;
    animation:fadeIn 0.6s ease;
}

/* KPI CARDS */
.kpi-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:15px;
    margin-top:20px;
}

.kpi{
    background:white;
    padding:15px;
    border-radius:12px;
    box-shadow:0 3px 10px rgba(0,0,0,0.08);
    animation:slideUp 0.6s ease;
    transition:0.3s;
}

.kpi:hover{
    transform:translateY(-5px);
}

.kpi h3{
    font-size:14px;
    color:#777;
}

.kpi .value{
    font-size:22px;
    font-weight:bold;
    margin-top:5px;
}

.kpi .percent{
    font-size:12px;
    color:green;
}

/* GRID */
.grid{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:20px;
    margin-top:20px;
}

/* CARD */
.card{
    background:white;
    padding:20px;
    border-radius:12px;
    box-shadow:0 3px 10px rgba(0,0,0,0.08);
    animation:fadeIn 0.7s ease;
}

/* BAR GRAPH */
.bar-container{
    display:flex;
    align-items:flex-end;
    gap:10px;
    height:180px;
}

.bar{
    width:18%;
    background:#ee4d2d;
    border-radius:6px 6px 0 0;
    animation:grow 1s ease;
}

/* PIE */
.pie{
    width:160px;
    height:160px;
    border-radius:50%;
    background:conic-gradient(#ee4d2d 0% 40%, #4caf50 40% 75%, #2196f3 75% 100%);
    margin:auto;
    animation:rotateIn 1s ease;
}

/* QUICK ACTIONS */
button,
button > a{
    width:100%;
    margin:6px 0;
    border:none;
    border-radius:8px;
    background:#ee4d2d;
    color:white;
    cursor:pointer;
    transition:0.3s;
}

button > a {
    display: flex;
    justify-content: center;
    align-items: center;
    padding:10px !important;
    text-decoration: unset;
}

button:hover,
button > a:hover{
    background:#d63f22;
    transform:scale(1.03);
}

/* RECENT ACTIVITY */
.activity p{
    padding:8px;
    border-bottom:1px solid #eee;
    font-size:14px;
    animation:fadeIn 0.6s ease;
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

@keyframes grow{
    from{height:0;}
    to{}
}

@keyframes rotateIn{
    from{transform:rotate(-90deg);}
    to{transform:rotate(0);}
}

</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">

    <div class="logo">
        <span>🛍️</span>
        <span class="toggle-btn" onclick="toggleMenu()">☰</span>
    </div>

    <div class="menu">
        <a href="#"><span>🏠</span><span class="text">Dashboard</span></a>
        <a href="http://localhost/Mobile_Shopee-E-Commerce-Website/admin/products.php"><span>📦</span><span class="text">Products</span></a>
        <a href="http://localhost/Mobile_Shopee-E-Commerce-Website/admin/blogs.php"><span>📝</span><span class="text">Blogs</span></a>
        <a href="#"><span>🛒</span><span class="text">Orders</span></a>
        <a href="profile.php"><span>👤</span><span class="text">Profile</span></a>
    </div>

</div>

<!-- MAIN -->
<div class="main" id="main">

    <div class="topbar">
        <h2>Dashboard Overview</h2>
        <span>Welcome Admin</span>
    </div>

    <!-- KPI TOP CARDS -->
    <div class="kpi-grid">

    <div class="kpi">
        <h3>Products</h3>
        <div class="value">1,240</div>
        <div class="percent">+20%</div>
    </div>

    <div class="kpi">
        <h3>Orders</h3>
        <div class="value">320</div>
        <div class="percent">+15%</div>
    </div>

    <div class="kpi">
        <h3>Revenue</h3>
        <div class="value">_ _ _</div>
        <div class="percent">+12%</div>
    </div>

    <div class="kpi">
        <h3>Customers</h3>
        <div class="value">880</div>
        <div class="percent">+18%</div>
    </div>

</div>

    <!-- MAIN SECTION -->
    <div class="grid">

        <!-- BUYING PERFORMANCE -->
        <div class="card">
            <h3>Buying Performance</h3>
            <div class="bar-container">
                <div class="bar" style="height:50%"></div>
                <div class="bar" style="height:80%"></div>
                <div class="bar" style="height:40%"></div>
                <div class="bar" style="height:90%"></div>
                <div class="bar" style="height:60%"></div>
            </div>
        </div>

        <!-- COLLECTION STATUS -->
        <div class="card">
            <h3>Collection Status</h3>
            <div class="pie"></div>
        </div>

        <!-- QUICK ACTIONS -->
        <div class="card">
            <h3>Quick Actions</h3>
            <button><a href="http://localhost/Mobile_Shopee-E-Commerce-Website/admin/add-product.php">Add Product</a></button>
            <button><a href="http://localhost/Mobile_Shopee-E-Commerce-Website/admin/add-blog.php">Add Blog</a></button>
            <button><a>View Orders</a></button>
            <button><a>Manage Users</a></button>
        </div>

        <!-- RECENT ACTIVITY -->
        <div class="card activity">
            <h3>Recent Activity</h3>
            <p>🛒 New order placed</p>
            <p>📦 Product added</p>
            <p>👤 New user registered</p>
            <p>💰 Payment received</p>
        </div>

    </div>

</div>

<script>
function toggleMenu(){
    document.getElementById("sidebar").classList.toggle("small");
    document.getElementById("main").classList.toggle("small");
}
</script>

</body>
</html>