<?php

session_start();
include("db.php");

if(!isset($_SESSION['id']))
{
    header("Location: login.php");
    exit();
}

$customer_id = $_SESSION['id'];

$sql = "

SELECT
cart.id,
cart.product_id,
cart.quantity,
products.product_name,
products.price

FROM cart

INNER JOIN products
ON cart.product_id = products.id

WHERE cart.customer_id='$customer_id'

";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>Shopping Cart</title>

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
width:95%;
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
background:#2E7D32;
color:white;
padding:12px;
}

td{
padding:12px;
border:1px solid #ddd;
text-align:center;
}

tr:nth-child(even){
background:#f9f9f9;
}

.total-row{
font-weight:bold;
background:#f1f1f1;
}

.checkout-box{
background:white;
margin-top:20px;
padding:25px;
text-align:center;
border-radius:10px;
box-shadow:0 2px 8px rgba(0,0,0,0.15);
}

select{
padding:10px;
width:250px;
border:1px solid #ccc;
border-radius:5px;
}

.btn{
background:#F9A825;
color:white;
padding:12px 25px;
border:none;
border-radius:5px;
cursor:pointer;
font-size:16px;
margin-top:15px;
}

.btn:hover{
opacity:0.9;
}

.empty{
background:white;
padding:30px;
text-align:center;
border-radius:10px;
box-shadow:0 2px 8px rgba(0,0,0,0.15);
}

.action-btn{
text-decoration:none;
padding:6px 10px;
border-radius:4px;
color:white;
}

.remove{
background:red;
}

</style>

</head>
<body>

<header>

<h1>Shopping Cart</h1>

<p>
Welcome
<?php echo htmlspecialchars($_SESSION['fullname']); ?>
</p>

</header>

<div class="container">

<?php

if(mysqli_num_rows($result) > 0)
{

?>

<table>

<tr>
<th>Product</th>
<th>Price (TZS)</th>
<th>Quantity</th>
<th>Total (TZS)</th>
<th>Action</th>
</tr>

<?php

$grand = 0;

while($row=mysqli_fetch_assoc($result))
{
    $total = $row['price'] * $row['quantity'];
    $grand += $total;
?>

<tr>

<td>
<?php echo htmlspecialchars($row['product_name']); ?>
</td>

<td>
<?php echo number_format($row['price'],2); ?>
</td>

<td>
<?php echo $row['quantity']; ?>
</td>

<td>
<?php echo number_format($total,2); ?>
</td>

<td>

<a
class="action-btn remove"
href="remove_cart.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Remove this item from cart?');">
Remove
</a>

</td>

</tr>

<?php } ?>

<tr class="total-row">

<td colspan="3">
Grand Total
</td>

<td colspan="2">
TZS <?php echo number_format($grand,2); ?>
</td>

</tr>

</table>

<div class="checkout-box">

<form action="place_order.php" method="post">

<h3>Select Payment Method</h3>

<select name="payment_method" required>

<option value="">
Choose Payment Method
</option>

<option value="Cash on Delivery">
Cash on Delivery
</option>

<option value="M-Pesa">
M-Pesa
</option>

<option value="Airtel Money">
Airtel Money
</option>

<option value="Tigo Pesa">
Tigo Pesa
</option>

<option value="HaloPesa">
HaloPesa
</option>

<option value="Bank Transfer">
Bank Transfer
</option>

</select>

<br><br>

<button type="submit" class="btn">
Proceed to Checkout
</button>

</form>

</div>

<?php
}
else
{
?>

<div class="empty">

<h2>Your Cart Is Empty</h2>

<p>
Add products before checking out.
</p>

<a
href="products.php"
class="btn"
style="text-decoration:none;">
Browse Products
</a>

</div>

<?php
}
?>

</div>

</body>
</html>