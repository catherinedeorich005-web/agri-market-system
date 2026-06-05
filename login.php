<?php

session_start();
include("db.php");

$error="";

if(isset($_POST['login']))
{
    $email=mysqli_real_escape_string(
        $conn,
        $_POST['email']
    );

    $password=$_POST['password'];

    $query=mysqli_query($conn,
    "SELECT * FROM users
    WHERE email='$email'");

    if(mysqli_num_rows($query)==1)
    {
        $user=mysqli_fetch_assoc($query);

        if(password_verify(
            $password,
            $user['password']
        ))
        {
            $_SESSION['id']=$user['id'];

            $_SESSION['fullname']=$user['fullname'];

            $_SESSION['role']=trim($user['role']);

            $role=strtolower(
                trim($user['role'])
            );

            if($role=="farmer")
            {
                header(
                "Location: farmer_dashboard.php"
                );
                exit();
            }

            elseif($role=="customer")
            {
                header(
                "Location: customer_dashboard.php"
                );
                exit();
            }

            elseif($role=="admin")
            {
                header(
                "Location: admin_dashboard.php"
                );
                exit();
            }
            else
            {
                $error="Invalid Role";
            }
        }
        else
        {
            $error="Invalid Password";
        }
    }
    else
    {
        $error="Account Not Found";
    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<style>

body{
margin:0;
background:#f4f4f4;
font-family:Arial,sans-serif;
}

.login-box{
width:450px;
margin:80px auto;
background:white;
padding:30px;
border-radius:50px 10px 50px 10px;
box-shadow:0 0 15px rgba(0,0,0,.2);
}

h2{
text-align:center;
color:#2E7D32;
}

input{
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
background:#F9A825;
color:white;
border:none;
font-size:18px;
margin-top:15px;
border-radius:15px;
cursor:pointer;
}

.error{
background:#ffe5e5;
color:red;
padding:10px;
margin-bottom:15px;
border-radius:10px;
text-align:center;
}

.link{
text-align:center;
margin-top:15px;
}

.link a{
text-decoration:none;
color:#2E7D32;
font-weight:bold;
}

</style>

</head>

<body>

<div class="login-box">

<h2>Agri Market Login</h2>

<?php

if($error!="")
{
echo "<div class='error'>$error</div>";
}

?>

<form method="POST">

<input
type="email"
name="email"
placeholder="Email Address"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button
type="submit"
name="login">
Login
</button>

</form>

<div class="link">

<a href="register.php">
Create Account
</a>

</div>

</div>

</body>
</html>