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
		<!--onCLick on edit button-->
		<script language ="javascript">
		function validateForm(formObj) {  
		   
		   if (formObj.quantity.value=='') { 
				var button = document.getElementById('edit')
				return false;  
			}
			if (formObj.book_id.value=='') { 
				var button = document.getElementById('edit')
				return false;  
			}
			
			formObj.submitButton.disabled = true;    
			return true;  
	   
	  
		} 
		</script>	
<?php

	session_start();
	include("bookshop_database.php");
	$username = $_SESSION['username'];
	
	if($username == ''){
		header('location:login.php');
	}
	

	include('header.php');
	include('sidebar.php');

	echo"<div class='main'>";
	//echo "<form method='post' action='complete_order.php'>";
	echo"<h1 align='center'>Add to Cart</h1>";
        
        $query = mysqli_query($combine, "SELECT * FROM cart WHERE cart.username = '$username'");
        $count = mysqli_num_rows($query);


                       if($count > 0)
                       {
                            echo "<div class='customers'>";
                            echo "<table align = 'center' width = '90%' border ='1'>";
                            echo "<tr align = 'center'>";
							
                                echo"<th align='center'><font color = 'white'>Book Cover</font></th>";
								echo"<th align='center'><font color = 'white'>Book Name</font></th>";
                                echo"<th align='center'><font color = 'white'>Unit Price</font></th>";
                                echo"<th align='center'><font color = 'white'>Quantity</font></th>";
								echo"<th align='center'><font color = 'white'>Action</font></th>";

                            echo"</tr>";
                            //Retrieve and print every record
                            while($row = mysqli_fetch_array($query))
                            {
									$book_id=$row['book_id'];
									$_SESSION['book_id']=$book_id;
                                    echo"<tr>";
									//$qty=$row['quantity'];
                                    echo"<td align = 'center'><img width='100' height='100' src='images/".$row['book_cover']."'></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['book_name']}</font></td>";
									echo"<td align = 'center'><font color = 'black'>{$row['book_retail_price']}</font></td>";
									echo"<td align = 'center'>";
									//quantity
									echo"<form action = 'update_cart.php?book_id=".$row['book_id']."' method='GET'  onsubmit='return validateForm(this);'>";
										echo"<input type='hidden' name='book_id' value=" .$row['book_id']. " />";
										echo"<input type='hidden' name='action' value='change' >";
										echo"<input type='number' name='quantity' value='".$row['quantity']."' min='1' max='".$row['book_quantity']."' placeholder='Quantity' required />";
										echo"<input button type = 'submit' name = 'update' onsubmit='this.disabled=true;' id='edit' value = 'Edit Quantity'/>";
										echo"</input>";
										echo"</input>";
										echo"</input>";
									echo"</form>";
													//echo"<form action = 'update_cart.php' method='GET'  onsubmit='return validateForm(this);'>";
									//echo"<input class='input' type='number' id='quantity' value ='".$row['quantity']."' name='quantity' min='1' max='".$row['book_quantity']."' >";
									//$row['quantity']=$qty;
									//echo"<a href ='update_cart.php?update_cart=".$row['cart_id']. "&quantity=".$row['quantity']."'>Edit Quantity</a>";
									//echo"<input button type = 'submit' name = 'update' onsubmit='this.disabled=true;' id='edit' value = 'Edit Quantity'/>";
									echo"</td>";
									echo"<td align = 'center'><a onClick=\"javascript: return confirm('Are you sure you want to remove this book from cart?');\" href ='delete_cart.php?delete_cart=".$row['cart_id']."&book_id=".$row['book_id']."'><font color='red'>REMOVE</font></a></td>";
                                    echo"</tr>";
 
                            }
                       }
                   
            echo"</table></div></div>";
			
			$total = mysqli_query($combine, "SELECT SUM(book_retail_price*quantity) FROM cart WHERE cart.username = '$username'");
			
			while($rowTotal = mysqli_fetch_array($total))
            {
			echo "<center><br/ ><br />Total Price: RM<input name='total_price' id='total_price' type='text' value='".$rowTotal['SUM(book_retail_price*quantity)']."' readonly >";
			}
			
			echo "<input type='hidden' name='submitted' value='true'>";
			echo"<br><br><a href ='complete_order.php'><button class='button'>Checkout</font></a></button></td>";
                           
			//echo "<br /><br /><input type='submit' name='submit' value='Checkout' class='button'>";
			echo "&nbsp; <a href='view_books.php'><button class='button'>Back to View Books</button></a>";
			
            echo"<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
			
            include('footer.php');
			
			

?>
