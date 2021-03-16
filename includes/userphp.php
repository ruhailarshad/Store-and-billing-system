<?php 
class ruhail
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
	//user registration
	 function register($firstname,$lastname,$username,$email,$password)
	{	
		
		$q = mysqli_query($this->con(),"SELECT id FROM user WHERE email = '$email' or username='$username'")  or die("error while selection");
		$i = mysqli_num_rows($q);
		if($i > 0){
			return "User_Already_Exist";	
		}
		else
		{
			
			$date = date("Y-m-d");
			$c = md5($password);
			$a = $this->check($username);
			$b = $this->check($email);
			$d = $this->check($date);
			$e = $this->check($firstname);
			$f = $this->check($lastname);
			
			$q =mysqli_query ($this->con(),"INSERT INTO user (username,email,password,register_date,first_name,last_name,last_login)
				VALUES ('$a','$b','$c','$d','$e','$f','$d')") or die("error in inserting user");
			return "added";
			
			
		}
	}
	
	//user registration
	 function updateregister($uid,$firstname,$lastname,$username,$password)
	{	
		
		$u_id=$this->check($uid);
		$first_name=$this->check($firstname);
		$last_name=$this->check($lastname);
		$user_name=$this->check($username);
		$u_password1=$this->check($password);
		$u_password=md5($u_password1);	
		
			$q =mysqli_query ($this->con(),"UPDATE user set first_name='$first_name' , last_name='$last_name' , username='$user_name' , password='$u_password' where id=$u_id") ;
			if(!$q)
			{
				return "username_already_exist";
				
			}else
			{
				return "updated";
			}
			
		
	}
	//user login
	  function login($username,$password)
	  {
	 	$a=$this->check($username);
	 	$b = md5($password);
	 	
		$q=mysqli_query($this->con(),"SELECT id,first_name,last_name,username,last_login,uimage FROM user WHERE username = '$a' AND password = '$b'")or die("Error in login selection");
		$i = mysqli_num_rows($q);
		
				
		if($i > 0)
		{
				date_default_timezone_set("Asia/Karachi");
				$lastlogin = date("Y-m-d h:i:sa");
				$query =mysqli_query( $this->con(),"UPDATE user SET last_login = '$lastlogin' WHERE username = '$a'") or die("error in last_login query");
				?>
				<script type="text/javascript">
				window.location.href = 'dashboard1.php';
				</script>
				<?php
				
		}	
		else
		{
			echo "<script>alert('Invalid Login')</script>";	
		}
		return $q;
		}
	
		function getAlluserbyid($table,$id)
	{
		$rows = mysqli_query($this->con(),"SELECT * FROM $table WHERE id=$id") or die("error in selection ".$table);
		
		
			return $rows;
		
	}	
	
	function updateimage($a,$b)
	{
		$id = $this->check($a);
		$img = $this->check($b);
		
		
		$q = mysqli_query($this->con(),"update user set uimage='$img'  where id=$id;") or die("error while uploading image");
		if($q)
		{
			return "image_updated";
		}
	}
		





}
	



?>