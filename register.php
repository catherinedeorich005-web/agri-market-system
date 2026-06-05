<?php

include("db.php");

$message="";

if(isset($_POST['register']))
{
    $fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $role=mysqli_real_escape_string($conn,$_POST['role']);

    $password=password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $check=mysqli_query($conn,
    "SELECT * FROM users
    WHERE email='$email'");

    if(mysqli_num_rows($check)>0)
    {
        $message="Email already exists";
    }
    else
    {
        $sql="INSERT INTO users
        (
            fullname,
            email,
            phone,
            role,
            password
        )

        VALUES
        (
            '$fullname',
            '$email',
            '$phone',
            '$role',
            '$password'
        )";

        if(mysqli_query($conn,$sql))
        {
            header("Location: login.php");
            exit();
        }
        else
        {
            $message="Registration Failed";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<style>

body{
background:#f4f4f4;
font-family:Arial,sans-serif;
margin:0;
}

.form-box{
width:500px;
margin:50px auto;
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
select{
width:100%;
padding:12px;
margin-top:10px;
border:1px solid #ccc;
border-radius:15px;
box-sizing:border-box;
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
opacity:0.9;
}

.message{
text-align:center;
padding:10px;
margin-bottom:15px;
background:#ffe5e5;
color:red;
border-radius:10px;
}

.link{
text-align:center;
margin-top:15px;
}

.link a{
color:#2E7D32;
text-decoration:none;
font-weight:bold;
}

</style>
</head>

<body>

<div class="form-box">

<h2>Create Account</h2>

<?php
if($message!="")
{
    echo "<div class='message'>$message</div>";
}
?>

<form method="POST">

<input
type="text"
name="fullname"
placeholder="Full Name"
required>

<input
type="email"
name="email"
placeholder="Email Address"
required>

<input
type="text"
name="phone"
placeholder="Phone Number"
required>

<select name="role" required>

<option value="">Select Role</option>
<option value="Farmer">Farmer</option>
<option value="Customer">Customer</option>

</select>

<input
type="password"
name="password"
placeholder="Password"
required>

<button type="submit" name="register">
Register
</button>

</form>

<div class="link">
<a href="login.php">
Already have an account? Login
</a>
</div>

</div>

</body>
</html>
