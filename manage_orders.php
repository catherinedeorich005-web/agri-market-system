<?php

session_start();
include("db.php");

if(!isset($_SESSION['role']) || $_SESSION['role']!="Admin")
{
    header("Location: login.php");
    exit();
}

if(isset($_POST['update']))
{
    $id = (int)$_POST['order_id'];
    $status = mysqli_real_escape_string($conn,$_POST['status']);

    mysqli_query($conn,

    "UPDATE orders
    SET status='$status'
    WHERE id='$id'");
}

$orders = mysqli_query($conn,

"SELECT
orders.*,
users.fullname,
products.product_name

FROM orders

INNER JOIN users
ON orders.customer_id = users.id

INNER JOIN products
ON orders.product_id = products.id

ORDER BY orders.id DESC");

?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Orders</title>

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

.container{
width:98%;
margin:auto;
padding:20px;
}

table{
width:100%;
background:white;
border-collapse:collapse;
box-shadow:0 4px 10px rgba(0,0,0,0.15);
}

th{
background:#F9A825;
color:white;
padding:15px;
}

td{
padding:12px;
text-align:center;
border:1px solid #ddd;
}

tr:nth-child(even){
background:#f9f9f9;
}

tr:hover{
background:#f1f1f1;
}

select{
padding:8px;
border-radius:8px;
border:1px solid #ccc;
}

button{
background:#2E7D32;
color:white;
border:none;
padding:8px 15px;
border-radius:8px;
cursor:pointer;
}

button:hover{
opacity:0.9;
}

.status-pending{
color:#F9A825;
font-weight:bold;
}

.status-processing{
color:#2196F3;
font-weight:bold;
}

.status-delivered{
color:#2E7D32;
font-weight:bold;
}

.status-cancelled{
color:red;
font-weight:bold;
}

.currency{
font-weight:bold;
color:#2E7D32;
}

.logout{
color:white;
text-decoration:none;
font-weight:bold;
}

</style>

</head>

<body>

<header>

<h1>Manage Orders</h1>

<p>
Welcome
<?php echo htmlspecialchars($_SESSION['fullname']); ?>
</p>

<a href="logout.php" class="logout">
Logout
</a>

</header>

<div class="container">

<table>

<tr>

<th>ID</th>
<th>Customer</th>
<th>Product</th>
<th>Quantity</th>
<th>Total (TZS)</th>
<th>Status</th>
<th>Order Date</th>
<th>Update Status</th>

</tr>

<?php while($row=mysqli_fetch_assoc($orders)){ ?>

<tr>

<td>
<?php echo $row['id']; ?>
</td>

<td>
<?php echo htmlspecialchars($row['fullname']); ?>
</td>

<td>
<?php echo htmlspecialchars($row['product_name']); ?>
</td>

<td>
<?php echo $row['quantity']; ?>
</td>

<td class="currency">
TZS <?php echo number_format($row['total'],2); ?>
</td>

<td>

<?php

$status = strtolower($row['status']);

if($status=="pending")
{
    echo "<span class='status-pending'>Pending</span>";
}
elseif($status=="processing")
{
    echo "<span class='status-processing'>Processing</span>";
}
elseif($status=="delivered")
{
    echo "<span class='status-delivered'>Delivered</span>";
}
elseif($status=="cancelled")
{
    echo "<span class='status-cancelled'>Cancelled</span>";
}
else
{
    echo htmlspecialchars($row['status']);
}

?>

</td>

<td>
<?php echo $row['order_date']; ?>
</td>

<td>

<form method="POST">

<input
type="hidden"
name="order_id"
value="<?php echo $row['id']; ?>">

<select name="status">

<option value="Pending"
<?php if($row['status']=="Pending") echo "selected"; ?>>
Pending
</option>

<option value="Processing"
<?php if($row['status']=="Processing") echo "selected"; ?>>
Processing
</option>

<option value="Delivered"
<?php if($row['status']=="Delivered") echo "selected"; ?>>
Delivered
</option>

<option value="Cancelled"
<?php if($row['status']=="Cancelled") echo "selected"; ?>>
Cancelled
</option>

</select>

<button type="submit" name="update">
Save
</button>

</form>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>