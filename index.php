<?php
session_start();


if (isset($_SESSION["uname"])) {
	header("location:dashboard.php");
}
	
if(isset($_POST['btnlogin']))
{
	
$a = $_POST['txtuname'];
$b = $_POST['txtupass'];

include("includes/userphp.php");

$obj = new ruhail();

$r = $obj->login($a,$b);

if($result = mysqli_fetch_array($r))
{
	$_SESSION['id'] = $result['id'];
	$_SESSION['fname'] = $result['first_name'];
	$_SESSION['lname'] = $result['last_name'];
	$_SESSION['uname'] = $result['username'];	
	$_SESSION['llogin'] = $result['last_login'];
	$_SESSION['uimage'] = $result['uimage'];	

}
}



?>	 	

<!DOCTYPE html>
<html>
<head>
	 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="./js/main.js" ></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<title></title>
</head>
	<body>
	<br><br><br>
		<div class="container">
			<div class="card mx-auto" style="width: 20rem;">
				<img src="images/login.png" style="width: 60%" class="card-img-top mx-auto" alt="...">
				<div class="card-body">
				
					<form method="post" action="">
						<div class="form-group">
							<label for="exampleInputEmail1">UserName</label>
							<input type="UserName" class="form-control" name="txtuname" aria-describedby="emailHelp" placeholder="Enter username">
							
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" name="txtupass" placeholder="Password">
							</div>
							
							
							<button type="submit" name="btnlogin" class="btn btn-primary"><i class="fa fa-lock"></i> Login</button>
							<span><a href="register.php">Register</a></span>
					</form>

				</div>
			</div>
		</div>

	</body>
</html>