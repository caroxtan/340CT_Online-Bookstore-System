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
	<body>
		<header>
			<ul id="left-nav">
				<li><a href="view_books.php"><img src='Images/logo.png' alt='logo' width'50' height='50'/></a></li>
			</ul>
			
			<ul id="right-nav">
				 <?php
                        
                        if(isset($_SESSION['username'])){
							echo"<a href='view_wishlist.php'><img src='Images/wishlist.jpg' alt='Wishlist' width'25' height='25'/></a>";
							echo"&ensp; <a href='view_cart.php'><img src='Images/shopping_cart.png' alt='Shopping Cart' width'25' height='25'/></a>";
                            echo"&ensp; <a href='user_profile.php'>";
                            echo  $_SESSION['username'] ;
                            echo " </a>";
							echo"&nbsp; <a href='logout_user.php'>Log Out</a>";
                            /*echo "<i class='far fa-user-circle'></i>";*/
                        }
                        else{
                            echo"<a href='login.php' style='float: right margin-right: 10px; margin-bottom: 20px;'>Log in</a>";
							 echo"&nbsp;<a href='register.php' style='float: right margin-right: 10px; margin-bottom: 20px;'>Sign Up</a>";
                            /*echo "<i class='far fa-user-circle' ></i>";*/
                        }
                    ?>
			</ul>
			
		</header>
		
	</body>
</html>