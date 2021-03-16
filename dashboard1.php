
<?php include_once("temp/header.php");
	include("includes/manage.php");
 ?>

	<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="card " style="width: 25rem;">
		  		<img src='images/<?php echo $_SESSION['uimage'];  ?>' style="width: 60%" class="card-img-top mx-auto" alt="...">
			  	<div class="card-body ">
				    <h5 class="card-title">Profile Info</h5>
				    <p class="card-text"><i class="fa fa-lock"></i>  <b>Name:</b>  <?php echo $_SESSION['fname'];?> <?php echo $_SESSION['lname']; ?></p>
				    <p class="card-text"><i class="fa fa-lock"></i>  <b>UserName:</b>  <?php echo $_SESSION['uname']; ?> </p>
				    <p class="card-text"><b>Last Login:</b>  <?php echo $_SESSION['llogin']; ?></p>
				    
				    <a  href="temp/imagemodal.php" class="btn btn-primary"><i class="fa fa-edit"></i> Upload Picture</a>
			  	</div>
			</div>
		</div>


			<div class="col-md-8">
				<div class="jumbotron" style="width: 100%; height: 100%;">
					<h1>Welcome <?php echo $_SESSION['fname'];?> <?php echo $_SESSION['lname']; ?></h1>
					<br><br><br>
					<div class="row">
						<div class="col-sm-6">
							<iframe src="http://free.timeanddate.com/clock/i6u5ilrw/n757/szw210/szh210/hocfff/hbw0/cf100/hgr0/fas20/facfff/fdi86/mqc000/mqs2/mql3/mqw4/mqd70/mhc000/mhs2/mhl3/mhw4/mhd70/mmv0/hhs3/hms3/hsc00f" frameborder="0" width="210" height="210"></iframe>

			
						</div>
						
					</div>
				</div>


			</div>
	</div>	
</div>
	<?php  
		$obj=new manage();
		$products=$obj->getAllRecord('products');
		$brands=$obj->getAllRecord('brands');
		$categories=$obj->getAllRecord('categories');
	 ?>
<p></p>
	<p></p>
	<div class="container">
		<div class="row">
		<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						
						<h4 class="card-title">Total Brands</h4>
						<img src="images/checklist.png" style="width: 25%; height: 25%; float: left;  padding-top: 5%;"; />
						<br>
						<p class="display-4" style="padding-left: 100px;"> <?php echo mysqli_num_rows($brands);?> </p>
						
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						
						<h4 class="card-title">Total Categories</h4>
						<img src="images/warehouse.png" style="width: 25%; height: 25%; float: left;  padding-top: 5%;"; />
						<br>
						<p class="display-4" style="padding-left: 100px;"> <?php echo mysqli_num_rows($categories);?> </p>
						
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						
						<h4 class="card-title">Total Products</h4>
						<img src="images/stock.png" style="width: 25%; height: 25%; float: left; padding-top: 5%;"; />
						<br>
						<p class="display-4" style="padding-left: 100px;"> <?php echo mysqli_num_rows($products);?> </p>
						
					</div>
				</div>
			</div>
		</div>
	</div>


			