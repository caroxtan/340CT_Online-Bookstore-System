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
		
		.cart {
		  background-color: #4CAF50;
		  border: none;
		  border-radius: 10px;
		  color: white;
		  padding: 5px 14px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		}
		
		.wish {
		  background-color: #008CBA;
		  border: none;
		  border-radius: 10px;
		  color: white;
		  padding: 5px 14px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		}
		
		
		.input {
			width: 17%;
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
	include('sidebar.php');
	echo"<div class='main'>";
	
	echo"<h1 align='center'>View Books</h1>";

	$max_columns = 4;
	//$query = "SELECT * FROM book ";
	$query = mysqli_query($combine, "SELECT * "
            . "FROM book ");
    $count = mysqli_num_rows($query);

	//if($r = mysqli_query($combine,$query))
	if($count > 0)
	{
       /*echo "<table align = 'center' width = '40%' border ='1'>";*/

		echo"<table align='center' width='80%'>";
		$i=0;
        //Retrieve and print every record
        while($row = mysqli_fetch_array($query))
        {
				
				if($i%2==0){
					echo "<tr>";
				}
                echo"<td><img width='150' height='220' src='images/".$row['book_cover']."'></td>";
				
				echo"<td width='40%'><b>{$row['book_name']}</b> <br /> {$row['book_description']} <br /><br /> Author: {$row['book_author']} <br /> Category: {$row['book_category']} <br /> Publishing Date: {$row['book_date']} <br /> Price: RM{$row['book_retail_price']} <br /><a href ='wishlist.php?wishlist=".$row['book_isbn13']."'><button class='wish'>Add to Wishlist</button></a> <br /><br />";
				
				if ($row['book_quantity'] == 0) {
					echo "<font color='red'>OUT OF STOCK!</font>";
				}
				else {
					echo "<a href ='add_to_cart.php?cart=".$row['book_isbn13']."'><button class='cart'>Add to Cart</a></button>";
		        }
				echo "</td>";
				
				if($i%2==1){
					echo "</tr>";
				}
				
				
				$i++;
			
		}  
        
	}

        echo "</table></div>";

		include('footer.php');
?>