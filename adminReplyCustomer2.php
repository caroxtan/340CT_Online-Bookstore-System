
<?php

    session_start();
	
	include('bookshop_database.php');
	
	$admin_id = $_SESSION['admin_id'];
	
	if($admin_id == ''){
		header('location:adminlogin.php');
	}
	
	include('header_admin.php');
        
       /* $name = $_GET['name'];
        $email = $_GET['email'];
        $service = $_GET['service'];
        $suggestion = $_GET['suggestion'];*/
        //$feedback_ID=$_GET['reply'];
        $feedback_ID = $_GET['feedback_ID'];
        $admin_reply = $_GET['admin_reply'];
        
        $sql = "SELECT * FROM feedback WHERE feedback_ID = '$feedback_ID'";
        $result = mysqli_query($combine, $sql);
        $row= mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        $q1 = "UPDATE feedback SET admin_reply='$admin_reply' WHERE feedback.feedback_ID = '$feedback_ID'";
        
        
        if($combine->query($q1)===TRUE)
        {
            echo"<script>alert('Reply successfully to Customer!');
		window.location='adminViewFeedback.php'</script>";
	}
                
        else{
		echo "<script>alert('Reply Failed!');
			window.location='adminViewFeedback.php'</script>";	
	}	
    
    ?>
        
        
?>