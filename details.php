
<?php
include_once("includes/manage.php");
 include_once("temp/header.php");

$obj=new manage();
       

?>




<script >
    function deleteconfig(){
        
        
    var del=confirm("Are You Sure You want to delete this record?");
   
    return del;
    }
</script>


<br/>


<div class="row" style=" padding-left: 30%; ">
    
	<div class="col-sm-6 col-sm-offset-3">
         <h1 class="display-4" >Transaction Details</h1>
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
        	<th>Invoice No</th>
            <th>Customer Name</th>
            <th>Order Date</th>
            <th>Sub Total</th>
            <th>Tax</th>
            <th>Discount</th>
            <th>Net Total</th>
            <th>Paid</th>
            <th>Due</th>
            <th>Invoice</th>
          
        </thead>
    <tbody>
    <?php 
		include_once("includes/manage.php");
		
		$cat = $obj->getAllRecord("invoice");
		foreach($cat as $c)
		{
			echo "<tr>";
			echo "<td>".$c['invoice_no']."</td>";
			echo "<td>".$c['customer_name']."</td>";
            echo "<td>".$c['order_date']."</td>";
            echo "<td>".$c['sub_total']."</td>";
            echo "<td >".$c['gst']."</td>";
            echo "<td >".$c['discount']."</td>";
            echo "<td >".$c['net_total']."</td>";
            echo "<td >".$c['paid']."</td>";
            echo "<td >".$c['due']."</td>";
           echo '<td><a href="pdfinvoice/PDF_INVOICE_'.$c['invoice_no'].'%20.pdf"> View More</a> </td>';
           
           
			echo "</tr>";
		}
	?>
    </tbody>
    </table>

    </div> <!-- col2 -->
</div> <!-- row2> -->
