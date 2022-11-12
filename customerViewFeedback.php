

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
	echo"<h1 align='center'>View Replied Feedback</h1>";
        
        $query = mysqli_query($combine, "SELECT * FROM feedback WHERE feedback.username = '$username'");
        $count = mysqli_num_rows($query);


                       if($count > 0)
                       {
                            echo "<div class='customers'>";
                            echo "<table align = 'center' width = '90%' border ='1'>";
                            echo "<tr align = 'center'>";
                            
                                echo"<th align='center'><font color = 'black'>No.</font></th>";
                                echo"<th align='center'><font color = 'black'>Customer Name</font></th>";
                                echo"<th align='center'><font color = 'black'>Email</font></th>";
                                echo"<th align='center'><font color = 'black'>Serivce</font></th>";
                                echo"<th align='center'><font color = 'black'>Suggestion</font></th>";
                                echo"<th align='center'><font color = 'black'>View Reply from Admin</font></th>";
                              //  echo"<th align='center'><font color = 'black'>Status</font></th>";

                            echo"</tr>";
                            //Retrieve and print every record
                            while($row = mysqli_fetch_array($query))
                            {

                                    echo"<tr>";


                                    echo"<td align = 'center'><font color = 'black'>{$row['feedback_ID']}</font></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['name']}</font></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['email']}</font></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['service']}</font></td>";
                                    echo"<td align = 'center'><font color = 'black'>{$row['suggestion']}</font></td>";
                                    echo"<td align = 'center'>";
                                    
                                    if($row['admin_reply'] == '' || $row['admin_reply'] == 'NULL')
                                    {
                                        echo "<font color ='red'>PENDING!</font></td>";
                                    }
                                    
                                    else{
                                        echo "<font color='green'>{$row['admin_reply']}</font></td>";
                                    }
                                  
                                    echo"</tr>";
 
                            }
                       }
                   
            echo"</table></div></div>";
			
            echo"<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />";
			
            include('footer.php');
?>