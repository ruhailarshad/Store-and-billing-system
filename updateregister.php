
<?php
include_once("includes/userphp.php");
$obj=new ruhail();

if(isset($_GET['id']))
{

      $id=$_GET['id'];
      
      $result = $obj->getAlluserbyid('user',$id);
      if($user_data = mysqli_fetch_array($result))
      {
        $u_id = $user_data['id'];
        $f_name = $user_data['first_name'];
        $l_name = $user_data['last_name'];
        $user_name = $user_data['username'];
        $u_email = $user_data['email'];
       
        
       }
  

}
 ?>




<?php include_once("temp/header.php") ?>
<div class="overlay"><div class="loader"></div></div>
    <!-- Navbar -->
    
    <br/><br/>
    
      <div class="container">
    
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">Register</div>
              <div class="card-body">
                <div class="form-group">
                    
                <form id="register_update_form" onsubmit="return false" enctype="multipart/form-data" >
                  
                   <input type="hidden" name="u_id" id="u_id" value="<?php echo $u_id; ?>" class="form-control" id="u_id" >
                  <div>
                    <label for="fname">First Name</label>
                    <input type="text" name="f_name" class="form-control" id="f_name" value="<?php echo $f_name; ?>" placeholder="Enter Username">
                    <small id="ferror" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" name="l_name" class="form-control" id="l_name" value="<?php echo $l_name; ?>" placeholder="Enter Username">
                    <small id="lerror" class="form-text text-muted"></small>
                  </div>
                  <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="user_name" class="form-control" id="user_name" value="<?php echo $user_name; ?>" placeholder="Enter Username">
                    <small id="uerror" class="form-text text-muted"></small>
                  </div>
                   <div class="form-group">
                    <label for="password1">New Password</label>
                    <input type="password" name="u_password1" class="form-control"  id="u_password1"  placeholder="Password">
                    <small id="p1error" class="form-text text-muted"></small>
                  </div>
                  
                  <span><a href="dashboard.php" class="btn btn-primary">Back</a></span>
                  <button type="submit"  name="user_update_register" class="btn btn-primary"><span class="fa fa-user"></span>&nbsp;Update</button>
                  
                </form>
              </div>
          <div class="card-footer text-muted">
            
          </div>
        </div>
    </div>

