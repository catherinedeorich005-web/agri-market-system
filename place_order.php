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
cart.product_id,
cart.quantity,
products.price,
products.quantity AS stock

FROM cart

INNER JOIN products
ON cart.product_id = products.id

WHERE cart.customer_id='$customer_id'

";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==0)
{
    die("Cart is empty.");
}

while($row=mysqli_fetch_assoc($result))
{
    $product_id = $row['product_id'];
    $qty = $row['quantity'];
    $price = $row['price'];
    $stock = $row['stock'];

    if($qty > $stock)
    {
        die("Insufficient stock.");
    }

    $total = $qty * $price;

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
        '$product_id',
        '$qty',
        '$total',
        'Pending'
    )");

    mysqli_query($conn,

    "UPDATE products

    SET quantity = quantity - $qty

    WHERE id='$product_id'");
}

mysqli_query($conn,

"DELETE FROM cart

WHERE customer_id='$customer_id'");

header("Location: orders.php");
exit();

?>