
<?php

session_start();
include("db.php");

if($_SESSION['role']!="Admin")
{
    header("Location: login.php");
    exit();
}

if(isset($_GET['delete']))
{
    $id=$_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM users
    WHERE id='$id'");
}

$users=mysqli_query($conn,
"SELECT * FROM users
ORDER BY id DESC");

?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Users</title>

<style>

body{
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
margin:auto;
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

.delete{
background:red;
color:white;
padding:8px 15px;
text-decoration:none;
border-radius:10px;
}

</style>

</head>

<body>

<header>
<h1>Manage Users</h1>
</header>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Role</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($users)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['fullname']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['role']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>

<a
class="delete"
href="?delete=<?php echo $row['id']; ?>">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>
```
