<?php

session_start();
include("db.php");

if(!isset($_SESSION['role']) || $_SESSION['role']!="Admin")
{
    header("Location: login.php");
    exit();
}

$total_users = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total FROM users")
)['total'];

$total_products = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total FROM products")
)['total'];

$total_orders = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total FROM orders")
)['total'];

$total_revenue = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT SUM(total) revenue FROM orders")
)['revenue'];

$total_revenue = $total_revenue ?? 0;

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>

body{
margin:0;
font-family:Arial,sans-serif;
background:#f5f5f5;
}

header{
background:#2E7D32;
color:white;
padding:20px;
text-align:center;
}

.container{
width:90%;
margin:auto;
padding:30px;
}

.cards{
display:flex;
flex-wrap:wrap;
justify-content:center;
}

.card{
width:260px;
background:white;
margin:15px;
padding:25px;
text-align:center;
border-radius:20px;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

.card h2{
color:#2E7D32;
margin:0;
font-size:32px;
}

.card h3{
color:#444;
}

.btn{
display:inline-block;
background:#F9A825;
color:white;
padding:10px 20px;
text-decoration:none;
border-radius:20px;
}

.actions{
text-align:center;
margin-top:20px;
}

</style>
</head>

<body>

<header>

<h1>Administrator Dashboard</h1>

<p>
Welcome <?php echo htmlspecialchars($_SESSION['fullname']); ?>
</p>

<a style="color:white;" href="logout.php">
Logout
</a>

</header>

<div class="container">

<div class="cards">

<div class="card">
<h2><?php echo $total_users; ?></h2>
<h3>Total Users</h3>
</div>

<div class="card">
<h2><?php echo $total_products; ?></h2>
<h3>Total Products</h3>
</div>

<div class="card">
<h2><?php echo $total_orders; ?></h2>
<h3>Total Orders</h3>
</div>

<div class="card">
<h2>TZS <?php echo number_format($total_revenue,2); ?></h2>
<h3>Total Revenue</h3>
</div>

</div>

<div class="actions">

<a href="manage_users.php" class="btn">
Manage Users
</a>

<a href="manage_products.php" class="btn">
Manage Products
</a>

<a href="manage_orders.php" class="btn">
Manage Orders
</a>

</div>

</div>

</body>
</html>