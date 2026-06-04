
<?php

session_start();
include("db.php");

if(!isset($_SESSION['role']) || $_SESSION['role']!="Farmer")
{
    header("Location: login.php");
    exit();
}

$message="";

if(isset($_POST['save']))
{
    $product_name=mysqli_real_escape_string($conn,$_POST['product_name']);
    $description=mysqli_real_escape_string($conn,$_POST['description']);
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];

    $image="";

    if(isset($_FILES['image']) && $_FILES['image']['name']!="")
    {
        $image=time()."_".$_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "uploads/product_images/".$image
        );
    }

    $farmer_id=$_SESSION['id'];

    $sql="INSERT INTO products
    (
        farmer_id,
        product_name,
        description,
        price,
        quantity,
        image
    )

    VALUES
    (
        '$farmer_id',
        '$product_name',
        '$description',
        '$price',
        '$quantity',
        '$image'
    )";

    if(mysqli_query($conn,$sql))
    {
        $message="Product Added Successfully";
    }
    else
    {
        $message="Failed To Add Product";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>

<style>

body{
margin:0;
background:#f4f4f4;
font-family:Arial,sans-serif;
}

header{
background:#2E7D32;
color:white;
padding:20px;
text-align:center;
}

.form-box{
width:600px;
margin:30px auto;
background:white;
padding:30px;
border-radius:50px 10px 50px 10px;
box-shadow:0 0 15px rgba(0,0,0,0.2);
}

h2{
text-align:center;
color:#2E7D32;
}

input,
textarea{
width:100%;
padding:12px;
margin-top:10px;
border:1px solid #ccc;
border-radius:15px;
box-sizing:border-box;
}

textarea{
height:120px;
resize:none;
}

button{
width:100%;
padding:12px;
margin-top:15px;
background:#F9A825;
border:none;
color:white;
font-size:18px;
border-radius:15px;
cursor:pointer;
}

button:hover{
opacity:.9;
}

.success{
background:#d4edda;
padding:10px;
margin-bottom:15px;
color:green;
border-radius:10px;
text-align:center;
}

.back{
display:inline-block;
margin-top:15px;
color:#2E7D32;
text-decoration:none;
font-weight:bold;
}

</style>

</head>
<body>

<header>
<h1>Add Product</h1>
</header>

<div class="form-box">

<?php
if($message!="")
{
echo "<div class='success'>$message</div>";
}
?>

<h2>New Product</h2>

<form method="POST" enctype="multipart/form-data">

<input
type="text"
name="product_name"
placeholder="Product Name"
required>

<textarea
name="description"
placeholder="Product Description"
required></textarea>

<input
type="number"
name="price"
step="0.01"
placeholder="Price"
required>

<input
type="text"
name="quantity"
placeholder="Available Quantity"
required>

<input
type="file"
name="image"
required>

<button type="submit" name="save">
Save Product
</button>

</form>

<a class="back" href="farmer_dashboard.php">
← Back To Dashboard
</a>

</div>

</body>
</html>
```
