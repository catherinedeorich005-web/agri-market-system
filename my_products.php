
<?php

session_start();
include("db.php");

if($_SESSION['role']!="Farmer")
{
    header("Location: login.php");
    exit();
}

$farmer_id=$_SESSION['id'];

$sql=mysqli_query($conn,
"SELECT * FROM products
WHERE farmer_id='$farmer_id'
ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>My Products</title>

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

.products{
display:flex;
flex-wrap:wrap;
justify-content:center;
padding:20px;
}

.product{
background:white;
width:300px;
margin:15px;
padding:20px;
text-align:center;
border-radius:40px 10px 40px 10px;
box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

.product img{
width:100%;
height:220px;
object-fit:cover;
border-radius:15px;
}

.price{
color:#F9A825;
font-size:22px;
font-weight:bold;
}

.qty{
color:#2E7D32;
font-weight:bold;
}

.btn{
display:inline-block;
background:#F9A825;
color:white;
padding:8px 18px;
text-decoration:none;
border-radius:15px;
margin-top:10px;
}

</style>

</head>

<body>

<header>
<h1>My Products</h1>
</header>

<div class="products">

<?php

while($row=mysqli_fetch_assoc($sql))
{

?>

<div class="product">

<img src="uploads/product_images/<?php echo $row['image']; ?>">

<h3><?php echo $row['product_name']; ?></h3>

<p><?php echo $row['description']; ?></p>

<p class="price">
$<?php echo $row['price']; ?>
</p>

<p class="qty">
Stock: <?php echo $row['quantity']; ?>
</p>

</div>

<?php

}

?>

</div>

</body>
</html>
```
