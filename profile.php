<?php

session_start();
include("db.php");

$id=$_SESSION['user_id'];

$sql=mysqli_query($conn,
"SELECT * FROM users WHERE id='$id'");

$user=mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>
<head>

<style>

body{
background:#F5F5DC;
font-family:Arial;
}

.card{
width:500px;
margin:50px auto;
background:white;
padding:30px;
border-radius:40px 10px 40px 10px;
box-shadow:0 0 10px gray;
}

h1{
text-align:center;
color:#2E7D32;
}

p{
font-size:18px;
}

</style>

</head>

<body>

<div class="card">

<h1>My Profile</h1>

<p><b>Name:</b> <?php echo $user['fullname']; ?></p>

<p><b>Email:</b> <?php echo $user['email']; ?></p>

<p><b>Phone:</b> <?php echo $user['phone']; ?></p>

<p><b>Role:</b> <?php echo $user['role']; ?></p>

</div>

</body>
</html>