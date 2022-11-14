<?php
	
	session_start();
	
	include('bookshop_database.php');
	
	$admin_id = $_SESSION['admin_id'];
	
	if($admin_id == ''){
		header('location:adminlogin.php');
	}
	
	include('header_admin.php');
	
	$book_name=$_GET['book_name'];
	$book_author = $_GET['book_author'];
	$book_date = $_GET['book_date'];
	$book_isbn13 = $_GET['book_isbn13'];
	$book_description = $_GET['book_description'];
	$book_category = $_GET['book_category'];
	$book_trade_price = $_GET['book_trade_price'];
	$book_retail_price = $_GET['book_retail_price'];
	$book_quantity = $_GET['book_quantity'];
	
	$query = "SELECT * FROM book WHERE book_isbn13 = '$book_isbn13'";
	$result = mysqli_query($combine, $sql);
	$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	//edit user profile 
	$sqlEditing="UPDATE `book` SET `book_name`='$book_name',`book_author`='$book_author',
	`book_date`='$book_date',`book_isbn13`='$book_isbn13',`book_description`='$book_description',`book_category`='$book_category', `book_trade_price`='$book_trade_price', `book_retail_price`='$book_retail_price', `book_quantity`='$book_quantity' WHERE `book`.`book_isbn13`='$book_isbn13'";
		
		//successful edited
		if($combine->query($sqlEditing)===TRUE){
			
			echo"<script>alert('Stock successfully edited!');
			window.location='stocks_level.php'</script>";
		}else{
			//fail edit
			echo "<script>alert('Stock not successfully edited!');
			window.location='stocks_level.php'</script>";
			
		}	
		
	
?>
	
	
	
	