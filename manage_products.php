<?php

session_start();
include("db.php");

if(!isset($_SESSION['role']) || $_SESSION['role']!="Admin")
{
    header("Location: login.php");
    exit();
}

if(isset($_GET['delete']))
{
    $id = (int)$_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM products
    WHERE id='$id'");
}

$products = mysqli_query($conn,

"SELECT products.*,
users.fullname

FROM products

JOIN users
ON products.farmer_id = users.id

ORDER BY products.id DESC");

?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Products</title>

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
width:98%;
margin:20px auto;
border-collapse:collapse;
background:white;
box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

th{
background:#F9A825;
color:white;
padding:15px;
}

td{
padding:10px;
border:1px solid #ddd;
text-align:center;
}

tr:nth-child(even){
background:#f9f9f9;
}

img{
width:80px;
height:80px;
object-fit:cover;
border-radius:10px;
}

.btn{
background:red;
color:white;
padding:8px 15px;
border-radius:10px;
text-decoration:none;
}

.btn:hover{
opacity:0.8;
}

.price{
font-weight:bold;
color:#2E7D32;
}

</style>
</head>

<body>

<header>
<h1>Manage Products</h1>
</header>

<table>

<tr>

<th>ID</th>
<th>Image</th>
<th>Product</th>
<th>Farmer</th>
<th>Price (TZS)</th>
<th>Quantity</th>
<th>Date Added</th>
<th>Action</th>

</tr>

<?php while($row=mysqli_fetch_assoc($products)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>
<img src="uploads/product_images/<?php echo htmlspecialchars($row['image']); ?>">
</td>

<td>
<?php echo htmlspecialchars($row['product_name']); ?>
</td>

<td>
<?php echo htmlspecialchars($row['fullname']); ?>
</td>

<td class="price">
TZS <?php echo number_format($row['price'],2); ?>
</td>

<td>
<?php echo $row['quantity']; ?>
</td>

<td>
<?php echo $row['date_added']; ?>
</td>

<td>

<a class="btn"
href="?delete=<?php echo $row['id']; ?>"
onclick="return confirm('Delete Product?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>