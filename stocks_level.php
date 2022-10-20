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
	
	include('bookshop_database.php');
	
	$admin_id = $_SESSION['admin_id'];
	
	if($admin_id == ''){
		header('location:adminlogin.php');
	}
	
	include('header_admin.php');

	echo "<div class='sidenav'>";
		echo "<a href='add_stock.php'><font color='green'><b>ADD STOCK</b></font></a>";
		echo "<a href='stocks_level.php'><font color='black'><b>STOCKS LEVEL</b></font></a>";
		/*echo "<a href='it_book_list.php'><font color='black'>Information Technology</font></a>";
		echo "<a href='cs_book_list.php'><font color='black'>Computer Science</font></a>";
	    echo "<a href='maths_book_list.php'><font color='black'>Mathematics</font></a>";
		echo "<a href='science_book_list.php'><font color='black'>Science</font></a>";*/
		echo "<a href='adminViewFeedback.php'><font color='green'><b>FEEDBACK LIST</b></font></a>";
	echo"</div>";
	echo"<div class='main'>";
	echo"<h1 align='center'>Stocks Level</h1>";
	
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
            echo"<th align='center'>Book Cover</th>";
            echo"<th align='center'>Book Title</th>";
			echo"<th align='center'>Book Category</th>";
            echo"<th align='center'>ISBN-13 Number</th>";
            echo"<th align='center'>Quantity in Stock</th>";
			echo"<th align='center'>Action</th>";
			echo"<th align='center'>Status</th>";
            
        echo"</tr>";
        //Retrieve and print every record
        while($row = mysqli_fetch_array($query))
        {
           
                echo"<tr>";
                
				echo"<td align = 'center'><font color = 'black'><img width='100' height='100' src='images/".$row['book_cover']."' ></font></td>";
                echo"<td align = 'center'><font color = 'black'>{$row['book_name']}</font></td>";
				echo"<td align = 'center'><font color = 'black'>{$row['book_category']}</font></td>";
                echo"<td align = 'center'><font color = 'black'>{$row['book_isbn13']}</font></td>";
                echo"<td align = 'center'><font color = 'black'>{$row['book_quantity']}</font></td>";
				echo"<td align = 'center'><a href ='addon_stock.php?addon=".$row['book_isbn13']."'><font color='green'>ADD</font></a> <br /><br /> <a href ='edit_stock.php?edit=".$row['book_isbn13']."'><font color='blue'>EDIT</font></a> <br /><br /> <a onClick=\"javascript: return confirm('Are you sure you want to delete?');\" href ='delete_stock.php?delete=".$row['book_isbn13']."'><font color='red'>DELETE</font></a></td>";
				echo"<td align = 'center'>";
				

				if ($row['book_quantity'] < "10") {
					echo "<font color='red'>LOW!</font></td>";
				}
				else 
					echo "<font color='green'>Normal</font></td>";
		        }
				echo"</td>";
        }
		
        echo "</table></div></div>";
		
		include('footer.php');
		

?>
