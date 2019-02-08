<?php
	@session_start();
	
?>
<html>
	<head>
		<title>Modal example</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>	
	</head>
	
	<body>
	
		<div id="header" class="container-fluid bg-primary" style="height: 60px">
			<b class="text-light" style="font-size: 40px;">Sahil Godse</b>
			
			<?php
				if(@$_SESSION['login']!=1){
			?>		
				<button class="btn btn-light m-3" data-toggle="modal" data-target="#signupModal" style="float: right;">Sign Up</button>
				<button class="btn btn-light m-3" data-toggle="modal" data-target="#loginModal" style="float: right;">Login</button>
			<?php	
				}
			else{
			?>		
				<form method="post" action="logout.php">
					<button class='btn btn-light m-3' type="submit" style='float: right;'>Log out</button>
				</form>
				
				<!--<h3>Add following details</h3>-->
				<?php
					$con=mysqli_connect('localhost','root','','modal')or die("unable to connect");
					$id=$_SESSION['name'];
					$q="select * from details where id='$id'";
					$res=mysqli_query($con,$q);
					$num = mysqli_num_rows($res);
					if($num>0){
						while($f=mysqli_fetch_array($res)){
				?>
				<table class="table">
				  <thead>
					<tr>
					  <th scope="col">Id</th>
					  <th scope="col">Name</th>
					  <th scope="col">Phone</th>
					  <th scope="col">Education</th>
					  <th scope="col">Hobby</th>
					  <th scope="col">Religion</th>
					  <th scope="col">Address</th>
					  <th scope="col">Edit</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td><?php echo $f['id'];?></td>
					  <td><?php echo $f['name']?></td>
					  <td><?php echo $f['phone']?></td>
					  <td><?php echo $f['education']?></td>
					  <td><?php echo $f['hobby']?></td>
					  <td><?php echo $f['religion']?></td>
					  <td><?php echo $f['address']?></td>
					  <td><button class='btn btn-dark'  data-toggle="modal" data-target="#editmodal" type="submit">Edit</button></td>
					</tr>
				  </tbody>
				</table>
				<!-- Edit Modal -->
				<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit the details here</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
					<form method="post" action="edit.php">
					  <div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputEmail3" value="<?php echo $f['name'];?>" name="name" placeholder="Name">
						</div>
					  </div>
					  <div class="form-group row">
						<div class="col-sm-10">
						  <input type="hidden" class="form-control" id="inputEmail3" value="<?php echo $f['id'];?>" name="id" placeholder="Name">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Phone number</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputPassword3" value="<?php echo $f['phone'];?>" name="phone" placeholder="Phone number">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Education</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputPassword3" value="<?php echo $f['education'];?>" name="edu" placeholder="Education">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Hobby</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputPassword3" value="<?php echo $f['hobby'];?>" name="hobby" placeholder="Hobby">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Religion</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputPassword3" value="<?php echo $f['religion'];?>" name="rel" placeholder="Religion">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
						<div class="col-sm-10">
						  <textarea cols="15" rows="4" name="addr" class="form-control"><?php echo $f['address'];?></textarea>
						</div>
					  </div>
					  <button class='btn btn-primary m-3' type="submit">Submit</button>
					</form>
					  </div>
					</div>
				  </div>
				</div>
				<?php
						}
				?>
				<?php }
				 else{ ?>
					<form method="post" action="add-details.php"><br><br><br>
					  <div class="form-group row">
						<label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputEmail3" name="name" placeholder="Name">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Phone number</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputPassword3" name="phone" placeholder="Phone number">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Education</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputPassword3" name="edu" placeholder="Education">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Hobby</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputPassword3" name="hobby" placeholder="Hobby">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Religion</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputPassword3" name="rel" placeholder="Religion">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
						<div class="col-sm-10">
						  <textarea cols="15" rows="4" name="addr" class="form-control"></textarea>
						</div>
					  </div>
					  <!--<div class="form-group row">
						<label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
						<div class="col-sm-10">
						  <input type="hidden" class="form-control" value="<?php echo $_SESSION['email']; ?>" name="id">
						</div>
					  </div>-->
					  <button class='btn btn-primary m-3' type="submit">Submit</button>
					</form>
				<?php } ?>
				
			<?php	
				}
			?>
		
		</div>
		
		<!-- loginModal -->
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Login here</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<form action="validate.php" method="post">
				  <div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  <div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Check me out</label>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
			  </div>
			  
			</div>
		  </div>
		</div>
		
		
		
		<!-- Signup Modal -->
		<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sign up Here</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<form method="post" action="signup.php">
				  <div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				  </div>
				  <div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Check me out</label>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
			  </div>
			 
			</div>
		  </div>
		</div>
		
	</body>
	
</html>