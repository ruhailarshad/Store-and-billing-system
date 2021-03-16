<?php

include("userphp.php");
include("manage.php");

//register
if (isset($_POST["username"]) && isset($_POST["email"])) 
{
	$user = new ruhail();
	$result = $user->register($_POST["fname"],$_POST["lname"],$_POST["username"],$_POST["email"],$_POST["password1"]);
	echo $result;
	exit();
	
}

//Add Category

if (isset($_POST["category_name"]) AND isset($_POST["select_status"])) {
	$obj = new manage();
	$result = $obj->addCategory($_POST["category_name"],$_POST["select_status"]);
	echo $result;
	exit();
}

//Add Brand

if (isset($_POST["brand_name"])) {

	$u=new manage();
	$result = $u->addbrand($_POST["brand_name"],$_POST["select_status"]);
	echo $result;
	exit();
}
//Add Product
if (isset($_POST["added_date"]) AND isset($_POST["product_name"])) {
	$obj = new manage();
	$result = 
	$obj->addProduct($_POST["select_cat"],$_POST["select_brand"],$_POST["product_name"],$_POST["product_price"],$_POST["product_qty"],$_POST["added_date"],$_POST["select_status"]);
	echo $result;
	exit();
}
//To get Category
if (isset($_POST["getCategory"])) {
	$obj = new manage();
	$rows = $obj->get_where_status_is_one("categories");
	foreach ($rows as $r) {
		echo "<option value='".$r["cid"]."'>".$r["category_name"]."</option>";
	}
	exit();
}

//Fetch Brand
if (isset($_POST["getBrand"])) {
	$obj = new manage();
	$rows = $obj->get_where_status_is_one("brands");
	foreach ($rows as $r) {
		echo "<option value='".$r["bid"]."'>".$r["brand_name"]."</option>";
	}
	exit();
}
 
//update register
if (isset($_POST["user_name"]) && isset($_POST["f_name"]) && isset($_POST["l_name"]) ) 
{
	 
	$user = new ruhail();
		
	
	$result = $user->updateregister($_POST['u_id'],$_POST['f_name'],$_POST['l_name'],$_POST['user_name'],$_POST['u_password1']);
	session_start();
	echo $result;
	if($result=="updated")
	{
		$_SESSION['id'] = $_POST['u_id'];
		$_SESSION['fname'] = $_POST['f_name'];
		$_SESSION['lname'] = $_POST['l_name'];
		$_SESSION['uname'] = $_POST['user_name'];
		
	}

	
	exit();
	
}
//Order Processing

if (isset($_POST["getNewOrderItem"])) {
	$obj = new manage();
	$rows = $obj->getAllRecord("products");
	?>
	<tr>
		    <td><b class="number">1</b></td>
		    <td>
		        <select name="pid[]" class="form-control form-control-sm pid" required>
		            <option value="">Choose Product</option>
		            <?php 
		            	foreach ($rows as $row) {
		            		?>
		            		<option value="<?php echo $row['pid']; ?>"><?php echo $row["product_name"]; ?></option>
		            		<?php
		            	}
		            ?>
		        </select>
		    </td>
		    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>   
		    <td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
		    <td><input name="price[]" type="text" class="form-control form-control-sm price" readonly></span>
		    <span><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td>
		    <td>Rs.<span class="amt">0</span></td>
	</tr>
	<?php
	exit();
}


//Get price and qty of one item
if (isset($_POST["getPriceAndQty"])) 
{
	$obj = new manage();
	$result = $obj->getAllproductbyid("products",$_POST['id']);
	echo json_encode($result);
	exit();
}


if (isset($_POST["order_date"]) AND isset($_POST["cust_name"])) 
{
	
	$orderdate = $_POST["order_date"];
	$cust_name = $_POST["cust_name"];


	//Now getting array from order_form
	$ar_tqty = $_POST["tqty"];
	$ar_qty = $_POST["qty"];
	$ar_price = $_POST["price"];
	$ar_pro_name = $_POST["pro_name"];


	$sub_total = $_POST["sub_total"];
	$gst = $_POST["gst"];
	$discount = $_POST["discount"];
	$net_total = $_POST["net_total"];
	$paid = $_POST["paid"];
	$due = $_POST["due"];
	$payment_type = $_POST["payment_type"];


	$m = new manage();
	echo $result = $m->storeCustomerOrderInvoice($orderdate,$cust_name,$ar_tqty,$ar_qty,$ar_price,$ar_pro_name,$sub_total,$gst,$discount,$net_total,$paid,$due,$payment_type);




}


?> 