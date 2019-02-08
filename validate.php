<?php
	session_start();

	$email=$_POST['email'];
	$password=$_POST['password'];
	//echo "$email<br>$password";
	
	$con=mysqli_connect('localhost','root','','modal') or die("unable to connect");
	$q="select * from signup where semail='$email' and spassword='$password'";
	$result=mysqli_query($con,$q);
	$num=mysqli_num_rows($result);
	if($num>0){
		$_SESSION['name']=$email;
		$_SESSION['login']=1;
		header('location: header.php');
	}
	else{
		echo"not existed";
	}
?>