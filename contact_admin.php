
<?php

session_start();
include("db.php");

if($_SESSION['role']!="Customer")
{
    header("Location: login.php");
    exit();
}

$message="";

if(isset($_POST['send']))
{
    $sender=$_SESSION['id'];

    $receiver=1;

    $msg=mysqli_real_escape_string(
    $conn,
    $_POST['message']
    );

    mysqli_query($conn,

    "INSERT INTO messages
    (
    sender_id,
    receiver_id,
    message
    )

    VALUES
    (
    '$sender',
    '$receiver',
    '$msg'
    )");

    $message="Message Sent";
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Contact Admin</title>

<style>

body{
background:#f4f4f4;
font-family:Arial;
}

.box{
width:600px;
margin:50px auto;
background:white;
padding:30px;
border-radius:40px 10px 40px 10px;
box-shadow:0 4px 10px rgba(0,0,0,.2);
}

h2{
text-align:center;
color:#2E7D32;
}

textarea{
width:100%;
height:150px;
padding:10px;
border-radius:15px;
border:1px solid #ccc;
}

button{
width:100%;
padding:12px;
margin-top:15px;
background:#F9A825;
color:white;
border:none;
border-radius:15px;
font-size:18px;
}

.success{
background:#d4edda;
padding:10px;
text-align:center;
color:green;
margin-bottom:15px;
}

</style>

</head>

<body>

<div class="box">

<h2>Send Message To Admin</h2>

<?php

if($message!="")
{
echo "<div class='success'>$message</div>";
}

?>

<form method="POST">

<textarea
name="message"
placeholder="Type your message..."
required></textarea>

<button name="send">
Send Message
</button>

</form>

</div>

</body>
</html>
```
