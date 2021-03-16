
  <?php
session_start();

if(!isset($_SESSION['uname']))
{
header("Location: index.php");  

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
  <script type="text/javascript" src="./js/updatereg.js" ></script>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<title></title>
</head>
<body>

<nav class="navbar navbar-expand-lg" " navbar navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="dashboard1.php">Empress Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard1.php"><i class="fa fa-home"></i> Home </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php"><i class="fa fa-tasks"></i> Manage </a>
      </li>
      <li class="nav-item">
       
      </li>
      </ul>
      <ul class="nav navbar-nav ml-auto">
        
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
         <a class="nav-link" href="./updateregister.php?id='<?php  echo $_SESSION['id']; ?>'" ><i class="fa fa-edit"></i> Edit Profile</a>
           <a class="nav-link" href="logout.php"><i class="fa fa-user"></i> Logout</a>
        </div>
      </li>
      
    </ul>
    
  </div>
</nav>
	
</body>
</html>