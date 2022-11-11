<style>
		
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

<?php

	session_start();
	include("bookshop_database.php");
	$username = $_SESSION['username'];
	
	if($username == ''){
		header('location:login.php');
	}
	
	include('header.php');

	echo "<div class='sidenav'>";
		echo "<a href='view_books.php'><font color='black'><b>VIEW BOOKS</b></font></a>";
		echo "<a href='it_books.php'><font color='black'>Information Technology</font></a>";
		echo "<a href='cs_books.php'><font color='black'>Computer Science</font></a>";
	    echo "<a href='maths_books.php'><font color='black'>Mathematics</font></a>";
		echo "<a href='science_books.php'><font color='black'>Science</font></a>";
		echo "<a href='feedback.php'><font color='green'><b>FEEDBACK</b></font></a>";
	echo"</div>";
	echo"<div class='main'>";
	echo "<form method='post' action='checkout.php'>";
	echo"<h1 align='center'>Shopping Cart</h1>";

	//$query = "SELECT * FROM book ";
	$query = mysqli_query($combine, "SELECT * "
            . "FROM book ");
    $count = mysqli_num_rows($query);
	
	//if($r = mysqli_query($combine,$query))
	if($count > 0)
	{
	   echo "<div class='customers'>";
       echo "<table align = 'center' width = '90%' border ='1'>";
       echo "<tr align = 'center'>";
            //echo"<th align='center'></th>";
			echo"<th align='center'></th>";
            echo"<th align='center'>Book Cover</th>";
            echo"<th align='center'>Book Title</th>";
			echo"<th align='center'>Unit Price</th>";
            echo"<th align='center'>Quantity</th>";
            
        echo"</tr>";
        //Retrieve and print every record
        while($row = mysqli_fetch_array($query))
        {
           
                echo"<tr>";
				
                echo"<td align = 'center'><input type='checkbox' id='book".$row['book_id']."' name='book".$row['book_id']."' value='".$row['book_retail_price']."'  onclick='UpdateCost()'></td>";
				echo"<td align = 'center'><font color = 'black'><img width='100' height='100' src='images/".$row['book_cover']."' ></font></td>";
                echo"<td align = 'center'><font color = 'black'>{$row['book_name']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>RM{$row['book_retail_price']}</font></td>";
                echo"<td align = 'center'><input type='number' id='quantity".$row['book_id']."'; step='1' min='0' max='' value ='0' name='quantity[]' onchange='UpdateCost()'></td>";
	
				echo"</tr>";
		
		}
	}
		
        echo "</table></div></div>";
		
		echo "<center><br/ ><br />Total Price: RM<input name='total_price' id='total_price' type='text' readonly >";
		echo "<input type='hidden' name='submitted' value='true'>";
		echo "<br /><br /><input type='submit' name='submit' value='Checkout' class='button'>";
		echo "&nbsp; <input type='Reset' name='reset' value='Reset' class='button'>";
		
		echo"</form></center<br /><br /></div>";

		include('footer.php');
?>

 <script>
				function UpdateCost() {
				  var sum = 0;
				  var fd, gt, elem;
				 
				  for (i=1; i<11; i++) {
					fd = 'book'+i;
					gt = 'quantity'+i;
					elem = document.getElementById(fd);
					element = document.getElementById(gt);
					if (elem.checked == true) { sum += (Number(elem.value)* Number(element.value)); }
				  }
				  
				  document.getElementById('total_price').value = sum.toFixed(2);
				} 
				
				
			
	</script>