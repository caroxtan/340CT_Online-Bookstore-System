<?php
	
	session_start();
	
	include('bookshop_database.php');
	
	$username = $_SESSION['username'];
	
	if($username == ''){
		header('location:login.php');
	}
	
	include('header.php');
	
	$book_isbn13=$_GET['wishlist'];
	
	$sqlWish = "SELECT * FROM wishlist WHERE book_isbn13 = '$book_isbn13' AND username = '$username'";
	$resultWish=mysqli_query($combine,$sqlWish);
	$rowWish=mysqli_fetch_array($resultWish, MYSQLI_ASSOC);
	if(mysqli_num_rows($resultWish)== 1)
	{
		$sqlEditing="UPDATE `cart` SET `quantity`='quantity' WHERE `cart`.`book_isbn13`='$book_isbn13'";
				
				//successful edited
				if($combine->query($sqlEditing)===TRUE){
					
					echo"<script>alert('Book is already in wishlist!');
					window.location='view_books.php'</script>";
				}else{
					//fail edit
					echo "<script>alert('Book quantity has not been successfully updated in wishlist!');
					window.location='view_books.php'</script>";
					
				}
	}
	else {
	
	$sql = "SELECT * FROM book WHERE book_isbn13 = '$book_isbn13'";
	$result = mysqli_query($combine, $sql);
	$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
	
				$sqlAdd="INSERT INTO wishlist
						(username, book_name, book_author, book_date, book_isbn13, book_description, book_category, book_retail_price, book_quantity, book_cover) VALUES
						('$username', '".$row['book_name']."', '".$row['book_author']."', '".$row['book_date']."', '".$row['book_isbn13']."', '".$row['book_description']."', '".$row['book_category']."', '".$row['book_retail_price']."', '".$row['book_quantity']."', '".$row['book_cover']."')";
				if($combine->query($sqlAdd)===TRUE){
			
					echo"<script>alert('Book successfully added to wishlist!');
					window.location='view_books.php'</script>";
				}else{
					//fail edit
					echo "<script>alert('Book not successfully added to wishlist!');
					window.location='view_books.php'</script>";
						
				}
			
	}
?>