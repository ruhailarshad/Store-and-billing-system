$(document).ready(function(){
	var DOMAIN = "http://localhost:8080/ManagementSysten";
	$("#register_update_form").on("submit",function(){
		var status = false;
		var firstname = $("#f_name");
		var lastname = $("#l_name");
		var uname = $("#user_name");
		var pass1 = $("#u_password1");
		var pass2 = $("#u_password2");
		var uimg = $("#txtimg");
		
		
		var f_patt=new RegExp(/^[a-zA-Z]{3,16}$/);
		if(!f_patt.test(firstname.val())){
			firstname.addClass("border-danger");
			$("#ferror").html("<span class='text-danger'>Please enter valid FirstName and FirstName should be more than 3 char</span>");
			status = false;
		}else{
			firstname.removeClass("border-danger");
			$("#ferror").html("");
			status = true;
		}
		if(!f_patt.test(lastname.val())){
			lastname.addClass("border-danger");
			$("#lerror").html("<span class='text-danger'>Please enter valid LastName and LastName should be more than 3 char</span>");
			status = false;
		}else{
			lastname.removeClass("border-danger");
			$("#lerror").html("");
			status = true;
		}
		var u_patt=new RegExp(/^[a-z0-9_-]{6,15}$/);
		if(!u_patt.test(uname.val())){
			uname.addClass("border-danger");
			$("#uerror").html("<span class='text-danger'>Please enter valid UserName and UserName should be more than 6 char</span>");
			status = false;
		}else{
			uname.removeClass("border-danger");
			$("#uerror").html("");
			status = true;
		}
		
		if(pass1.val() == "" || pass1.val().length < 8){
			pass1.addClass("border-danger");
			$("#p1error").html("<span class='text-danger'>Please Enter more than 8 digit password</span>");
			status = false;
		}else{
			pass1.removeClass("border-danger");
			$("#p1error").html("");
			status = true;
		}
		
		
		if (status == true) {
			$(".overlay").show();
			$.ajax({
				url :'includes/process.php',
				method : "POST",
				data : $("#register_update_form").serialize(),
				success : function(data)
				{
					
					if (data == "username_already_exist") 
					{
					
						alert("username is already exist");
					}
					else if(data == "updated")
					{
						alert("user is updated");
						window.location.href = encodeURI(DOMAIN+"/dashboard.php");
					}

				}
			})
		}
	})





});