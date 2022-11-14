<html>
	<head>
		<title>Bookshop Admin</title>
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
		</style>
	</head>
	<body>
		<header>
			<ul id="left-nav">
				<li><a href="stocks_level.php"><img src='Images/logo.png' alt='logo' width'50' height='50'/></a></li>
			</ul>

			
			<ul id="right-nav">
				<?php
                        
                        if(isset($_SESSION['admin_id'])){
                            /*echo"<a href='logout_admin.php' style='float: right;'>Log Out</a>";*/
                            /*echo"<a href='admin_profile.php' style='float: right margin-right: 50px;'>";*/
							echo"<a href='admin_profile.php'>";
                            echo  $_SESSION['admin_id'];
                            echo " </a>";
							echo"&nbsp; <a href='logout_admin.php'>Log Out</a>";
                            /*echo "<i class='far fa-user-circle'></i>";*/
                        }
                        else{
                            echo"<a href='adminlogin.php' style='float: right margin-right: 60px; margin-bottom: 20px;'>Log in</a>";
							 echo"&nbsp;<a href='admin_register.php' style='float: right margin-right: 10px; margin-bottom: 20px;'>Sign Up</a>";
							 /*echo "<i class='far fa-user-circle' ></i>";*/
                        }
                    ?>
			</ul>
		</header>