
<?php
include_once("includes/manage.php");
 include_once("temp/header.php");
 $obj=new manage();
       
        if(isset($_GET['bid']))
{
    $id = $_GET['bid'];
    $obj->deletebrands($id);
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
if(isset($_GET['bname']))
{
    include_once("temp/updatebrandsmodal.php");
} ?>


<div class="row" style="padding-left: 35%">
    
	<div class="col-sm-6 col-sm-offset-3">
         <h1 class="display-4" >Manage Brands</h1>
         <br>
    <h5 class="display-5">All Brands</h5>
    
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
        	<th>ID</th>
            <th>Name</th>
            <th>Status</th>
            <th>Option</th>
        </thead>
    <tbody>
    <?php 
		include_once("includes/manage.php");
		
		$cat = $obj->getAllRecord("brands");
		foreach($cat as $c)
		{
			echo "<tr>";
			echo "<td>".$c['bid']."</td>";
			echo "<td>".$c['brand_name']."</td>";
             if($c['status']==0){echo '<td  class="p-3 mb-2 bg-danger text-white">Inactive</td>';} else{echo '<td  class="p-3 mb-2 bg-info text-white">Active</td>';}
			echo '<td><a href="managebrands.php?bid='.$c['bid'].'" class="btn btn-success" onclick="return deleteconfig()"><i class="fa fa-trash"></i> Delete</a> <a class="btn btn-primary" href="managebrands.php?bname='.$c['brand_name'].'";  ><i class="fa fa-edit" ></i> Edit</a></td>';
			echo "</tr>";
		}
	?>
    </tbody>
    </table>

    </div> <!-- col2 -->
</div> <!-- row2> -->
