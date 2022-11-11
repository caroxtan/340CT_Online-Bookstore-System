<?php
	
	session_start();
	
	include('bookshop_database.php');
	
	$username = $_SESSION['username'];
	$book_id = $_SESSION['book_id'];
	if($username == ''){
		header('location:login.php');
	}
	
	include('header.php');
	$book_id = $_GET['book_id'];
	$cart_id=$_GET['delete_cart'];
	$query = "DELETE FROM cart WHERE cart.username='$username'AND book_id = '$book_id'";
	
	$data=mysqli_query($combine,$query);
	
	if ($data)
	{
		echo"<script>alert('Book sucessfully removed from cart!');
		window.location='view_cart.php'</script>";
	}
	else
	{
		echo"<script>alert('Book was not sucessfully removed from cart!');
		window.location='view_cart.php'</script>";
	}
?>
	
	
	
	