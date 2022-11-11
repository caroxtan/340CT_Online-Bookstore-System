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
	$quantity=$_GET['quantity'];
	$sql = "SELECT * FROM cart WHERE cart.username = '$username'";
    $result = mysqli_query($combine, $sql);
    $row= mysqli_fetch_array($result, MYSQLI_ASSOC);
	$query = "UPDATE cart SET quantity='$quantity' WHERE cart.username='$username'AND book_id = '$book_id'";
	
	$data=mysqli_query($combine,$query);
	
	if ($combine->query($query)===TRUE)
	{
		echo"<script>alert('Book sucessfully update from cart!');
		window.location='view_cart.php'</script>";
	}
	else
	{
		echo"<script>alert('Book was not sucessfully update from cart!');
		window.location='view_cart.php'</script>";
	}
?>