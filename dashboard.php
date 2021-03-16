
<?php include_once("temp/header.php"); ?>
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
					<div class="row">
						
						<div class="col-sm-6" style=" padding-left: 40px;">
							<br><br><br><br>
							<div class="card" style="width: 18rem;">
							  <div class="card-body">
							    <h5 class="card-title">Manage Orders</h5>
							    <p class="card-text">here you can make invoice and manage orders</p>
							    <a href="order.php" class="btn btn-primary">New Orders</a>
							    <a href="details.php" class="btn btn-primary">Details</a>
							  </div>
							</div>
						</div>
					</div>
				</div>


			</div>
	</div>	
</div>

<p></p>
	<p></p>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Categories</h4>
						<p class="card-text">Here you can manage your categories and you add new parent and sub categories</p>
						<a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
						<a href="managecat.php" class="btn btn-primary"><i class="fa fa-tasks"></i> Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Brands</h4>
						<p class="card-text">Here you can manage your brand and you add new brand</p>
						<a href="#" data-toggle="modal" data-target="#form_brand" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
						<a href="managebrands.php" class="btn btn-primary"><i class="fa fa-tasks"></i> Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Products</h4>
						<p class="card-text">Here you can manage your prpducts and you add new products</p>
						<a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
						<a href="manageproduct.php" class="btn btn-primary"><i class="fa fa-tasks"></i> Manage</a>
					</div>
				</div>
			</div>
		</div>
	</div>


				<?php include_once("temp/catmodal.php") ?>
				<?php include_once("temp/proModal.php") ?>
				<?php include_once("temp/brandModal.php") ?>
