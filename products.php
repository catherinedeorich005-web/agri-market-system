<?php
session_start();
include("db.php");

if(!isset($_SESSION['id']))
{
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn,"SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>Products</title>

<style>
body{
font-family:Arial;
background:#f5f5f5;
margin:0;
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
padding:20px;
}

.product{
background:white;
padding:20px;
margin-bottom:15px;
border-radius:10px;
box-shadow:0 2px 8px rgba(0,0,0,0.15);
}

.btn{
background:#F9A825;
color:white;
padding:10px 15px;
text-decoration:none;
border-radius:5px;
}
</style>

</head>
<body>

<header>
<h1>Available Products</h1>
</header>

<div class="container">

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div class="product">

<h3><?php echo htmlspecialchars($row['product_name']); ?></h3>

<p><?php echo htmlspecialchars($row['description']); ?></p>

<p>Price: TZS <?php echo number_format($row['price'],2); ?></p>

<p>Available: <?php echo $row['quantity']; ?></p>

<a class="btn"
href="add_to_cart.php?id=<?php echo $row['id']; ?>">
Add To Cart
</a>

</div>

<?php } ?>

</div>

</body>
</html>