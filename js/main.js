$(document).ready(function(){
	var DOMAIN = "http://localhost:8080/ManagementSysten";
	$("#register_form").on("submit",function(){
		var status = false;
		var firstname = $("#fname");
		var lastname = $("#lname");
		var uname = $("#username");
		var email = $("#email");
		var pass1 = $("#password1");
		var pass2 = $("#password2");
		
		var f_patt=new RegExp(/^[a-zA-Z]{3,16}$/);
		if(!f_patt.test(firstname.val())){
			firstname.addClass("border-danger");
			$("#f_error").html("<span class='text-danger'>Please enter valid FirstName and FirstName should be more than 3 char</span>");
			status = false;
		}else{
			firstname.removeClass("border-danger");
			$("#f_error").html("");
			status = true;
		}
		if(!f_patt.test(lastname.val())){
			lastname.addClass("border-danger");
			$("#l_error").html("<span class='text-danger'>Please enter valid LastName and LastName should be more than 3 char</span>");
			status = false;
		}else{
			lastname.removeClass("border-danger");
			$("#l_error").html("");
			status = true;
		}
		var u_patt=new RegExp(/^[a-z0-9_-]{6,15}$/);
		if(!u_patt.test(uname.val())){
			uname.addClass("border-danger");
			$("#u_error").html("<span class='text-danger'>Please enter valid UserName and UserName should be more than 6 char</span>");
			status = false;
		}else{
			uname.removeClass("border-danger");
			$("#u_error").html("");
			status = true;
		}
		var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
		if(!e_patt.test(email.val())){
			email.addClass("border-danger");
			$("#e_error").html("<span class='text-danger'>Please Enter Valid Email Address</span>");
			status = false;
		}else{
			email.removeClass("border-danger");
			$("#e_error").html("");
			status = true;
		}
		if(pass1.val() == "" || pass1.val().length < 8){
			pass1.addClass("border-danger");
			$("#p1_error").html("<span class='text-danger'>Please Enter more than 8 digit password</span>");
			status = false;
		}else{
			pass1.removeClass("border-danger");
			$("#p1_error").html("");
			status = true;
		}
		
		
		if ((pass1.val() == pass2.val()) && status == true) {
			$(".overlay").show();
			$.ajax({
				url :'includes/process.php',
				method : "POST",
				data : $("#register_form").serialize(),
				success : function(data){
					if (data == "User_Already_Exist") {
					
						alert("user is already exist");
					}
					else{
						$(".overlay").hide();
						window.location.href = encodeURI(DOMAIN+"/index.php?msg=You are registered Now you can login");
					}
				}
			})
		}else{
			pass2.addClass("border-danger");
			$("#p2_error").html("<span class='text-danger'>Password is not matched</span>");
			status = true;
		}
	})

//Add Category
	$("#category_form").on("submit",function(){
		if ($("#category_name").val() == "" ) {
			$("#category_name").addClass("border-danger");
			$("#cat_error").html("<span class='text-danger'>Please Enter category Name</span>");
			$("#status_error").html("<span class='text-danger'>Please Select status</span>");
		}

		else{
			$.ajax({
				url : 'includes/process.php',
				method : "POST",
				data  : $("#category_form").serialize(),
				success : function(data){
					
					if (data == "CATEGORY_ADDED") {
							$("#category_name").removeClass("border-danger");
							$("#cat_error").html("<span class='text-success'>New Category Added Successfully..!</span>");
							
							$("#category_name").val("");
							
						}
						else if(data=="Category_Already_Exist")
						{
							$("#category_name").removeClass("border-danger");
							$("#cat_error").html("<span class='text-success'> Category already exist..!</span>");
							$("#category_name").val("");
							
						}
					}
			})
		}
	})

	//Add Brand
		$("#brand_form").on("submit",function(){
			if ($("#brand_name").val() == "") {
			$("#brand_name").addClass("border-danger");
			$("#brand_error").html("<span class='text-danger'>Please Enter Brand Name</span>");
		}
		else
		{
		$.ajax({
			url : 'includes/process.php',
			method : "POST",
			data  : $("#brand_form").serialize(),
			success : function(data){
				
				if (data == "BRAND_ADDED") {
						$("#brand_name").removeClass("border-danger");
						$("#brand_error").html("<span class='text-success'>New Brand Added Successfully..!</span>");
						$("#brand_name").val("");
						
					}
					else if(data=="Brand_Already_Exist")
					{
						$("#brand_name").removeClass("border-danger");
						$("#brand_error").html("<span class='text-success'> Brand already exist..!</span>");
						$("#brand_name").val("");
					}
				}
			})
		}
	})

	//add product
	$("#product_form").on("submit",function(){
		$.ajax({
				url : 'includes/process.php',
				method : "POST",
				data : $("#product_form").serialize(),
				success : function(data){
					if (data == "NEW_PRODUCT_ADDED") {
						
						$("#product_error").html("<span class='text-success'> Product Added Successfully..!</span>");
						
						$("#product_name").val("");
						$("#select_cat").val("");
						$("#select_brand").val("");
						$("#product_price").val("");
						$("#product_qty").val("");

					}
						
				}
			})
	})
	//Fetch category
	fetch_category();
	function fetch_category(){
		$.ajax({
			url : 'includes/process.php',
			method : "POST",
			data : {getCategory:1},
			success : function(data){
				
				var choose = "<option value=''>Choose Category</option>";
				
				$("#select_cat").html(choose+data);
			}
		})
	}
	//Fetch Brand
	fetch_brand();
	function fetch_brand(){
		$.ajax({
			url : 'includes/process.php',
			method : "POST",
			data : {getBrand:1},
			success : function(data){
				var choose = "<option value=''>Choose Brand</option>";
				$("#select_brand").html(choose+data);
			}
		})
	}


});