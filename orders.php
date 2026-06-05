
<?php

session_start();
include("db.php");

if($_SESSION['role']!="Customer")
{
    header("Location: login.php");
    exit();
}

$customer_id=$_SESSION['id'];

$sql=mysqli_query($conn,

"SELECT orders.*,
products.product_name,
products.image

FROM orders

JOIN products
ON orders.product_id=products.id

WHERE orders.customer_id='$customer_id'

ORDER BY orders.id DESC");

?>

<!DOCTYPE html>
<html>
<head>
<title>My Orders</title>

<style>

body{
margin:0;
font-family:Arial,sans-serif;
background:#f4f4f4;
}

header{
background:#2E7D32;
color:white;
padding:20px;
text-align:center;
}

table{
width:95%;
margin:20px auto;
border-collapse:collapse;
background:white;
}

th{
background:#F9A825;
color:white;
padding:15px;
}

td{
padding:15px;
border:1px solid #ddd;
text-align:center;
}

img{
width:80px;
height:80px;
object-fit:cover;
border-radius:10px;
}

.status{
font-weight:bold;
color:#2E7D32;
}

</style>

</head>

<body>

<header>
<h1>My Orders</h1>
</header>

<table>

<tr>
<th>Image</th>
<th>Product</th>
<th>Quantity</th>
<th>Total</th>
<th>Status</th>
<th>Date</th>
</tr>

<?php while($row=mysqli_fetch_assoc($sql)){ ?>

<tr>

<td>
<img src="uploads/product_images/<?php echo $row['image']; ?>">
</td>

<td><?php echo $row['product_name']; ?></td>

<td><?php echo $row['quantity']; ?></td>

<td>$<?php echo $row['total']; ?></td>

<td class="status">
<?php echo $row['status']; ?>
</td>

<td>
<?php echo $row['order_date']; ?>
</td>

</tr>

<?php } ?>

</table>

</body>
</html>
```
