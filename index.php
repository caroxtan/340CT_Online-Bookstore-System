<html>
	<head>
		<title>Book Shop</title>
		<link href="css/style.css" rel="stylesheet" type"text/css">
		<style>
			.account{
				float: right;
				margin-top: -50px;
				margin-right: 10px;
			}
			.fa-user-circle{
				font-size:38px; 
				float:right; 
				color: white;
				margin-right: 15px;
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
	<body>
		<header>
			<ul id="left-nav">
				<li><a href="index.php"><img src='Images/logo.png' alt='logo' width'50' height='50'/></a></li>
			</ul>
			
			<ul id="right-nav">
				 <?php
                        
                            echo"<a href='login.php' style='float: right margin-right: 10px; margin-bottom: 20px;'>Log in</a>";
							 echo"&nbsp;<a href='register.php' style='float: right margin-right: 10px; margin-bottom: 20px;'>Sign Up</a>";
                            echo "<i class='far fa-user-circle' ></i>";
                    ?>
			</ul>
		</header>
	</body>
</html>

<?php
	
	include('bookshop_database.php');
	
	echo "<div class='sidenav'>";
		echo "<a href='index.php'><font color='black'><b>VIEW BOOKS</b></font></a>";
		echo "<a href='it_books_lite.php'><font color='black'>Information Technology</font></a>";
		echo "<a href='cs_books_lite.php'><font color='black'>Computer Science</font></a>";
	    echo "<a href='maths_books_lite.php'><font color='black'>Mathematics</font></a>";
		echo "<a href='science_books_lite.php'><font color='black'>Science</font></a>";
	echo"</div>";
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
				
                echo"<td><img width='150' height='200' src='images/".$row['book_cover']."'></td>";
				
				echo"<td width='40%'><b>{$row['book_name']}</b> <br /> {$row['book_description']} <br /><br /> Category: {$row['book_category']} <br /> Publishing Date: {$row['book_date']} <br /> Price: RM{$row['book_retail_price']}";
				
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