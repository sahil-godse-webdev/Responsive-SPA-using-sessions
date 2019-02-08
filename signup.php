<?php
$email=$_POST['email'];
$password=$_POST['password'];
//echo "$email<br>$password";

$con=mysqli_connect('localhost','root','','modal') or die("unable to connect");
$q="insert into signup (semail,spassword) values('$email','$password')";
mysqli_query($con,$q);
header('location:header.php');
?>