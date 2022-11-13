<!DOCTYPE html>


<!--validation for admin id and password-->
<?php
	include("bookshop_database.php");
	session_start();

	if(isset($_POST['login']))
	{
		$admin_id = mysqli_real_escape_string($combine, $_POST['admin_id']);
		$admin_password = mysqli_real_escape_string($combine, $_POST['admin_password']);
		$admin_id = stripslashes($_POST['admin_id']);
		$admin_password = stripslashes($_POST['admin_password']);
		
		$valid = true;
		
		//admin id validation
		if(empty($admin_id))
		{
			echo"<script>alert('Please enter your admin ID !')</script>";
		}
		//password validation
		else if(empty($admin_password))
		{
			echo "<script>alert('Please enter the password !')</script>";
		}
		else if (strlen($_POST["admin_password"]) <'8') 
		{
			echo "<script>alert('Enter your password at least contain 8 Characters!')</script>";
		}
		else if (strlen($_POST["admin_password"]) >'16') 
		{
			echo "<script>alert('Enter your password not more than 16 Characters!')</script>";
		}
		elseif(!preg_match("#[0-9]+#",$_POST["admin_password"])) 
		{
			echo "<script>alert('Enter password at least contain 1 Number !')</script>";
		}
		else if($valid)
		{
			//validation if the admin id had been record in database
			$sql="SELECT * FROM admin WHERE admin_id='$admin_id' AND admin_password='$admin_password' ";
			$result=mysqli_query($combine,$sql);
			$row=mysqli_fetch_array($result);
			$admin_id = $row['admin_id'];
			if(mysqli_num_rows($result)== 1)
			{
				$_SESSION['admin_id'] = $admin_id;
				echo "<script>alert('You are now logged in.');
					window.location='stocks_level.php'</script>";
					return true;
			
			}else {
				echo "<script>alert('Wrong admin ID/password combination.');
				window.location='adminlogin.php'</script>";
				return false;
			}
		}
	}

?>

	<head>
		<title>Admin | Login</title>
		<meta charset = "utf-8">
		 <!-- CSS -->
		<link rel = "stylesheet" href="register_login.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	
	</head>  <!-- end head -->
	
	<body>
		 <!-- include navibar.php -->
		<?php
			include('header_admin.php');
		?>
		
		 <!-- make a login box -->
		<div class = "form">
			
			 <!-- Use form for login details -->
			<form method = "post" name = "adminlogin" action="adminlogin.php">
				<h3><center>Admin Login</center></h3>
				<!-- prompt user to enter username --> <!-- fa fa-user is icon of the username -->
				<p><i class="fa fa-user" aria-hidden="true"> Admin ID</i></p>
				<input type = "text" name = "admin_id" value= "<?php if(isset($_POST["admin_id"])) echo $_POST["admin_id"]; ?>"
				placeholder = "Enter Admin ID"></input>
				
				<br/>
				
				<!-- prompt user to enter password --> <!-- fa fa-lock is icon of the password -->
				<p><i class="fa fa-lock" aria-hidden="true"> Password</i></p>
				<div class = "visible">
					<input type = "password" id = "password" name = "admin_password" value= "<?php if(isset($_POST["admin_password"])) echo $_POST["admin_password"]; ?>"
					placeholder = "Enter Password">
					<span>
						<!-- fa fa-eye is icon of the password visible -->
						<i class="fa fa-eye" aria-hidden="true" id = "eye" onclick = "Toggle()"></i>
					</span>
				</div>
				
				<br/>
				
				<!-- after user have successfully enter their username and password , can press the submit button -->
				<input type = "hidden" name = "submitted" value = "true"/>
				<input type="submit" style="float:center" value='LOGIN' name="login"/>
				
			</form>  <!-- end form -->
			
		</div>  <!-- div -->
		
		<?php
			require('footer.php');
		?>
		
		 <!-- javascript -->
		<script> 
			// Change the type of input to password or text 
			function Toggle() 
			{ 
				var temp = document.getElementById("password"); 
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
		
	</body> <!-- end body -->
</html>