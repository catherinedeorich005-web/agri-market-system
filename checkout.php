
<?php

session_start();
include("db.php");

if($_SESSION['role']!="Customer")
{
    header("Location: login.php");
    exit();
}

$customer_id=$_SESSION['id'];

$cart=mysqli_query($conn,
"SELECT *
FROM cart
JOIN products
ON cart.product_id=products.id
WHERE cart.customer_id='$customer_id'");

while($item=mysqli_fetch_assoc($cart))
{
    $total=
    $item['price']
    *
    $item['quantity'];

    mysqli_query($conn,

    "INSERT INTO orders
    (
    customer_id,
    product_id,
    quantity,
    total,
    status
    )

    VALUES
    (
    '$customer_id',
    '".$item['product_id']."',
    '".$item['quantity']."',
    '$total',
    'Pending'
    )");
}

mysqli_query($conn,
"DELETE FROM cart
WHERE customer_id='$customer_id'");

?>

<!DOCTYPE html>
<html>
<head>
<title>Order Success</title>

<style>

body{
background:#f4f4f4;
font-family:Arial;
}

.box{
width:500px;
margin:100px auto;
background:white;
padding:30px;
text-align:center;
border-radius:40px 10px 40px 10px;
box-shadow:0 4px 10px rgba(0,0,0,.2);
}

h1{
color:#2E7D32;
}

.btn{
display:inline-block;
background:#F9A825;
color:white;
padding:12px 20px;
text-decoration:none;
border-radius:20px;
}

</style>
</head>

<body>

<div class="box">

<h1>Order Placed Successfully</h1>

<p>
Your order has been submitted to the farmer.
</p>

<a href="orders.php" class="btn">
View Orders
</a>

</div>

</body>
</html>
```
