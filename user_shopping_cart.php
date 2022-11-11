<?php
	include("bookshop_database.php");
	session_start();
	//took record base on the username
	$username = $_SESSION['username'];
	if($username == ''){
		header('location:login.php');
	}
	$status="";
	if (isset($_GET['action']) && $_GET['action']=="remove"){
	if(!empty($_SESSION["shopping_cart"])) {
		foreach($_SESSION["shopping_cart"] as $key => $value) {
		  if($_GET["book_id"] == $key){
		  unset($_SESSION["shopping_cart"][$key]);
		  $status = "<div class='box' style='color:red;'>
		  Book is removed from your cart!</div>";
		  }
		  if(empty($_SESSION["shopping_cart"]))
		  unset($_SESSION["shopping_cart"]);
		  } 
	}
	}
	 
	if (isset($_GET['action']) && $_GET['action']=="change"){
	  foreach($_SESSION["shopping_cart"] as &$value){
		if($value['book_id'] === $_GET["book_id"]){
			$value['quantity'] = $_GET["quantity"];
			break; // Stop the loop after we've found the book
		}
	 }   
	}
	
?>
<html>
<head>
		<title>Shopping cart</title>
		<meta charset = "utf-8">
		
		
		 <!-- CSS -->
		<link rel = "stylesheet" href="css/themify-icon.css">
		<link rel = "stylesheet" type = "text/css" href = "profile.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	
	
	<style>
		.payment_btn{
			background-color:transparent;
			color: #FFD700;
			padding: 10px;
			margin: 10px 0;
			border: 2px solid #FFD700;
			width: 100%;
			border-radius: 10px;
			cursor: pointer;
			font-size: 20px;
			margin-top: 50px;
		}
		.payment_btn:hover
		{
			color: black;
			background-color: #FFD700;
			
		}
		.customers {
		  font-family: Arial, Helvetica, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		.customers td, #customers th {
		  border: 1px solid #ddd;
		  padding: 8px;
		}

		.customers tr:nth-child(even){background-color: #f2f2f2;}

		.customers tr:hover {background-color: #ddd;}

		.customers th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: center;
		  background-color: #157DEC;
		  color: white;
		}
		.sidenav {
		  width: 130px;
		  position: fixed;
		  z-index: 1;
		  top: 100px;
		  left: 10px;
		  bottom: 100px;
		  overflow-x: hidden;
		  padding: 8px 0;
		}

		.sidenav a {
		  padding: 6px 8px 6px 16px;
		  text-decoration: none;
		  color: #2196F3;
		  display: block;
		}

		.sidenav a:hover {
		  color: #064579;
		}

		.main {
		  margin-left: 140px; /* Same width as the sidebar + left position in px */
		  padding: 0px 10px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
		
		
	</style>
	</head>
	
	<body height="100%">
		<!-- Header-->
		<?php
			include('header.php');
		?>
		<!--End Header-->
		
	<div class='sidenav'>
		<a href='view_books.php'><font color='black'><b>VIEW BOOKS</b></font></a>
		<a href='it_books.php'><font color='black'>Information Technology</font></a>
		<a href='cs_books.php'><font color='black'>Computer Science</font></a>
	    <a href='maths_books.php'><font color='black'>Mathematics</font></a>
		<a href='science_books.php'><font color='black'>Science</font></a>
		<a href='feedback.php'><font color='green'><b>FEEDBACK</b></font></a>
	</div>
	
	<div class="cart">
	<?php 
		if(isset($_SESSION["shopping_cart"])){
		$total_price = 0;
	?>
		<table class="table" align='center' width='80%'>
			<tr>
				<th style="align:center;" colspan="5"><h2 style="font_size:+4">CART</h2></th>
			</tr>
			<tr>
				<td></td>
				<td  class="title">ITEM</td>
				<td  class="title">QUANTITY</td>
				<td  class="title">UNIT PRICE</td>
				<td  class="title">ITEMS TOTAL</td>
				
			</tr> 
			<?php 
			
				foreach ($_SESSION["shopping_cart"] as $book){
			?>
			<tr>
				<td>
					<img src='images/<?php echo $book["book_cover"]; ?>' width="100" height="150" />
				</td>
				<td>
					<?php echo $book["book_name"]; ?><br />
					<form method='post' action=''>
						<input type='hidden' name='book_id' value="<?php echo $book["book_id"]; ?>" />
						<input type='hidden' name='action' value="remove" />
						<button type='submit' class='remove'>Remove Item</button>
					</form>
				</td>
				<td>
					<form method='post' action=''>
						<input type='hidden' name='book_id' value="<?php echo $book["book_id"]; ?>" />
						<input type='hidden' name='action' value="change" />
					<!--<select name='quantity' class='quantity' onChange="this.form.submit()">-->
					<input type="number" id="quantity" name="quantity" min="1" max="5">
					<?php
						for ($book["quantity"] = 1; $book["quantity"] <= $book["book_quantity"]; $book["quantity"]++) {?>
						 <option value="<?php $book["quantity"]?> "> <?php $book["quantity"]?>
								</option>
						<?php
						}
					?>
						
					</select>
					</form>
				</td>
				<td>
					<?php echo "RM".$book["price"]; ?>
				</td>
				<td>
					<?php echo "RM".$book["price"]*$book["quantity"]; ?>
				</td>
			</tr>
			<?php
				$total_price += ($book["price"]*$book["quantity"]);
			}
			?>
			<tr>
				<td colspan="5" align="right">
				<strong>TOTAL: <?php echo "RM".$total_price; ?></strong>
				</td>
			</tr>
			<tr>
				<td colspan="5" align="right">
				<a href="payment.php" name ="payment" class="payment_btn">CheckOut</a>
				</td>
			</tr>
		</table> 
		<?php
		}else{
		 echo "<h3 align='center'>Your cart is empty!</h3>";
		 }
		?>
	</div>
	
		<div style="clear:both;"></div>
		 
		<div class="message_box" style="margin:10px 0px;">
		<?php echo $status; ?>
</div>
		<!--Footer-->
		<?php
		include('footer.php');
		?>
		<!--End Footer-->
</body>
</html>