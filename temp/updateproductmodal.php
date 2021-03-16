<?php
include_once("header.php");
 $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/ManagementSysten/includes/manage.php";
   include_once($path);

    
    
  $obj=new manage();
$proid="";
$proname="";
$procatid="";
$probrandid="";
$probrandname="";
$probrandname="";
$proprice="";
$proquantity="";
$prostatus="Status";
  if(isset($_GET['pname']))
  {
      
      $result = $obj->getAllproductbyname("vpro",$_GET['pname']);

      if($user_data = mysqli_fetch_array($result))
      {
      $proid = $user_data['pid'];
      $procatid = $user_data['cid'];
      $probrandid = $user_data['bid'];
      $procatname = $user_data['category_name'];
      $probrandname = $user_data['brand_name'];
      $proname = $user_data['product_name'];
      $proprice = $user_data['product_price'];
      $proquantity = $user_data['product_stock'];
      $prostatus = $user_data['p_status'];
     
       }
  }

  

 if(isset($_POST['btnpro']))
 {
    $proid="";
    $proname="";
    $procat="Select Category";
    $probrand="Select Brand";
    $proprice="";
    $proquantity="";
    $prostatus="Status";

    $pro_id = $_POST['pid'];
      $pro_cat = $_POST['category_name'];
      $pro_brand = $_POST['brand_name'];
      $pro_name = $_POST['product_name'];
      $pro_price = $_POST['product_price'];
      $pro_quantity = $_POST['product_stock'];
      $pro_status = $_POST['p_status'];
     
       $obj->updateproduct($pro_id,$pro_cat,$pro_brand,$pro_name,$pro_price,$pro_quantity,$pro_status);

 }





?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-white mb-4">Bootstrap 4 Login Form</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Product Edit</h3>
                        </div>
                        <div class="card-body">
                            <form class="form"   autocomplete="off"  method="POST">
                              
                                <div class="form-group">
                                    <label for="uname1">Product Name</label>
                                    <input type="text" class="form-control  form-control-lg rounded-0" required name="product_name"  value="<?php echo $proname; ?>" >
                                    
                                </div>
                                <div class="form-group">
                                <label>Category</label>
                                <select class="form-control form-control-lg rounded-0" i name="category_name"  required/>
                                   <option value="<?php echo $procatid; ?>"><?php echo  $procatname; ?></option>
                                    <?php
                                  $cat = $obj->get_where_status_is_one("categories");
                                  foreach($cat as $c)
                                  {
                                  echo '<option value="'.$c['cid'].'">'.$c['category_name'].'</option>';  
                                  }
                                  ?>

                                  
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Brand</label>
                                <select class="form-control form-control-lg rounded-0"  name="brand_name" required/>
                                  <option value="<?php echo $probrandid; ?>"><?php echo $probrandname; ?></option>
                                     <?php
                                  $cat = $obj->get_where_status_is_one("brands");
                                  foreach($cat as $c)
                                  {
                                  echo '<option value="'.$c['bid'].'">'.$c['brand_name'].'</option>';  
                                  }
                                  ?>
                                  
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" class="form-control form-control-lg rounded-0" value="<?php echo $proprice; ?>"  name="product_price"  required/>
                              </div>
                              <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" class="form-control form-control-lg rounded-0" value="<?php echo $proquantity; ?>"  name="product_stock"  required/>
                               
                              </div>
                                <div class="form-group">
                                <label>Product Status</label>
                              <select  class="form-control form-control-lg rounded-0" value=""  name="p_status" >
                               <option value="1">Active</option>
                            <option value="0">Inactive</option>
                              </select>
                               
                              </div>
                                <div class="form-group">
                                    
                                    <input type="hidden"  name="pid"  required="" value="<?php echo $proid; ?>" value="<?php echo $cat_id; ?>" >
                                    
                                </div>
                                <button type="submit" name="btnpro" class="btn btn-primary btn-lg float-right">  Update </button> 
                                
                            </form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->

