<!DOCTYPE html>
<html>

	<!-- Navibar -->
	<?php
		include("header_admin.php");
    ?>
	
	<!-- CSS -->

	<!-- End CSS -->
	
	<!-- Head -->
	<head>
		<title> Admin Register </title>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href="register_login.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">	
	</head>
	<!-- end Head -->
	
	<body>
	
	<!-- Validation -->
	<?php
		
		include("bookshop_database.php");
		
		if(isset($_POST['submit']))
		{
			$admin_id =  $_POST['admin_id'];
			$admin_email = $_POST['admin_email'];
			$admin_contact = $_POST['admin_contact'];
			$admin_address = $_POST['admin_address'];
			$admin_password = $_POST['admin_password'];
			$admin_CF_password = $_POST['admin_CF_password'];
			
			$admin_id=mysqli_real_escape_string($combine, $admin_id);
			$admin_email=mysqli_real_escape_string($combine, $admin_email);
			$admin_contact=mysqli_real_escape_string($combine, $admin_contact);
			$admin_contact=mysqli_real_escape_string($combine, $admin_contact);
			
			//Admin id validation
			if(empty($admin_id))
			{
				echo"<script>alert('Please enter your admin ID!')</script>";
			}
			//Email validation
			else if (empty($admin_email))
			{
				echo"<script>alert('Please enter your email!')</script>";
			}
			else if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL))
			{
				echo"<script>alert('Invalid Email!')</script>";
			}
			
			//contact number validation
			else if (empty($admin_contact))
			{
				echo"<script>alert('Please enter your contact number!')</script>";
			}
			else if (!preg_match("/^[0-9]{3}-[0-9]{7}$/", $admin_contact) && !preg_match("/^[0-9]{3}-[0-9]{8}$/", $admin_contact))
			{
				echo"<script>alert('Please enter your contact number in numberic!(e.g: 012-3456789)')</script>";
			}
			
			//address validation
			else if (empty($admin_address))
			{
				echo"<script>alert('Please enter your admin_address!')</script>"; 
			}
			
			//password validation
			else if (empty($admin_password))
			{
				echo"<script>alert('Please enter your password')</script>";
			}
			else if (strlen($admin_password) <='8') 
			{
				echo "<script>alert('Enter your password at least contain 8 Characters!')</script>";
			}
			else if (strlen($admin_password) >'16') 
			{
				echo "<script>alert('Enter your password not more than 16 Characters!')</script>";
			}
			elseif(!preg_match("#[0-9]+#",$admin_password)) 
			{
				echo "<script>alert('Enter password at least contain 1 Number !')</script>";
			}
			//comfirm password validation
			else if (empty($admin_CF_password))
			{
				echo"<script>alert('Please comfirm your password!')</script>";
			}
			else if (strlen($admin_CF_password) <'8') 
			{
				echo "<script>alert('Enter your password at least contain 8 Characters!')</script>";
			}
			else if (strlen($admin_CF_password) >'16') 
			{
				echo "<script>alert('Enter your password not more than 16 Characters!')</script>";
			}
			elseif(!preg_match("#[0-9]+#",$admin_CF_password)) 
			{
				echo "<script>alert('Enter password at least contain 1 Number !')</script>";
			}
			elseif(!preg_match("#[A-Z]+#",$admin_CF_password)) 
			{
				echo "<script>alert('Enter password at least contain 1 Capital Letter!')</script>";
			}
			elseif(!preg_match("#[a-z]+#",$admin_CF_password)) 
			{
				echo "<script>alert('Enter password at least contain 1 Lowercase Letter!')</script>";
			}
		
			else
			{
				// first check the database to make sure 
			  // a admin does not already exist with the same admin id
			  echo"<script>alert('You have entered strong password')</script>";
				//validation if the admin_id had been record in database
				$sql="SELECT admin_id FROM admin WHERE admin_id='$admin_id'";
				$result=mysqli_query($combine,$sql);
				$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
				if(mysqli_num_rows($result)== 1)
				{
					//message when data had record in database
					echo "<script>alert('Sorry... This admin ID had already used. Please try another.');
						window.location='admin_register.php'</script>";
				}
					//store new record
				else if(isset($_POST['admin_id']) && isset($_POST['admin_password']))
				{
					//success store data and display message
					$query = mysqli_query($combine, "INSERT INTO admin
					(admin_id, admin_email, admin_contact, admin_address, admin_password) VALUES
					('$admin_id', '$admin_email', '$admin_contact', '$admin_address', '$admin_password')");
					if ($query)
					{
						$_SESSION['admin_id'] = $admin_id;
						echo "<script>alert('Your account had been success key in.');
						window.location='adminlogin.php'</script>";
					}
				}
				else
				{
					//message invalid input
					echo"<script>alert('You have no success store record in database')</script>";
				}
			}
				
		}
	?>
		<!-- End Validation -->
		
		<!-- Form Division -->
		<br /><br />
		<div class = "form">
		
			<form method = "POST" action = "admin_register.php">
			
				<h1><center>ADMIN REGISTER</center></h1>
			
				<!-- Username -->
				<label><span class ="red">*</span><i class="fa fa-user" aria-hidden="true">&nbsp; Admin ID : </i></label>
				<br>
				<input type = "text" name ="admin_id" value= "<?php if(isset($_POST["admin_id"])) echo $_POST["admin_id"]; ?>" size="40" placeholder = "Enter your admin ID"/>
				
				<br>
				
				<!-- Email -->
				<label><span class = "red">*</span><i class="fa fa-envelope" aria-hidden="true">&nbsp; Email : </i></label>
				<br>
				<input type = "text" name = "admin_email" value= "<?php if(isset($_POST["admin_email"])) echo $_POST["admin_email"]; ?>"
				size = "40" placeholder = "Enter your email"/>
				
				<br>
				
				<!-- Contact Number -->
				<label><span class = "red">*</span><i class="fa fa-phone" aria-hidden="true">&nbsp; Contact Number : </i></label>
				<br>
				<input type = "text" name = "admin_contact" value= "<?php if(isset($_POST["admin_contact"])) echo $_POST["admin_contact"]; ?>"
				size = "30" placeholder = "Enter your contact number"/>
				
				<br>
				
				<!-- Address -->
				<label><span class = "red">*</span><i class="fa fa-home" aria-hidden="true"> &nbsp;Address : </i></label>
				<br>
				<input type = "text" name = "admin_address" value= "<?php if(isset($_POST["admin_address"])) echo $_POST["admin_address"]; ?>"
				size = "60" placeholder = "Enter your address"/>
				
				<br>
				
				<!-- Password -->
				<label><span class = "red">*</span><i class="fa fa-lock" aria-hidden="true"> &nbsp;Password : </i></label>
				<br>
				
				<!-- Password Visibility -->
				<div class = "visible">
					<input type = "password" name = "admin_password" id = "admin_password" 
					value= "<?php if(isset($_POST["admin_password"])) echo $_POST["admin_password"]; ?>" placeholder = "Enter Password"/> 
					<i class="fa fa-eye" aria-hidden="true" id = "eye" onclick = "Toggle()"></i>
				</div>
				
				<br>
				
				<!-- Comfirm Password -->
				<label><span class = "red">*</span><i class="fa fa-lock" aria-hidden="true">&nbsp; Confirm Password : </i></label>
				<br>
				
				<!-- Comfirm Password Visibility -->
				<div class = "visible">
					<input type = "password" name = "admin_CF_password" id = "admin_CF_password" 
					value= "<?php if(isset($_POST["admin_CF_password"])) echo $_POST["admin_CF_password"]; ?>" placeholder = "Enter your comfirm password"/>
					<i class="fa fa-eye" aria-hidden="true" id = "eye" onclick = "CFToggle()"></i>
				</div>
				<br>
										
				<p class="policy"> Already have an account ? <a href = "adminlogin.php">Login</a></p>
						
				<br><br><br>
				
				<!-- Submit Button -->
				<input type = "submit" style = "float:center" value = "REGISTER" name = "submit"/> 					
			</form>	
			<!-- End Form -->
			
			<!-- Password Visibility -->
			<script> 
		// Change the type of input to password or text 
			function Toggle() 
			{ 
				var temp = document.getElementById("admin_password"); 
				if (temp.type === "password")
				{ 
					temp.type = "text"; 
				} 
				else 
				{ 
					temp.type = "password"; 
				} 
			} 
			
			function CFToggle() 
			{ 
				var temp = document.getElementById("admin_CF_password"); 
				if (temp.type === "password")
				{ 
					temp.type = "text"; 
				} 
				else 
				{ 
					temp.type = "password"; 
				} 
			} 
			</script>
			</script> 
			<!-- End Password Visibility -->
			
		</div>
		<!-- End Form Division -->
		
	</body>
	
</html>