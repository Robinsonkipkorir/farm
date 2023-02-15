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
/***********************Background CSS***********************/
.body-background{
	background-image: url("assets/images/background1.jpg");
	background-repeat: no-repeat;
	}
/***********************End CSS***********************/	

/***********************Inputs CSS***********************/
input[type="text"], input[type="password"]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;       
    border: none;
    border: 2px solid #649a41;
}

input[type=text]:focus, input[type="password"]:focus {
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

/***********************Form CSS***********************/
#form1 {
    border-radius: 5px;
    background-color: #ffffff;
    padding: 20px 60px 60px 80px;
    margin-top: 50%;   
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
}

.button-right{
		float: right;		
	}

.margin-title{
	padding-bottom: 30px;
	font-weight: bold;
}

#btn-login{
	margin-bottom: 50px;

}

a:link{
	color: #000000;
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
/***********************End CSS***********************/
</style>
<body class="body-background">

<div class="container">				
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">			
			<form role="form" id="form1" method="post" action="includes/agronomist_resetpassword.inc.php">
				<h4 class="text-center margin-title">Reset Password</h4>
				<p class="text-center">Please enter your new password.</p>				
				<div class="form-group">
					<label for="password"> Password: </label>
					<input type="password" name="password" placeholder="Enter New Password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one Number and one Uppercase and Lowercase letter, and at least 8 or more characters" required="required">
				</div>	
				<div class="form-group">
					<label for="confirm"> Confirm Password: </label>
					<input type="password" name="confirm" id="confirm" placeholder="Confirm New Password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one Number and one Uppercase and Lowercase letter, and at least 8 or more characters" required="required">
				</div>		    			
    			<button type="submit" id="btn-login" class="btn btn-default button-right" name="reset">Reset</button>			
			</form>
			<?php                                            
			        if(!isset($_GET['reset'])){
			            exit();
			            }
			            else{
			                 $loginUrl = $_GET['reset'];

			                 if ($loginUrl == "empty") {
			                 		echo "<div class='alert alert-danger fade in'>
			                 				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											  <strong>Note!</strong> Fill in all the fields!
										  </div>";
			                 		exit();
			                 }
			                 elseif ($loginUrl == "error") {
			                 		echo "<div class='alert alert-danger fade in'>
			                 				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											  <strong>Note!</strong> Either Username or Password is wrong!
										  </div>";
			                 		exit();
			                 }
			                 elseif ($loginUrl == "password_mismatch") {
			                 		echo "<div class='alert alert-danger fade in'>
			                 				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											  <strong>Note!</strong> Passwords do not match!
										  </div>";
			                        exit();
			                 }
			                 elseif ($loginUrl == "ultimateerror") {
			                        echo "<div class='alert alert-danger fade in'>
			                 				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											  <strong>Note!</strong> This is an ultimate Error, Please try again!
										  </div>";
			                        exit();
			                 }
			                  elseif ($loginUrl == "invalid") {
			                        echo "<div class='alert alert-danger fade in'>
			                 				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											  <strong>Note!</strong> Username Not Set!
										  </div>";
			                        exit();
			                 }                               
			        }
			    ?>
		</div>
		<div class="col-md-4"></div>
	</div>		
</div>
	
	
<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!-- End of JS files -->
</body>
</html>
