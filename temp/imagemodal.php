<?php

include_once("../includes/userphp.php");
 include_once("header.php");
$user=new ruhail();
if(isset($_POST['image_update']))
{

  $user = new ruhail();
  $type = $_FILES['txtimg']['type'];
    if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg")
    {
      $iname = $_FILES['txtimg']['name'];
      
      move_uploaded_file($_FILES['txtimg']['tmp_name'],"C:/xampp/htdocs/ManagementSysten/images/".$iname);
      $result = $user->updateimage($_SESSION['id'],$iname);

      
      
      if($result=="image_updated")
      {
        
        $_SESSION['uimage']=$iname; 
        echo "<script>alert('Image Updated')</script>";
        ?>
        <script type="text/javascript">
        window.location.href = '../dashboard.php';
        </script>
        <?php
        
      }
    }
  
}
?>


<div class="overlay"><div class="loader"></div></div>
    <!-- Navbar -->
    
    <br/><br/>
    
      <div class="container">
    
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">Upload Picture</div>
              <div class="card-body">
                <div class="form-group">
                    
                <form method="POST"  enctype="multipart/form-data" >
                  <div>
                    <br>
                    <input type="file" name="txtimg" id="txtimg"  class="form-control" id="file" ><br>
                    <small id="" class="form-text text-muted"></small>
                    <br><br>
                  </div>
                  
                  <span><a href="../dashboard.php" class="btn btn-primary">Back</a></span>
                  <button type="submit"  name="image_update"  class="btn btn-primary"><span class="fa fa-user"></span>&nbsp;Update</button>
                  
                </form>
              </div>
          
            
          </div>
        </div>
    </div>