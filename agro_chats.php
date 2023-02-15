<?php
	session_start();
	if (!isset($_SESSION['username'])) {
	    header("Location: index.php?login=invalid");
	}   
	require 'config/connection.php';
  $username = $_SESSION['username'];  
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/images/farmapp.png">
	<link rel="icon" type="image/png" href="assets/images/farmapp.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Farming Advisory System</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/new.css" rel="stylesheet" /> 

    <!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!-- End of JS files -->   
</head>
<style type="text/css">
	.address{
		float: right;
		display: inline;
	}

	.navbar-inverse, .navbar-toggle, .navbar-header, .navbar-brand{
		border: 1px solid #518e40;
		background-color: #518e40;
		color: #ffffff;		
	}	
	.active1 {
		background-color: #497d3a;
	}

   .sidenav {
    background-color: #f1f1f1;
    height: 500px;
   }

   #modules{
   	padding-top: 50px;
   	padding-bottom: 50px;
   }

  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #518e40;
  }
  .carousel-indicators li {
      border-color: #518e40;
  }
  .carousel-indicators li.active {
      background-color: #518e40;
  }   

  .active2:hover{
    	background-color: #dbe400;
    } 
  .para-padding{
    	padding-top: 30px;
    	padding-bottom: 30px;
    	color: #808080;
    } 
   .logo-small{
   	color: #518e40;
   	 font-size: 50px; 
   	 padding-top: 35px;  
   	 padding-bottom: 15px;	 
   } 

#sel1 {
      border: 2px solid #649a41;            
  } 

#sel1:focus {
      border: 2px solid #345759;
  }

#sel2 {
      border: 2px solid #649a41;            
  } 

#sel2:focus {
      border: 2px solid #345759;
  }

  .well{

  }

   input[type="text"], input[type="date"], input[type="time"], input[type="number"]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;       
    border: none;
    border: 2px solid #649a41;
}

input[type=text]:focus, input[type="date"]:focus, input[type="time"]:focus, input[type="number"]:focus{
    border: 2px solid #345759;
}

input[type="file"]{
  border: 2px solid #649a41;
  padding: 5px 10px;
  background-color: #649a41;
  border-radius: 5px;
  color: #ffffff;
}

   footer {
      background-color: #2d2d30;
      color: #518e40;
      padding: 20px;
  }

   footer a {
      color: #518e40;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  

a:link{
  color: #649a41;
  text-decoration: none;
}

a:visited{
  color: #649a41;
  text-decoration: none;
}

a:hover{
  color: #649a41;
  text-decoration: none;
}

a:active{
  color: #345759;
  text-decoration: none;
}

</style>
<body>	
<nav class="navbar navbar-inverse" style="color: white">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">FarmingAdvisory</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
	    <ul class="nav navbar-nav">
        <li><a href="agronomist_home.php">Home</a></li>       
        <li><a href="agro_appointments.php">Appointments</a></li>       
        <li class="active1"><a href="agro_chats.php">Chats</a></li>             
      </ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<li>
	    		<a href="#"><span class="glyphicon glyphicon-user"></span> 
		    		<?php echo $_SESSION['username']; ?>
	    		</a>	    		
	    	</li>
	    	<li>
	    		<a href="includes/logout.php"><span class="glyphicon glyphicon-log-out"></span> 
		    		Logout
	    		</a>	    		
	    	</li>
	    </ul>
	</div>
  </div>
</nav>
	 
<div id="modules" class="container text-center">
  <h3> FARMING ADVISORY SYSTEM </h3>  
  <div class="row">  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#chat">Chats</a></li>
    <li><a data-toggle="tab" href="#profile">Profile</a></li>    
  </ul>

  <?php
      $chatQuery = mysqli_query($connect, "SELECT * FROM chats");
      $chat_row = mysqli_fetch_assoc($chatQuery);
  ?>

  <div class="tab-content">
    <div id="chat" class="tab-pane fade in active">      
      <?php 
        $farmersUsernameQuery = mysqli_query($connect, "SELECT * FROM farmers");
        while($far_row = mysqli_fetch_assoc($farmersUsernameQuery))
        { 
          echo "<div class='well text-left' style='background-color: #f5fff2; border-color: #518e40; border-radius: 10px;'>
                <a href='agrochats_platform.php?begin_chat=".urlencode($far_row['username'])."'>
                <img src='uploaded_images/".$far_row['image_upload']."' class='img-circle' alt='Image' width='30px' height='30px'> ". $far_row['username'] ."</a></div>";
        }  
      ?>            
    </div>
    <div id="profile" class="tab-pane fade">
      <?php
        $agroNameQuery2 = mysqli_query($connect, "SELECT * FROM agronomists WHERE username = '$username'"); 
        $agro_row3 = mysqli_fetch_assoc($agroNameQuery2);       
      ?>
      <img src='uploaded_images/<?php echo $agro_row3['image_upload']; ?>' class='img-circle' alt='Image' width='200px' height='200px'>       
      <p><b style="font-size: 120%;">Name:</b> 
        <span class="label label-success" style="font-size: 103%;"><?php 
        
        $agroNameQuery = mysqli_query($connect, "SELECT * FROM agronomists WHERE username = '$username'"); 
        $agro_row2 = mysqli_fetch_assoc($agroNameQuery);
        echo $agro_row2['name'];
        ?></span>
      </p>      
      <p><b style="font-size: 120%;">Username:</b> 
        <span class="label label-success" style="font-size: 103%;"><?php
        echo $agro_row2['username'];
        ?></span>        
      </p>
      <p><b style="font-size: 120%;">Email:</b> 
        <span class="label label-success" style="font-size: 103%;"><?php
        echo $agro_row2['email'];
        ?></span>        
      </p>
      <p><b style="font-size: 120%;">Phone Number:</b> 
        <span class="label label-success" style="font-size: 103%;">0<?php
        echo $agro_row2['phone'];
        ?></span>        
      </p>
      <form method="post" action="includes/agroupload_profile.inc.php" enctype="multipart/form-data">        
        <input type="file" class="form-control" name="image" id="image">
        <button type="submit" class="btn btn-success btn-block" name="upload">Submit</button>
      </form>
    </div>
  </div>       
  </div>  
</div>

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>&copy; <?php echo date("Y");?> <a href="#" data-toggle="tooltip" title="Visit ZIMDEF.">Farming Advisory System.
</footer>
	
</body>
</html>