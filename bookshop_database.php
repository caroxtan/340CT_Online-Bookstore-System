<?php

	$datab_mysql="bookshop_database"; //Name of database

	//Connect and select the database created
	$combine = mysqli_connect("localhost","root","") or die
		("Sorry...Could not select database.");
		
	mysqli_select_db($combine, $datab_mysql) or die
		("Sorry..You didn't select the database.");
	
?>