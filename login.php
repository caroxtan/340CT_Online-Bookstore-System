<!DOCTYPE html>

<?php
	include("bookshop_database.php");
	session_start();
	if(isset($_POST['login_user']))
	{
		 $username = mysqli_real_escape_string($combine, $_POST['username']);
		 $password = mysqli_real_escape_string($combine, $_POST['password']);
		 $username = stripslashes($_POST['username']);
		 $password = stripslashes($_POST['password']);
		$valid = true;
		
		if(empty($username))
		{
			echo"<script>alert('Please enter your username !')</script>";
		}
		else if(empty($password))
		{
			echo "<script>alert('Please enter the password !')</script>";
		}
		else if (strlen($_POST["password"]) <'8') 
		{
			echo "<script>alert('Enter your password at least contain 8 Characters!')</script>";
		}
		else if (strlen($_POST["password"]) >'16') 
		{
			echo "<script>alert('Enter your password not more than 16 Characters!')</script>";
		}
		elseif(!preg_match("#[0-9]+#",$_POST["password"])) 
		{
			echo "<script>alert('Enter password at least contain 1 Number !')</script>";
		}
		else if($valid)
		{
			//validation if the username had been record in database
			$sql="SELECT * FROM user WHERE username='$username' AND password='$password' ";
			$result=mysqli_query($combine,$sql);
			$row=mysqli_fetch_array($result);
			$username = $row['username'];
			if(mysqli_num_rows($result)== 1)
			{
				$_SESSION['username'] = $username;
				echo "<script>alert('You are now logged in.');
					window.location='view_books.php'</script>";
					return true;
			
			}else {
				echo "<script>alert('Wrong username/password combination.');
				window.location='login.php'</script>";
				return false;
			}
			
		}
	}

?>

<html lang="en">
	<head>
	
		<title>Login</title>
		<meta charset = "utf-8">
		
		<link rel = "stylesheet" href="register_login.css">
		<link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	
	</head>
	
	<body>
	
		<!-- include header.php -->
		<?php
			include('header.php');
		?>

		<!-- Form Division -->
		<div class = "form">
			<!-- Use form for login details -->
			<form method = "POST" action = "login.php">
			
				<h3><center>Login</center></h3>
				<!-- prompt user to enter username --> <!-- fa fa-user is icon of the username -->
				<p><i class="fa fa-user" aria-hidden="true">&nbsp; Username</i></p>
				<input type = "text" name = "username" value= "<?php if(isset($_POST["username"])) echo $_POST["username"]; ?>" placeholder = "Enter Username"></input>
				
				<br/>
				
				<!-- prompt user to enter password --> <!-- fa fa-lock is icon of the password -->
				<p><i class="fa fa-lock" aria-hidden="true">&nbsp; Password</i></p>
				<div class = "visible">
					<input type = "password" id = "password" name = "password" placeholder = "Enter Password">
					<span>
						<!-- fa fa-eye is icon of the password visible -->
						<i class="fa fa-eye" aria-hidden="true" id = "eye" onclick = "Toggle()"></i>
					</span>
				</div>
				
				<br/>
				
				<!-- after user have successfully enter their username and password , can press the submit button -->
				<input type = "hidden" name = "submitted" value = "true"/>
				<input type="submit" style="float:center" value='LOGIN' name="login_user"/>
				
				<!-- user who forgot the password can press the link -->
				<p class="register"><a href = "forgetPassword.php">Forgot Password</a></p>
				<p class="register"><small>Haven't Register ?</small>
				<!-- user who don't have the account can press the link to register-->
				<a href = "register.php"></small>Register Here</small></a></p>
			
			</form>
			
		</div>
		
		<!--Footer-->
		<?php
			require('footer.php');
		?>
		<!--End Footer-->
	
	
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
		
		
	</body>
</html>