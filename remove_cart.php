
<?php

session_start();
include("db.php");

if($_SESSION['role']!="Customer")
{
    header("Location: login.php");
    exit();
}

$id=$_GET['id'];

mysqli_query($conn,

"DELETE FROM cart
WHERE id='$id'");

header("Location: cart.php");
exit();

?>
```
