<?php

$host="localhost";
$user="root";
$password="";
$dbname="agri_market";

$conn=mysqli_connect($host,$user,$password,$dbname,3307);

if(!$conn){
    die("Connection Failed");
}

?>
________________________________________
