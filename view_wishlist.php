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
	include("bookshop_database.php");
	$username = $_SESSION['username'];
	
	if($username == ''){
		header('location:login.php');
	}
	
	include('header.php');
	include('sidebar.php');

	echo"<div class='main'>";
	
	echo"<h1 align='center'>Wishlist</h1>";
        
        $query = mysqli_query($combine, "SELECT * FROM wishlist WHERE wishlist.username = '$username'");
        $count = mysqli_num_rows($query);


                       if($count > 0)
                       {
                            echo "<div class='customers'>";
                            echo "<table align = 'center' width = '90%' border ='1'>";
                            echo "<tr align = 'center'>";
                            
								echo"<th align='center'><font color = 'white'>Book Cover</font></th>";
                                echo"<th align='center'><font color = 'white'>Book Name</font></th>";
								echo"<th align='center'><font color = 'white'>Book Author</font></th>";
                                echo"<th align='center'><font color = 'white'>Book Description</font></th>";
                                echo"<th align='center'><font color = 'white'>Category</font></th>";
                                echo"<th align='center'><font color = 'white'>Publishing Date</font></th>";
								echo"<th align='center'><font color = 'white'>Action</font></th>";

                            echo"</tr>";
                            //Retrieve and print every record
                            while($row = mysqli_fetch_array($query))
                            {

                                    echo"<tr>";

									echo"<td><img width='100' height='100' src='images/".$row['book_cover']."'></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['book_name']}</font></td>";
									echo"<td align = 'center'><font color = 'black'>{$row['book_author']}</font></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['book_description']}</font></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['book_category']}</font></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['book_date']}</font></td>";
									echo"<td align = 'center'><a onClick=\"javascript: return confirm('Are you sure you want to remove this book from wishlist?');\" href ='delete_wishlist.php?delete_wishlist=".$row['wishlist_id']."'><font color='red'>REMOVE</font></a></td>";
                                    echo"</tr>";
 
                            }
                       }
					   else{
						   echo"<center><b>Your wishlist is empty!</b></center>";
					   }
					   
                   
            echo"</table></div></div>";
			
            echo"<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
			
            include('footer.php');
?>