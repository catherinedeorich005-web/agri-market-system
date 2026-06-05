
<?php

session_start();
include("db.php");

if($_SESSION['role']!="Farmer")
{
    header("Location: login.php");
    exit();
}

$farmer_id=$_SESSION['id'];

if(isset($_POST['update']))
{
    $order_id=$_POST['order_id'];
    $status=$_POST['status'];

    mysqli_query($conn,

    "UPDATE orders
    SET status='$status'
    WHERE id='$order_id'");
}

$sql=mysqli_query($conn,

"SELECT orders.*,
products.product_name,
users.fullname

FROM orders

JOIN products
ON orders.product_id=products.id

JOIN users
ON orders.customer_id=users.id

WHERE products.farmer_id='$farmer_id'

ORDER BY orders.id DESC");

?>

<!DOCTYPE html>
<html>
<head>
<title>Farmer Orders</title>

<style>

body{
margin:0;
background:#f4f4f4;
font-family:Arial;
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
background:white;
border-collapse:collapse;
}

th{
background:#F9A825;
color:white;
padding:15px;
}

td{
padding:12px;
border:1px solid #ddd;
text-align:center;
}

select{
padding:8px;
border-radius:10px;
}

button{
background:#2E7D32;
color:white;
border:none;
padding:8px 15px;
border-radius:10px;
cursor:pointer;
}

</style>

</head>

<body>

<header>
<h1>Customer Orders</h1>
</header>

<table>

<tr>

<th>Customer</th>
<th>Product</th>
<th>Quantity</th>
<th>Total</th>
<th>Status</th>
<th>Action</th>

</tr>

<?php while($row=mysqli_fetch_assoc($sql)){ ?>

<tr>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['product_name']; ?></td>

<td><?php echo $row['quantity']; ?></td>

<td>$<?php echo $row['total']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>

<form method="POST">

<input
type="hidden"
name="order_id"
value="<?php echo $row['id']; ?>">

<select name="status">

<option>Pending</option>
<option>Processing</option>
<option>Delivered</option>
<option>Cancelled</option>

</select>

<button name="update">
Update
</button>

</form>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>
```
