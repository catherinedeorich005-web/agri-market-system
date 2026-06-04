<?php

session_start();
include("db.php");

if(!isset($_SESSION['id']))
{
    header("Location: login.php");
    exit();
}

$customer_id = $_SESSION['id'];

$total_orders = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total
FROM orders
WHERE customer_id='$customer_id'")
)['total'];

$total_spent = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT SUM(total) amount
FROM orders
WHERE customer_id='$customer_id'")
)['amount'];

$total_cart = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total
FROM cart
WHERE customer_id='$customer_id'")
)['total'];

$pending_orders = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total
FROM orders
WHERE customer_id='$customer_id'
AND status='Pending'")
)['total'];

$total_spent = $total_spent ?? 0;

$recent_orders = mysqli_query($conn,

"SELECT
orders.*,
products.product_name

FROM orders

INNER JOIN products
ON orders.product_id = products.id

WHERE orders.customer_id='$customer_id'

ORDER BY orders.order_date DESC

LIMIT 10");
?>

<!DOCTYPE html>
<html>
<head>
<title>Customer Dashboard</title>

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

.logout{
float:right;
color:white;
text-decoration:none;
font-weight:bold;
}

.container{
width:95%;
margin:auto;
padding:20px;
}

.cards{
display:flex;
flex-wrap:wrap;
justify-content:center;
gap:20px;
margin-bottom:30px;
}

.card{
background:white;
width:250px;
padding:20px;
text-align:center;
border-radius:20px;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

.card h2{
color:#2E7D32;
margin:0;
}

.card p{
font-weight:bold;
color:#555;
}

.actions{
text-align:center;
margin-bottom:30px;
}

.btn{
display:inline-block;
background:#F9A825;
color:white;
padding:12px 20px;
margin:10px;
text-decoration:none;
border-radius:20px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

th,td{
padding:12px;
border:1px solid #ddd;
text-align:center;
}

th{
background:#2E7D32;
color:white;
}

h2{
text-align:center;
color:#2E7D32;
}

</style>

</head>

<body>

<header>

<a href="logout.php" class="logout">
Logout
</a>

<h1>Customer Dashboard</h1>

<p>
Welcome
<?php echo htmlspecialchars($_SESSION['fullname']); ?>
</p>

</header>

<div class="container">

<div class="cards">

<div class="card">
<h2><?php echo $total_orders; ?></h2>
<p>Total Orders</p>
</div>

<div class="card">
<h2>TZS <?php echo number_format($total_spent,2); ?></h2>
<p>Total Spending</p>
</div>

<div class="card">
<h2><?php echo $total_cart; ?></h2>
<p>Items in Cart</p>
</div>

<div class="card">
<h2><?php echo $pending_orders; ?></h2>
<p>Pending Orders</p>
</div>

</div>

<div class="actions">

<a href="products.php" class="btn">
Browse Products
</a>

<a href="cart.php" class="btn">
My Cart
</a>

<a href="orders.php" class="btn">
My Orders
</a>

</div>

<h2>Recent Orders</h2>

<table>

<tr>
<th>Product</th>
<th>Quantity</th>
<th>Total</th>
<th>Status</th>
<th>Date</th>
</tr>

<?php

if(mysqli_num_rows($recent_orders)>0)
{
    while($row=mysqli_fetch_assoc($recent_orders))
    {
?>

<tr>

<td><?php echo htmlspecialchars($row['product_name']); ?></td>

<td><?php echo $row['quantity']; ?></td>

<td><?php echo number_format($row['total'],2); ?></td>

<td><?php echo htmlspecialchars($row['status']); ?></td>

<td><?php echo $row['order_date']; ?></td>

</tr>

<?php
    }
}
else
{
?>

<tr>
<td colspan="5">
No orders found.
</td>
</tr>

<?php
}
?>

</table>

</div>

</body>
</html>