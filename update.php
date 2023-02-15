<?php

	require 'config/connection.php';
 
	  if(isset($_POST['read'])){
		  $oid = $_POST['id'];
		  mysqli_query($connect,"UPDATE orders SET status = 'read' WHERE oid = '$oid'");
          header('location:./email_notifications.php');
	  }
	
?>