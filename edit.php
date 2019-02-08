<?php
	$name = $_POST['name'];
	$id = $_POST['id'];
	$phone = $_POST['phone'];
	$edu = $_POST['edu'];
	$hobby = $_POST['hobby'];
	$rel = $_POST['rel'];
	$addr = $_POST['addr'];
	
	$con=mysqli_connect('localhost','root','','modal')or die("unable to connect");
	$q="update details
		set name= '$name', phone=$phone,education='$edu',hobby='$hobby',religion='$rel',address='$addr'
		where id= '$id'
	";
	
	mysqli_query($con,$q);
	header('location: header.php');
	
	
?>