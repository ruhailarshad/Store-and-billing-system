<?php
 $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/ManagementSysten/includes/manage.php";
   include_once($path);

    
    
  $obj=new manage();
$cat_name="";
$cat_id="";
  if(isset($_GET['cname']))
  {
      
      $result = $obj->getAllcategorybyname("categories",$_GET['cname']);

      if($user_data = mysqli_fetch_array($result))
      {
      $cat_id = $user_data['cid'];
      $cat_name = $user_data['category_name'];
       }
  }

  

 if(isset($_POST['btncat']))
 {
  $cat_name="";
    $catid = $_POST['catid'];
        $catname = $_POST['catname'];
        $catstatus = $_POST['status'];
        $result = $obj->Update($catid,$catname,$catstatus);

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
                            <h3 class="mb-0">Category Edit</h3>
                        </div>
                        <div class="card-body">
                            <form class="form"  role="form" autocomplete="off" id="formLogin" novalidate method="POST">
                                <div class="form-group">
                                    <label for="uname1">Category Name</label>
                                    <input type="text" class="form-control  form-control-lg rounded-0" required name="catname"  value="<?php echo $cat_name; ?>" >
                                    
                                </div>
                                 <div class="form-group">
                                <label>Category Status</label>
                              <select  class="form-control form-control-lg rounded-0" value=""  name="status" >
                               <option value="1">Active</option>
                            <option value="0">Inactive</option>
                              </select>
                               
                              </div>
                                <div class="form-group">
                                    
                                    <input type="hidden"  name="catid"  required="" value="<?php echo $cat_id; ?>" >
                                    
                                </div>
                                <button type="submit" name="btncat" class="btn btn-primary btn-lg float-right">  Update </button> 
                                
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

