<!DOCTYPE html>

<?php

	session_start();
	include("bookshop_database.php");
	$username = $_SESSION['username'];
	
	if($username == '')
	{
		header('location:login.php');
	}
	
	include('header.php');
	include('sidebar.php');
	
	if(isset($_POST['submitted']))
	{
		$fname          = $_POST['fname'];
		$lname          = $_POST['lname'];
		$contact_number = $_POST['contact_number'];
		$address        = $_POST['address'];
		$city           = $_POST['city'];
		$country        = $_POST['country'];
		$state          = $_POST['state'];
		$zip_code       = $_POST['zip_code'];
		
		$number = preg_match('@[0-9]@', $zip_code);
		
		$valid = true;
		
		$fname          = mysqli_real_escape_string($combine, $fname);
		$lname          = mysqli_real_escape_string($combine, $lname);
		$contact_number = mysqli_real_escape_string($combine, $contact_number);
		$address        = mysqli_real_escape_string($combine, $address);
		$city           = mysqli_real_escape_string($combine, $city);
		$country        = mysqli_real_escape_string($combine, $country );
		$state          = mysqli_real_escape_string($combine, $state);
		$zip_code       = mysqli_real_escape_string($combine, $zip_code);
		
			//Validation
			//First name validation
			if(empty($fname))
			{
				echo"<script>alert('Please enter your first name!')</script>";
			}
			//Last name validation
			else if(empty($lname))
			{
				echo"<script>alert('Please enter your last name!')</script>";
			}
			//Contact number validation
			else if(empty($contact_number))
			{
				echo"<script>alert('Please enter your contact number!')</script>";
			}
			else if (!preg_match("/^[0-9]{3}-[0-9]{7}$/", $contact_number) && !preg_match("/^[0-9]{3}-[0-9]{8}$/", $contact_number))
			{
				echo"<script>alert('Please enter your contact number in numberic!(e.g: 012-3456789)')</script>";
			}
			//Address validation
			else if (empty($address))
			{
				echo"<script>alert('Please enter your address!')</script>"; 
			}
			//City validation
			else if (empty($city))
			{
				echo"<script>alert('Please enter your city!')</script>"; 
			}
			//Country validation
			else if (empty($country))
			{
				echo"<script>alert('Please enter your country!')</script>"; 
			}
			//State validation
			else if (empty($state))
			{
				echo"<script>alert('Please enter your state!')</script>"; 
			}
			//ZIP code validation
			else if (empty($zip_code))
			{
				echo"<script>alert('Please enter your ZIP code!')</script>"; 
			}
			else if (!preg_match("/^[0-9]{5}(?:-[0-9]{4})?$/", $zip_code))
			{
				echo"<script>alert('Please enter your ZIP code in numberic!(e.g: 11500)')</script>";
			}
			else
			{
				//Success store data and display message
                $query = mysqli_query($combine, "INSERT INTO shipping
                (fname, lname, contact_number, address, city, country, state, zip_code) VALUES
                ('$fname', '$lname', '$contact_number', '$address', '$city', '$country', '$state', '$zip_code')");
                if ($query)
                {
                     echo"<script>alert('You have successfully enter shipping details!');
                     window.location='payment.php'</script>";

                }
			}
	}	

?>

<html lang="en">

	<head>
	
		<meta charset="utf-8">
		<title>Shipping Address</title>
	
	</head>
	
	<body>
	
		<h1 align = "center">Shipping Address</h1>
	
		<div class='form-style-5'>
			
			<form method = "POST" action ="shippingAddress.php">
			
			<fieldset>
				
				<label for='fname'>First Name</label>
				<input type = "text" id = "fname" name = "fname" size = "50" value= "<?php if(isset($_POST["fname"])) echo $_POST["fname"]; ?>" placeholder = "John"/>
				<label for='lname'>Last Name</label>
				<input type = "text" id = "lname" name = "lname" size = "49" value= "<?php if(isset($_POST["fname"])) echo $_POST["fname"]; ?>" placeholder = "Tan"/>
				
				<br/>
				
				<label for='contact_number'>Contact Number</label>
				<input type = "text" id = "contact_number" name = "contact_number" size = "108" value= "<?php if(isset($_POST["contact"])) echo $_POST["contact"]; ?>" placeholder = "016 - 4786343">
				
				<br/>
				
				<label for='address'>Address</label>
				<input type = "text" id = "address" name = "address" size = "108" value= "<?php if(isset($_POST["address"])) echo $_POST["address"]; ?>" placeholder = "12 Jalan Hijau">
				
				<br/>
				
				<label for='city'>City</label>
				<input type = "text" id = "city" name = "city" size = "108" value= "<?php if(isset($_POST["city"])) echo $_POST["city"]; ?>" placeholder = "Georgetown">
				
				<br/>
				
				<label for='country'>Country</label>
				<input type = "text" id = "country" name = "country" size = "30" value= "<?php if(isset($_POST["country"])) echo $_POST["country"]; ?>" placeholder = "Malaysia">
				
				<label for='state'>State</label>
				<input type = "text" id = "state" name = "state" size = "30" value= "<?php if(isset($_POST["state"])) echo $_POST["state"]; ?>" placeholder = "Penang">
				
				<label for='state'>ZIP Code</label>
				<input type = "text" id = "zip_code" name = "zip_code" size = "30" value= "<?php if(isset($_POST["zipCode"])) echo $_POST["zipCode"]; ?>" placeholder = "11700">
				
				<br/>
				
				<input type='submit' name='submit' value='Next'/>
                <input type='hidden' name='submitted' value='true'/>
				
			</fieldset>
				
			</form>
		
		</div>
		
	<?php	
			include("footer.php");
	?>

</html>