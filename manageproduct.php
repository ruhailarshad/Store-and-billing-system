
<?php
include_once("includes/manage.php");
 include_once("temp/header.php");

$obj=new manage();
if(isset($_GET['pid']))
{
    $id = $_GET['pid'];
    $obj->deleteproducts($id);
}
?>




<script >
    function deleteconfig(){
        
        
    var del=confirm("Are You Sure You want to delete this record?");
   
    return del;
    }
</script>


<br/>
<?php
if(isset($_GET['pname']))
{
    include_once("temp/updateproductmodal.php");
} ?>
		


<div class="row" style=" padding-left: 30%; ">
    
	<div class="col-sm-6 col-sm-offset-3">
         <h1 class="display-4" >Manage Products</h1>
         <br>
    <h5 class="display-5">All Products</h5>
    
    <link rel="stylesheet" type="text/css" href="css/dt.css">
    <script src="js/jq.js"></script>
    <script src="js/dt.js"></script>
    <script language="javascript">
    $(document).ready(function() {
        $("#mytable").DataTable();
    });
    </script>
    
    <table id="mytable" class="display">
    	<thead>
        	<th>Category Name</th>
            <th>Brand Name</th>
            <th>Option</th>
            <th>Product Price</th>
            <th>Product Stock</th>
            <th>Status</th>
            <th>Added Date</th>
            <th>Delete</th>
            <th>Edit</th>
        </thead>
    <tbody>
    <?php 
		include_once("includes/manage.php");
		
		$cat = $obj->getAllRecord("vpro");
		foreach($cat as $c)
		{
			echo "<tr>";
			echo "<td>".$c['category_name']."</td>";
			echo "<td>".$c['brand_name']."</td>";
            echo "<td>".$c['product_name']."</td>";
            echo "<td>".$c['product_price']."</td>";
            echo "<td >".$c['product_stock']."</td>";
            if($c['p_status']==0){echo '<td class="p-3 mb-2 bg-danger text-white">Inactive</td>';} else{echo '<td class="p-3 mb-2 bg-info text-white">Active</td>';}
            echo "<td>".$c['added_date']."</td>";
			echo '<td><a href="manageproduct.php?pid='.$c['pid'].'" class="btn btn-success" onclick="return deleteconfig()"><i class="fa fa-trash"></i> Delete</a></td>';
            echo '<td><a class="btn btn-primary" href="manageproduct.php?pname='.$c['product_name'].'";  ><i class="fa fa-edit" ></i> Edit</a></td>';
			echo "</tr>";
		}
	?>
    </tbody>
    </table>

    </div> <!-- col2 -->
</div> <!-- row2> -->
