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
        
        $feedback_ID=$_GET['reply'];
        
       /* $name = $_GET['name'];
        $email = $_GET['email'];
        $service = $_GET['service'];
        $suggestion = $_GET['suggestion'];
        $admin_reply = $_POST['admin_reply'];*/
        
        $sql = "SELECT * FROM feedback WHERE feedback_ID = '$feedback_ID'";
        $result = mysqli_query($combine, $sql);
        $row= mysqli_fetch_array($result, MYSQLI_ASSOC);
        
	//$q1="UPDATE `feedback` SET `admin_reply`='$admin_reply',"
          //      . "WHERE `feedback`.`name`='$name'";
	
        
	echo "<div class='sidenav'>";
		echo "<a href='add_stock.php'><font color='green'><b>ADD STOCK</b></font></a>";
		echo "<a href='stocks_level.php'><font color='black'><b>STOCKS LEVEL</b></font></a>";
		echo "<a href='it_book_list.php'><font color='black'>Information Technology</font></a>";
		echo "<a href='cs_book_list.php'><font color='black'>Computer Science</font></a>";
	    echo "<a href='maths_book_list.php'><font color='black'>Mathematics</font></a>";
		echo "<a href='science_book_list.php'><font color='black'>Science</font></a>";
		echo "<a href='adminViewFeedback.php'><font color='green'><b>FEEDBACK LIST</b></font></a>";
	echo"</div>";
	echo"<div class='main'>";
       
	echo"<h1 align='center'>Reply Feedback</h1>";

        ?>
        <div class="form-style-5">
            <form method="get" action="adminReplyCustomer2.php">
           
        <?php
            echo "<p><b>Feedback ID</b> </p>";
            echo"<input type='text' id='feedback_ID' name='feedback_ID' value='".$row['feedback_ID']."' readonly>";   
        echo "<br/><br/>";
        echo "<p><b>Reply your customer feedback here!</b> </p>";
        echo "<textarea name='admin_reply' id = 'admin_reply' rows='8' cols='40' placeholder='Enter your reply here!'>".$row['admin_reply']."</textarea>";
		?>

        <br/><br/>
         <input type="submit" name="submit" value="Submit Form">
         <input type="hidden" name="submitted" value="true"/>
         
       </form>
     </div>
    </div>
        
 ?>