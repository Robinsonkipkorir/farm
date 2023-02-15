<?php
	session_start();
	if (!isset($_SESSION['username'])) {
	    header("Location: index.php?login=invalid");
	}   
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
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
/***********************Inputs CSS***********************/
input[type="text"], input[type="password"]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;       
    border: none;
    border: 2px solid #649a41;
}

input[type=text]:focus, input[type="password"]:focus{
    border: 2px solid #345759;
}
#sel1 {
  		border: 2px solid #649a41;  		
  } 

#sel1:focus {
  		border: 2px solid #345759;
  }
button[type="submit"]{	
    background-color: #649a41;
    color: #ffffff;
    padding: 10px 24px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
}

button[type="submit"]:hover {
    background-color: #466a2e;
    color: #ffffff;
}
/***********************End CSS***********************/
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
   	padding-top: 30px;
   	padding-bottom: 30px;
   }

  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4fe09;
  }
  .carousel-indicators li.active {
      background-color: #f4fe09;
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
   	color: #f4fe09;
   	 font-size: 50px; 
   	 padding-top: 35px;  
   	 padding-bottom: 15px;	 
   } 

   footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 20px;
  }

   footer a {
      color: #f4fe09;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  

</style>
<body>	

<div id="modules" class="container">  
  <div class="row">
  	<form role="form" action="farmers_fill.inc.php" method="post">
    <div class="col-sm-4">
    	<div class="form-group">
			<label for="name">Name(s):</label>
			<input type="text" name="name" id="name" class="form-control" pattern="^[a-zA-Z ]*$" title="Letters Only" placeholder="Enter Name" required="required">          
		</div>
		<div class="form-group">
			<label for="surname">Surname:</label>
			<input type="text" name="surname" id="surname" class="form-control" pattern="^[a-zA-Z ]*$" title="Letters Only" placeholder="Enter Surname" required="required">
		</div>
		<div class="form-group">
		<label for="sel1">Gender:</label>
			<select class="form-control" id="sel1" name="gender" required="required">
				<option>-- Gender --</option>
			  	<option value="male">Male</option>
			  	<option value="female">Female</option>			        
			</select>
		</div>
		<div class="form-group">
			<label for="cell-number">Cellphone Number:</label>
			<input type="text" name="cell-number" id="cell-number" class="form-control" pattern="^\+?\d{0,3}\s?\(?\d{4}\)?[-.\s]?\d{3}[-.\s]?\d{3}?" title="Must be Zimbabwe MNO Numbers Only" placeholder="Enter Cellphone Number" required="required">
		</div>
    </div>
    <div class="col-sm-8">
    	<h3 class="text-center">ZTC'S FARMING ADVISORY APPLICATION</h3>
  		<h4 class="text-center">Please fill in the details to continue with the application</h4>
	</div>
    </form>    
</div>

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>&copy; <?php echo date("Y");?> <a href="#" data-toggle="tooltip" title="Visit ZIMDEF.">Zimbabwe Manpower Development Fund.
</footer>
	
</body>
</html>