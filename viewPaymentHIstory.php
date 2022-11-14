

<!--validation for username and password-->
<?php
	session_start();
	
	include('bookshop_database.php');
	
	$username = $_SESSION['username'];
	
	if($username == ''){
		header('location:login.php');
	}
	
	include('header.php');
	include('sidebar.php');
	echo"<div class='main'>";
	echo"<h1 align='center'>View Payment History</h1>";
        
        $query = mysqli_query($combine, "SELECT * FROM cart WHERE cart.username = '$username'");
        $count = mysqli_num_rows($query);


                       if($count > 0)
                       {
                            echo "<div class='customers'>";
                            echo "<table align = 'center' width = '90%' border ='1'>";
                            echo "<tr align = 'center'>";
                            
                                echo"<th align='center'><font color = 'black'>Book Name</font></th>";
                                echo"<th align='center'><font color = 'black'>Book Cover</font></th>";
                                echo"<th align='center'><font color = 'black'>Bookd Retail Price</font></th>";
                                echo"<th align='center'><font color = 'black'>Quantity</font></th>";

                            echo"</tr>";
                            //Retrieve and print every record
                            while($row = mysqli_fetch_array($query))
                            {

                                    echo"<tr>";

                                    echo"<td align = 'center'><font color = 'black'>{$row['book_name']}</font></td>";
							echo"<td align = 'center'><font color = 'black'><img width='150' height='200' src='images/".$row['book_cover']."' /></font></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['book_retail_price']}</font></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['quantity']}</font></td>";
 
                            }
                       }
                   
            echo"</table></div></div>";
			
            echo"<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
			
            include('footer.php');
?>