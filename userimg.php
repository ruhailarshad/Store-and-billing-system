

<?php

	$type = $_FILES['txtimg']['type'];
	
	if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg")
	{
		$iname = $_FILES['txtimg']['name'];
		move_uploaded_file($_FILES['txtimg']['tmp_name'],"C:/xampp/htdocs/ManagementSysten/images".$iname)or die ("Error while uploadding image");
		
		
		
		
	}
	
	


?>
