<?php

session_start();
include("db.php");

if(!isset($_SESSION['id']))
{
    header("Location: login.php");
    exit();
}

$farmer_id = $_SESSION['id'];

$total_products = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total
FROM products
WHERE farmer_id='$farmer_id'")
)['total'];

$total_orders = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT COUNT(*) total
FROM orders
INNER JOIN products
ON orders.product_id = products.id
WHERE products.farmer_id='$farmer_id'")
)['total'];

$total_sales = mysqli_fetch_assoc(
mysqli_query($conn,
"SELECT SUM(orders.total) sales
FROM orders
INNER JOIN products
ON orders.product_id = products.id
WHERE products.farmer_id='$farmer_id'")
)['sales'];

$total_sales = $total_sales ?? 0;

$report = mysqli_query($conn,

"SELECT
products.product_name,
SUM(orders.quantity) qty_sold,
SUM(orders.total) revenue

FROM orders

INNER JOIN products
ON orders.product_id = products.id

WHERE products.farmer_id='$farmer_id'

GROUP BY products.id

ORDER BY revenue DESC");

?>

<!DOCTYPE html>
<html>
<head>

<title>Farmer Dashboard</title>

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

header h1{
margin:0;
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
justify-content:center;
gap:20px;
flex-wrap:wrap;
margin-bottom:30px;
}

.card{
background:white;
width:260px;
padding:25px;
text-align:center;
border-radius:20px;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

.card h2{
margin:0;
color:#2E7D32;
font-size:32px;
}

.card p{
margin-top:10px;
font-weight:bold;
color:#555;
}

.report-title{
text-align:center;
color:#2E7D32;
margin-top:20px;
}

.report-table{
width:100%;
border-collapse:collapse;
background:white;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

.report-table th,
.report-table td{
padding:12px;
border:1px solid #ddd;
text-align:center;
}

.report-table th{
background:#2E7D32;
color:white;
}

.report-table tr:nth-child(even){
background:#f9f9f9;
}

.btn{
display:inline-block;
background:#F9A825;
color:white;
padding:10px 20px;
text-decoration:none;
border-radius:20px;
margin:10px;
}

.actions{
text-align:center;
margin-bottom:30px;
}

</style>

</head>

<body>

<header>

<a href="logout.php" class="logout">
Logout
</a>

<h1>Farmer Dashboard</h1>

<p>
Welcome
<?php echo htmlspecialchars($_SESSION['fullname']); ?>
</p>

</header>

<div class="container">

<div class="cards">

<div class="card">
<h2><?php echo $total_products; ?></h2>
<p>Total Products</p>
</div>

<div class="card">
<h2><?php echo $total_orders; ?></h2>
<p>Total Orders</p>
</div>

<div class="card">
<h2>TZS <?php echo number_format($total_sales,2); ?></h2>
<p>Total Revenue</p>
</div>

</div>

<div class="actions">

<a href="add_product.php" class="btn">
Add Product
</a>

<a href="my_products.php" class="btn">
My Products
</a>

<a href="messages.php" class="btn">
Messages
</a>

</div>

<h2 class="report-title">
Sales Report
</h2>

<table class="report-table">

<tr>
<th>Product Name</th>
<th>Quantity Sold</th>
<th>Revenue (TZS)</th>
</tr>

<?php

if(mysqli_num_rows($report)>0)
{
    while($row=mysqli_fetch_assoc($report))
    {
?>

<tr>

<td>
<?php echo htmlspecialchars($row['product_name']); ?>
</td>

<td>
<?php echo $row['qty_sold']; ?>
</td>

<td>
<?php echo number_format($row['revenue'],2); ?>
</td>

</tr>

<?php
    }
}
else
{
?>

<tr>
<td colspan="3">
No sales recorded yet.
</td>
</tr>

<?php
}
?>

</table>

</div>

</body>
</html>