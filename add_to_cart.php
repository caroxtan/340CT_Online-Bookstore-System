<?php
	
	session_start();
	
	include('bookshop_database.php');
	
	$username = $_SESSION['username'];
	
	if($username == ''){
		header('location:login.php');
	}
	
	include('header.php');
	
	$book_isbn13=$_GET['cart'];
	
	
	
	$sqlCart = "SELECT * FROM cart WHERE book_isbn13 = '$book_isbn13' AND username = '$username'";
	$resultCart=mysqli_query($combine,$sqlCart);
	$rowCart=mysqli_fetch_array($resultCart, MYSQLI_ASSOC);
	if(mysqli_num_rows($resultCart)== 1)
	{

		$new_quantity = $rowCart['quantity'] + 1;
		
		if ($new_quantity > $rowCart['book_quantity']) {
			echo "<script>alert('Not enough book stock available!');
					window.location='view_books.php'</script>";
			$rowCart['quantity']--;
		}
		else{
		$sqlEditing="UPDATE `cart` SET `quantity`=$new_quantity WHERE `cart`.`book_isbn13`='$book_isbn13'";
				
				//successful edited
				if($combine->query($sqlEditing)===TRUE){
					
					echo"<script>alert('Book quantity increased by 1!');
					window.location='view_books.php'</script>";
				}else{
					//fail edit
					echo "<script>alert('Book not successfully added to shopping cart!');
					window.location='view_books.php'</script>";
					
				}
		}
	}
	else {
	
	$sql = "SELECT * FROM book WHERE book_isbn13 = '$book_isbn13'";
	$result = mysqli_query($combine, $sql);
	$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
	
				$sqlAdd="INSERT INTO cart
						(username, book_id, book_name, book_cover, book_isbn13, book_retail_price, book_quantity, quantity) VALUES
						('$username', '".$row['book_id']."', '".$row['book_name']."', '".$row['book_cover']."', '".$row['book_isbn13']."', '".$row['book_retail_price']."', '".$row['book_quantity']."', 1)";
				if($combine->query($sqlAdd)===TRUE){
			
					echo"<script>alert('Book successfully added to shopping cart!');
					window.location='view_books.php'</script>";
				}else{
					//fail edit
					echo "<script>alert('Book not successfully added to shopping cart!');
					window.location='view_books.php'</script>";
						
				}
			
	}
?>