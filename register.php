<!DOCTYPE html>

<?php
	
	include("bookshop_database.php");
	//register user
	if(isset($_POST['submit']))
	{
		$username =  $_POST['username'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$CFpassword = $_POST['CFpassword'];
		
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);
		
		$username=mysqli_real_escape_string($combine, $username);
		$email=mysqli_real_escape_string($combine, $email);
		$password=mysqli_real_escape_string($combine, $password);
		$password=$password;
		
		//Validation
		//Username validation
			if(empty($username))
			{
				echo"<script>alert('Please enter your username!')</script>";
			}
			
			//Email validation
			else if (empty($email))
			{
				echo"<script>alert('Please enter your email!')</script>";
			}
			else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				echo"<script>alert('Invalid Email!')</script>";
			}
			
			//contact number validation
			else if (empty($contact))
			{
				echo"<script>alert('Please enter your contact number!')</script>";
			}
			else if (!preg_match("/^[0-9]{3}-[0-9]{7}$/", $contact) && !preg_match("/^[0-9]{3}-[0-9]{8}$/", $contact))
			{
				echo"<script>alert('Please enter your contact number in numberic!(e.g: 012-3456789)')</script>";
			}
			
			//date validation
			else if (empty($dob))
			{
				echo"<script>alert('Please choose your date of birth!')</script>";
			}
			
			//address validation
			else if (empty($address))
			{
				echo"<script>alert('Please enter your address!')</script>"; 
			}
			
			//password validation
			else if (empty($password))
			{
				echo"<script>alert('Please enter your password')</script>";
			}
			else if (strlen($password) <'8') 
			{
				echo "<script>alert('Enter your password at least contain 8 Characters!')</script>";
			}
			else if (strlen($password) >'16') 
			{
				echo "<script>alert('Enter your password not more than 16 Characters!')</script>";
			}
			elseif(!preg_match("#[0-9]+#",$password)) 
			{
				echo "<script>alert('Enter password at least contain 1 Number !')</script>";
			}
			
			//comfirm password validation
			else if (empty($CFpassword))
			{
				echo"<script>alert('Please comfirm your password!')</script>";
			}
			else if (strlen($CFpassword) <='8') 
			{
				echo "<script>alert('Enter your password at least contain 8 Characters!')</script>";
			}
			else if (strlen($CFpassword) >'16') 
			{
				echo "<script>alert('Enter your password not more than 16 Characters!')</script>";
			}
			elseif(!preg_match("#[0-9]+#",$CFpassword)) 
			{
				echo "<script>alert('Enter password at least contain 1 Number !')</script>";
			}
			elseif(!preg_match("#[A-Z]+#",$CFpassword)) 
			{
				echo "<script>alert('Enter password at least contain 1 Capital Letter!')</script>";
			}
			elseif(!preg_match("#[a-z]+#",$CFpassword)) 
			{
				echo "<script>alert('Enter password at least contain 1 Lowercase Letter!')</script>";
			}
		else{
		  // first check the database to make sure 
		  // a user does not already exist with the same username
		  echo"<script>alert('You have entered strong password')</script>";
			//validation if the username had been record in database
			$sql="SELECT username FROM user WHERE username='$username'";
			$result=mysqli_query($combine,$sql);
			$row=mysqli_fetch_array($result, MYSQLI_ASSOC);
			if(mysqli_num_rows($result)== 1)
			{
				//message when data had record in database
				echo "<script>alert('Sorry... This username had already used. Please try another.');
					window.location='register.php'</script>";
			}
				//store new record
			else if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']))
			{
				//success store data and display message
				$query = mysqli_query($combine, "INSERT INTO user
				(username, email, contact, dob, address, password) VALUES
				('$username', '$email', '$contact', '$dob', '$address', '$password')");
				if ($query)
				{
					$_SESSION['username'] = $username;
					//$_SESSION['success'] = "You are now logged in";
					echo "<script>alert('Your account had been success key in.');
					window.location='login.php'</script>";
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

<html lang="en">

<head>
	
		<title>Register</title>
		<meta charset = "utf-8">
		
		<link rel = "stylesheet" href="register_login.css">
		<link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	
	</head>
	
	<body>
	
		<!-- include navibar.php -->
		<?php
			include('header.php');
		?>
		
		<!-- Form Division -->
		<br /><br />
		
			<div class = "form">
		
			<form method = "POST" action = "register.php">
			
				<h3><center>Register</center></h3>
			
				<!-- Username -->
				<label><span class ="red">*</span><i class="fa fa-user" aria-hidden="true">&nbsp; Username : </i></label>
				<br>
				<input type = "text" name ="username" size="40" value= "<?php if(isset($_POST["username"])) echo $_POST["username"]; ?>" placeholder = "Enter your username"/>
				
				<br>
				
				<!-- Email -->
				<label><span class = "red">*</span><i class="fa fa-envelope" aria-hidden="true">&nbsp; Email : </i></label>
				<br>
				<input type = "text" name = "email" size = "40" value= "<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>" placeholder = "Enter your email"/>
				
				<br>
				
				<!-- Contact Number -->
				<label><span class = "red">*</span><i class="fa fa-phone" aria-hidden="true">&nbsp; Contact Number : </i></label>
				<br>
				<input type = "text" name = "contact" size = "30" value= "<?php if(isset($_POST["contact"])) echo $_POST["contact"]; ?>" placeholder = "Enter your contact number"/>
				
				<br>
				
				<!-- Date of Birth -->
				<label>&nbsp;&nbsp;<i class="fa fa-calendar" aria-hidden="true"> &nbsp;Date of Birth :</i></label>
				<br>
				<?php
					echo"<input type = 'date' name = 'dob' max='2009-12-31'/>"
				?>
				
				<br>
				
				<!-- Address -->
				<label><span class = "red">*</span><i class="fa fa-home" aria-hidden="true"> &nbsp;Address : </i></label>
				<br>
				<input type = "text" name = "address" size = "60" value= "<?php if(isset($_POST["address"])) echo $_POST["address"]; ?>" placeholder = "Enter your address"/>
				
				<br>
				
				<!-- Password -->
				<label><span class = "red">*</span><i class="fa fa-lock" aria-hidden="true"> &nbsp;Password : </i></label>
				<br>
				
				<!-- Password Visibility -->
				<div class = "visible">
					<input type = "password" name = "password" id = "password" placeholder = "Enter Password"/> 
					<i class="fa fa-eye" aria-hidden="true" id = "eye" onclick = "Toggle()"></i>
				</div>
				
				<br>
				
				<!-- Comfirm Password -->
				<label><span class = "red">*</span><i class="fa fa-lock" aria-hidden="true">&nbsp; Confirm Password : </i></label>
				<br>
				
				<!-- Comfirm Password Visibility -->
				<div class = "visible">
					<input type = "password" name = "CFpassword" id = "CFpassword" placeholder = "Enter your comfirm password"/>
					<i class="fa fa-eye" aria-hidden="true" id = "eye" onclick = "CFToggle()"></i>
				</div>
				<br>
				
				<!-- Policy -->
				<p class="policy">When clicking Register button, you agree and consent to the processing
						of your personal data in accordance with the terms of our Privacy Policy.
						
						<br><br>
						
						Already have an account ? <a href = "login.php">Login</a></p>
						
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
			
			function CFToggle() 
			{ 
				var temp = document.getElementById("CFpassword"); 
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
		
		<!-- Footer -->
		<?php	
			include("footer.php");
		?>
		<!-- End Footer -->
		
	</body>
	
</html>