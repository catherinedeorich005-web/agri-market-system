<?php
session_start();

if(!isset($_SESSION['user_id']))
{
    if($user['role']=="Farmer") { header("Location: farmer_dashboard.php"); exit(); } elseif($user['role']=="Customer") { header("Location: customer_dashboard.php"); exit(); } elseif($user['role']=="Admin") { header("Location: admin_dashboard.php"); exit(); }
header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<style>

body{
background:#F5F5DC;
font-family:Arial;
}

.dashboard{
width:80%;
margin:auto;
}

h1{
text-align:center;
color:#2E7D32;
}

.card{
background:white;
padding:30px;
margin:20px;
border-radius:40px 10px 40px 10px;
box-shadow:0 0 10px gray;
text-align:center;
}

a{
text-decoration:none;
color:#2E7D32;
font-weight:bold;
}

</style>

</head>

<body>

<h1>
Welcome <?php echo $_SESSION['fullname']; ?>
</h1>

<div class="dashboard">

<div class="card">
<a href="products.php">View Products</a>
</div>

<div class="card">
<a href="orders.php">My Orders</a>
</div>

<div class="card">
<a href="profile.php">Profile</a>
</div>

<div class="card">
<a href="logout.php">Logout</a>
</div>

</div>

</body>
</html>