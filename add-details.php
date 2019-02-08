<?php
	session_start();
	//$_SESSION['submit']=1;
	$_SESSION['exist']=0;
	$id=$_SESSION['name'];
	//echo $id;
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$edu=$_POST['edu'];
	$hobby=$_POST['hobby'];
	$rel=$_POST['rel'];
	$addr=$_POST['addr'];
	$con=mysqli_connect('localhost','root','','modal')or die("unable to connect");
	$q="insert into details(name,phone,education,hobby,religion,address,id) values ('$name',$phone,'$edu','$hobby','$rel','$addr','$id')";
	
	mysqli_query($con,$q);
	
	header('location: header.php');

?>