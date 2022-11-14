<style>
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

<?php
	
	session_start();
	
	include('bookshop_database.php');
	
	$admin_id = $_SESSION['admin_id'];
	
	if($admin_id == ''){
		header('location:adminlogin.php');
	}
	
	include('header_admin.php');
	
	$book_isbn13=$_GET['edit'];
	$sql = "SELECT * FROM book WHERE book_isbn13 = '$book_isbn13'";
	$result = mysqli_query($combine, $sql);
	$row= mysqli_fetch_array($result, MYSQLI_ASSOC);

	echo "<div class='sidenav'>";
		echo "<a href='add_stock.php'><font color='green'><b>ADD STOCK</b></font></a>";
		echo "<a href='stocks_level.php'><font color='black'><b>STOCKS LEVEL</b></font></a>";
		echo "<a href='it_book_list.php'><font color='black'>Information Technology</font></a>";
		echo "<a href='cs_book_list.php'><font color='black'>Computer Science</font></a>";
	    echo "<a href='maths_book_list.php'><font color='black'>Mathematics</font></a>";
		echo "<a href='science_book_list.php'><font color='black'>Science</font></a>";
	echo"</div>";
	echo"<div class='main'>";
	
	echo"<h1 align='center'>Edit Stock</h1>";
	
	$current_date = date("Y-m-d");

	echo"<div class='form-style-5'>";
	echo"<form action='edit_stock2.php' method = 'get' enctype='multipart/form-data'>";
	
	echo "<input type='hidden' name='submitted' value='true'>";
	
	echo "<center>";
    echo"<label>Book Name:</label>";
    echo"<br /><input type='text' id='book_name' name='book_name' placeholder='Book Name' value='".$row['book_name']."'; size='50'>";
	
	echo"<br /><br /><label>Book Author:</label>";
    echo"<br /><input type='text' id='book_author' name='book_author' placeholder='Book Author' value='".$row['book_author']."' size='50'>";
	
	echo"<br /><br /><label>Publication Date:</label>";
    echo"<br /><input type='date' id='book_date' name='book_date' placeholder='Publication Date' max='$current_date' value='".$row['book_date']."' size='50'>";
	
	echo"<br /><br /><label>ISBN-13 Number:</label>";
    echo"<br /><input type='text' id='book_isbn13' name='book_isbn13' placeholder='ISBN-13 Number' value='".$row['book_isbn13']."'  size='50' readonly>";
	
	echo"<br /><br /><label>Book Description:</label>";
	echo"<br /><textarea rows = '5' cols = '48' id='book_description' name='book_description' placeholder='Book Description'>".$row['book_description']."</textarea>";
	
	echo"<br /><br /><label>Book Category:</label>";
    echo"<br /><input type='text' id='book_category' name='book_category' placeholder='Book Category' value='".$row['book_category']."' size='50'>";
	
	echo"<br /><br /><label>Trade Price:</label>";
	echo"<br /><input type='range' min='1' max='100' value='".$row['book_trade_price']."' name='book_trade_price' id='book_trade_price' onchange='showRangeValueTrade(this.value)' >";
	echo"<input type='text' id='trade_price' value='".$row['book_trade_price']."' readonly>";
	
	echo"<br /><br /><label>Retail Price:</label>";
	echo"<br /><input type='range' min='1' max='100' value='".$row['book_retail_price']."' name='book_retail_price' id='book_retail_price' onchange='showRangeValueRetail(this.value)' >";
	echo"<input type='text' id='retail_price' value='".$row['book_retail_price']."' readonly>";
	
	echo"<br /><br /><label>Quantity:</label>";
	echo"<br /><input type='range' min='1' max='20' value='".$row['book_quantity']."' name='book_quantity' id='book_quantity' onchange='showRangeValueQuantity(this.value)' >";
	echo"<input type='text' id='quantity' value='".$row['book_quantity']."' readonly>";
	
	echo "<br /><br /><input type='submit' name='submit' value='Submit' onClick=\"javascript: return confirm('Are you sure you want to update?');\">";
	echo"</form></div></div>";
	echo"</center>";
	
	echo"<br />";
	
	include('footer.php');

?>

	<script>
		function showRangeValueTrade(val){
			document.getElementById('trade_price').value=val
		}
		
		function showRangeValueRetail(val){
			document.getElementById('retail_price').value=val;
		}
		
		function showRangeValueQuantity(val){
			document.getElementById('quantity').value=val;
		}
	</script>
	


