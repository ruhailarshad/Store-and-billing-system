<?php include_once("header.php");
 $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/ManagementSysten/includes/manage.php";
   include_once($path);

    
    
  $obj=new manage();
   $brands_id="";
 $brands_name="";
  if(isset($_GET['bname']))
  {
      $bname=$_GET['bname'];
      $result = $obj->getAllbrandsbyname("brands",$bname);

      if($user_data = mysqli_fetch_array($result))
      {
      $brands_id = $user_data['bid'];
        $brands_name = $user_data['brand_name'];
        
       }
  }

  
 if(isset($_POST['btnbrands']))
 {
      $brands_name="";
      $brandid = $_POST['brandsid'];
      $brandname = $_POST['brandsname'];
      $brandstatus = $_POST['status'];
      $result = $obj->updatebrands($brandid,$brandname,$brandstatus);

 }




?>
<div class="container py-5" >
    <div class="row" >
        <div class="col-md-12">
            <h2 class="text-center text-white mb-4">Bootstrap 4 Login Form</h2>
            <div class="row" >
                <div class="col-md-6 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded-0" >
                        <div class="card-header">
                            <h3 class="mb-0">Brands Edit</h3>
                        </div>
                        <div class="card-body" >
                            <form class="form"  role="form" autocomplete="off" id="formLogin" novalidate method="POST">
                                <div class="form-group">
                                    <label for="uname1">Brands Name</label>
                                    <input type="text" class="form-control  form-control-lg rounded-0" required name="brandsname"  value="<?php echo $brands_name; ?>" >
                                    
                                </div>
                                <div class="form-group">
                                <label>Brands Status</label>
                              <select  class="form-control form-control-lg rounded-0" value=""  name="status" >
                               <option value="1">Active</option>
                            <option value="0">Inactive</option>
                              </select>
                               
                              </div>
                                <div class="form-group">
                                    
                                    <input type="hidden"  name="brandsid"  required="" value="<?php echo $brands_id; ?>" >
                                    
                                </div>
                                <button type="submit" name="btnbrands" class="btn btn-primary btn-lg float-right" style="margin-left: 1%">Update</button>
                               
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


