<?php
	session_start();
	if (!isset($_SESSION['username'])) {
	    header("Location: index.php?login=invalid");
	}
	require 'config/connection.php';
  	$username = $_SESSION['username'];   


      $pending = mysqli_query($connect,"SELECT count(status) FROM orders WHERE seller = '$username' AND status = 'pending' ");
	  $numb = mysqli_fetch_row($pending)[0];

	  $sql = mysqli_query($connect,"SELECT * FROM orders WHERE seller = '$username' AND status = 'pending'");
	  $orders = mysqli_fetch_all($sql,MYSQLI_ASSOC);
	  if(isset($_POST['read'])){
		  $oid = $_POST['id'];
		  mysqli_query($connect,"UPDATE orders SET status = 'read' WHERE oid = '$oid'");
	  }
	
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
  td,th{
	  text-align: start;
  }
  .icon{
	  position: absolute;
	  background-color: red;
	  color: white;
	  width: 2.9rem;
	  height: 2.9rem;
	  top: -.1rem;
	  right: -1rem;
	  border-radius: 50%;
	  display: flex;
	  align-items: center;
	  justify-content: center;
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
	      <li><a href="home.php">Home</a></li>      
	      <li><a href="budgets.php">Budget</a></li>
	      <li><a href="appointments.php">Appointments</a></li>	
	      <li><a href="regions.php">Regions</a></li>
	      <li><a href="chats.php">Chats</a></li>	  
        <li><a href="diagnose.php">Diagnose</a></li>
		<li><a href="addProduct.php">Add Product</a></li> 
        <li class="active1"><a href="email_notifications.php">Notifications <span class="icon"> <?php echo $numb ?></span></a></li>          
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
	
<div class="container">
	 <div id="myCarousel" class="carousel slide" data-ride="carousel">
	 	 <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active" style="color: #518e40; border-color:  #518e40;"></li>
	      <li data-target="#myCarousel" data-slide-to="1" style="border-color:  #518e40;"></li>
	      <li data-target="#myCarousel" data-slide-to="2" style="border-color:  #518e40;"></li>
	      <li data-target="#myCarousel" data-slide-to="3" style="border-color:  #518e40;"></li>
	    </ol>

		     <!-- Wrapper for slides -->
	    <div class="carousel-inner" role="listbox">

	      <div class="item active">
	        <img src="assets/images/slideshow1.jpg" alt="Chania" width="1920" height="500">
	        <div class="carousel-caption">
	          <h3>Farming Advisory System</h3>
		        <p>Produce the best out the land you have chosen to practise your farming.</p>
	        </div>
	      </div>

	      <div class="item">
	        <img src="assets/images/slideshow2.jpg" alt="Chania" width="1920" height="500">
	        <div class="carousel-caption">
	          <h3>Farming Advisory System</h3>
		        <p>Produce the best produce from an informed Budget.</p>
	        </div>
	      </div>
	    
	      <div class="item">
	        <img src="assets/images/slideshow3.jpg" alt="Flower" width="1920" height="500">
	        <div class="carousel-caption">
	          <h3>Farming Advisory System</h3>
		        <p>Chat with several agronomists in real-time and get the best advises on how to be a successful farmer.</p>
	        </div>
	      </div>

	      <div class="item">
	        <img src="assets/images/slideshow5.jpg" alt="Flower" width="1920" height="500">
	        <div class="carousel-caption">
	           <h3>Farming Advisory System</h3>
		        <p>Get to know what the region is like and what to produce exactly in the region.</p>
	        </div>
	      </div>
	  
	    </div>
	     <!-- Left and right controls -->
		    <a class="left carousel-control carousel-back" href="#myCarousel" role="button" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="color: #518e40;"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="color: #518e40;"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
		</div>
	 
<div id="modules" class="container text-center">

 

  <h3> FARMING ADVISORY SYSTEM </h3>
  <h4> Notifications from buyers</h4>
  <br>

<div class="table-responsive" style="padding-top: 25px;">             
  <table class="table table-striped" id="trackingDetails">
    <thead>
      <tr>
        <th>Buyer</th>
		<th>Contact</th>
		<th>Product</th>
		
        <th>Quantity</th>
        <th>Date</th>
   
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       <?php                
     
       foreach($orders as $order) :
      ?>
      <tr>
        <td><?Php echo $order['buyer']; ?></td>
        <td><?Php echo $order['contact']; ?></td>
        <td><?Php echo $order['product']; ?></td>
        <td><?Php echo $order['quantity']; ?></td>         
        <td><?Php echo $order['date']; ?></td>
        <td>
		<form action="./update.php" method="post">
             <input type="number" name="id" value="<?php echo $order['oid'];  ?>" hidden>
			 <button name="read" value="submit">Read</button>
		</form>
	</td>       
      </tr>         
      <?php
      endforeach
      ?>     
    </tbody>
  </table>
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