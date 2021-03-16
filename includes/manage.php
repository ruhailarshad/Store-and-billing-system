<?php


class manage
{
	
	

	function con()
	{
		
		$con = mysqli_connect("localhost","root","","managementsystem") or die("Error In Database Connection");
		return $con;
	}
	function check($a)
	{
		return mysqli_real_escape_string($this->con(),$a);	
	}
	 function addCategory($cat,$status)
	{	
		$q = mysqli_query($this->con(),"SELECT cid FROM categories WHERE category_name = '$cat' ")  or die("error while selection");
		$i = mysqli_num_rows($q);
		if($i > 0){
			return "Category_Already_Exist";	
		}
		else
		{
			$category=$this->check($cat,$status);
			
			$result = mysqli_query($this->con(),"insert into categories(category_name,status)
			 VALUES ('$category','$status')") or die("error in category added");
			if($result)
			{
			return "CATEGORY_ADDED";
			}
		}
	}

	

	 function addbrand($brand,$status)
	 {
	 	$q = mysqli_query($this->con(),"SELECT bid FROM brands WHERE brand_name = '$brand' ")  or die("error while selection");
		$i = mysqli_num_rows($q);
		if($i > 0){
			return "Brand_Already_Exist";	
		}
	 	$brand_name=$this->check($brand);
	 	
	 	$result=mysqli_query($this->con(),"insert into brands(brand_name,status) 
	 		VALUES ('$brand_name','$status')") or die(mysql_error());
	 	if($result)
	 	{
	 		echo "BRAND_ADDED";
	 	}
	 }

	 function addProduct($cid,$bid,$pro_name,$price,$stock,$date,$status){
		$c_id=$this->check($cid);
		$b_id=$this->check($bid);
		$p_name=$this->check($pro_name);
		$p_price=$this->check($price);
		$p_stock=$this->check($stock);
		$p_date=$this->check($date);
		
		$result = mysqli_query($this->con(),"INSERT INTO `products`
			(`cid`, `bid`, `product_name`, `product_price`,
			 `product_stock`, `added_date`, `p_status`)
			 VALUES ('$c_id','$b_id','$p_name','$p_price','$p_stock','$p_date','$status')") or die("error in add product");
		if ($result) {
			return "NEW_PRODUCT_ADDED";
		} 
	}

	 function getAllRecord($table){
		$rows = mysqli_query($this->con(),"SELECT * FROM ".$table) or die("error in selection ".$table);
		
		
			return $rows;
		
	}
	function get_where_status_is_one($table)
	{
		$status=1;
		$rows = mysqli_query($this->con(),"SELECT * FROM ".$table." where status=1") or die("error in selection status in ".$table);
		
		
			return $rows;
		
	}
	//category manage
	function deletecat($id)
	{
		$cid=$this->check($id);
		$result=mysqli_query($this->con(),"delete from categories where cid=$cid");
		if(!$result)
		{

			echo "<script>alert('cannot delete othis category row:due to foreign key constraint with product')</script>";	
		}

	}
	 
	function update($id,$cat,$status)
	{
		$cid=$this->check($id);
		$cstatus=$this->check($status);
		$category_name=$this->check($cat);
		$result=mysqli_query($this->con(),"Update categories set category_name='$cat',status='$cstatus' where cid=$cid");
		if($result)
		{
			echo "<script>alert('Category Updated')</script>";	
			
			?>
				<script type="text/javascript">
				window.location.href = './managecat.php';
				</script>
				<?php
				
		}
		
	}
	function getAllcategorybyname($table,$name)
	{
		$rows = mysqli_query($this->con(),"SELECT * FROM ".$table." WHERE category_name='$name'") or die("error in selection ".$table);
		
		
			return $rows;
		
	}
	//brand manage
	

function deletebrands($bid)
	{
		
		$result=mysqli_query($this->con(),"delete from brands where bid=$bid");
		if(!$result)
		{

			echo "<script>alert('cannot delete othis brand row:due to foreign key constraint with product')</script>";	
		}

	} 
	function getAllbrandsbyname($table,$name)
	{
		$rows = mysqli_query($this->con(),"SELECT * FROM ".$table." WHERE brand_name='$name'") or die("error in selection ".$table);
		
		
			return $rows;
		
	}

function updatebrands($id,$brands,$status)
	{
		$bid=$this->check($id);
		$brands_name=$this->check($brands);
		$bstatus=$this->check($status);
		$result=mysqli_query($this->con(),"Update brands set brand_name='$brands_name',status='$bstatus' where bid=$bid");
		if($result)
		{
			echo "<script>alert('Brand Updated')</script>";	
			
			?>
				<script type="text/javascript">
				window.location.href = './managebrands.php';
				</script>
				<?php
				
		}
	}
	//manage product
	function deleteproducts($pid)
	{
		
		$result=mysqli_query($this->con(),"delete from products where pid=$pid");
		

	} 
	//manage products
	function getAllproductbyname($table,$name)
	{
		$rows = mysqli_query($this->con(),"SELECT * FROM ".$table." WHERE product_name='$name'") or die("error in selection ".$table);
		
		
			return $rows;
		
	}
	function updateproduct($p_id,$c_id,$b_id,$products_name,$products_price,$products_stock,$products_status)
	{
		$pid=$this->check($p_id);
		$cid=$this->check($c_id);
		$bid=$this->check($b_id);
		$product_name=$this->check($products_name);
		$product_price=$this->check($products_price);
		$product_stock=$this->check($products_stock);
		$product_status=$this->check($products_status);
		$result=mysqli_query($this->con(),"Update products set cid=$cid, bid=$bid , product_name='$product_name' ,  product_price='$product_price' , product_stock='$product_stock' , p_status=$product_status where pid=$pid") or die("error in update product");
		if($result)
		{
			echo "<script>alert('Product Updated')</script>";	
			
			?>
				<script type="text/javascript">
				window.location.href = './manageproduct.php';
				</script>
				<?php
				
		}
	}
	//invoice
	function getAllproductbyid($table,$id)
	{
		$result = mysqli_query($this->con(),"SELECT * FROM ".$table." WHERE pid=$id && p_status=1") or die("error in selection ".$table);
				if (mysqli_num_rows($result) == 1) {
					$rows = mysqli_fetch_assoc($result);
				}
		
			return $rows;
		
	}
	 function storeCustomerOrderInvoice($orderdate,$cust_name,$ar_tqty,$ar_qty,$ar_price,$ar_pro_name,$sub_total,$gst,$discount,$net_total,$paid,$due,$payment_type)
	 {
	 	$con = mysqli_connect("localhost","root","","managementsystem") or die("Error In Database Connection");
		$query = mysqli_query($con,"INSERT INTO 
			invoice(customer_name, order_date, sub_total,
			 gst, discount, net_total, paid, due, payment_type) VALUES ('$cust_name','$orderdate','$sub_total','$gst','$discount','$net_total','$paid','$due','$payment_type')") or die("error in storing invoice");
		
				$invoice_no=mysqli_insert_id($con);
				

				if($invoice_no!=NULL)
				{
				
					
					for ($i=0; $i < count($ar_price) ; $i++) 
					{

					//remamining quantity
					$rem_qty = $ar_tqty[$i] - $ar_qty[$i];
					if ($rem_qty <= 0) 
					{
						return "ORDER_FAIL_TO_COMPLETE";
					}
					else
					{
						//Update stock
						$sql = "UPDATE products SET product_stock = '$rem_qty' WHERE product_name = '".$ar_pro_name[$i]."'";
						mysqli_query($this->con(),$sql);
					}


					$query1 = mysqli_query($this->con(),"INSERT INTO invoice_details(invoice_no, product_name , price , qty) VALUES ('$invoice_no','".$ar_pro_name[$i]."','".$ar_price[$i]."','".$ar_qty[$i]."')") or die("error in invoice detail");
			}

			return $invoice_no;
		}
	}
	


}


?>