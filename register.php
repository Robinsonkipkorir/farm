<?php
  session_start();
  require 'config/connection.php';
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
.jumbotron{
  padding: 0px 0px;
  background-color: #649a41;
}
.para-padding{
      padding-top: 30px;
      padding-bottom: 30px;
      color: #808080;
    }
  .address{
    float: right;
    display: inline;
  }
/***********************Inputs CSS***********************/
input[type="text"], input[type="password"], input[type="email"]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;       
    border: none;
    border: 2px solid #649a41;
}

input[type=text]:focus, input[type="password"]:focus, input[type="email"]:focus{
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
    color: #649a41;
  }
  .carousel-indicators li {
      border-color: #649a41;
  }
  .carousel-indicators li.active {
      background-color: #649a41;
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

a:link{
  color: #649a41;
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
  color: #15775c;
  text-decoration: none;
} 

   footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 20px;
  }

   footer a {
      color: #065e97;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  

</style>
<body>	
<div class="container">
  <div class="jumbotron">

   <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="assets/images/slide1.jpg" alt="Chania">
          <div class="carousel-caption">
            <h3>Farming Advisory System</h3>
		    <p>Produce the best out the land you have chosen to practise your farming.</p>
          </div>
        </div>

        <div class="item">
          <img src="assets/images/slide2.jpg" alt="Chania">
          <div class="carousel-caption">
            <h3>Farming Advisory System</h3>
            <p>Shipping takes approximately 3-8 business days (Monday-Friday) for standard shipping.</p>
          </div>
        </div>

        <div class="item">
          <img src="assets/images/slide3.jpg" alt="Flower">
          <div class="carousel-caption">
            <h3>Farming Advisory System</h3>
            <p>Get the Waybill / AWB number or the reference number from your email.</p>
          </div>
        </div>

        <div class="item">
          <img src="assets/images/slide4.jpg" alt="Flower">
          <div class="carousel-caption">
            <h3>Farming Advisory System</h3>
		    <p>Produce the best produce from an informed Budget.</p>
          </div>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
      
  </div>
</div>  

<div class="container"> 
<H4 class="text-center" style="display: inline;"><b>FARMER REGISTER</b></h4> 
  <div class="text-left" style="display: inline;">
    (<a href="index.php">Back to Login</a>)
    (<a href="agronomist_register.php">Agronomist Register</a>) 
  </div>
    <div class="row">
    <form role="form" action="includes/farmer_register.inc.php" method="post">
    <div class="col-sm-6">
      	<div class="form-group">
	      <label for="name">Fullname:</label>
	      <input type="text" name="name" id="name" class="form-control" pattern="^[a-zA-Z ]*$" title="Letters Only" placeholder="Enter Name" required="required">          
	    </div> 
	    <div class="form-group" style="padding-top: 8px; padding-bottom: 8px;">
    <label for="sel1">Farming Region:</label>
    <select class="form-control" id="sel1" name="region" required="required">
      <option>-- Farming Region --</option>
      <?php
        $sql = mysqli_query($connect, "SELECT * FROM `regions`");
        while($result = mysqli_fetch_assoc($sql)){
        ?> 
        <option value="<?php echo $result['region_name']; ?>"><?php echo $result['region_name'];?></option>
        <?php 
      }
      ?>             
    </select>
    </div>  
	    <div class="form-group">
          <label for="username"> Username: </label>
          <input type="text" name="username" id="username" placeholder="Enter Username" class="form-control" pattern="^[a-z0-9_-]{3,15}$" title="3 to 15 characters with any lower case character, digit or special symbol “_-” only." required="required">
        </div> 
    <div class="form-group">
          <label for="email"> Email: </label>
          <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter a Valid Email" required="required">
        </div>      
    </div>
    <div class="col-sm-6">        
      <div class="form-group">
        <label for="phone">Cellphone Number:</label>
        <input type="text" name="phone" id="phone" class="form-control" pattern="^\+?\d{0,3}\s?\(?\d{4}\)?[-.\s]?\d{3}[-.\s]?\d{3}?" title="Must be Zimbabwe MNO Numbers Only" placeholder="Enter Cellphone Number" required="required">
      </div> 
    <div class="form-group" style="padding-top: 8px; padding-bottom: 8px;">
		<label for="sel1">Gender:</label>
		<select class="form-control" id="sel1" name="gender" required="required">
			<option>-- Gender --</option>
			<option value="male">Male</option>
			<option value="female">Female</option>			        
		</select>
	  </div>     
      <div class="form-group">
          <label for="password"> Password: </label>
          <input type="password" name="password" placeholder="Enter New Password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one Number and one Uppercase and Lowercase letter, and at least 8 or more characters" required="required">
      </div>    
        <div class="form-group">
          <label for="confirm"> Confirm Password: </label>
          <input type="password" name="confirm" id="confirm" placeholder="Confirm Password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one Number and one Uppercase and Lowercase letter, and at least 8 or more characters" required="required">
        </div>         
  	</div>
  <button type="submit" class="btn btn-success btn-block" style="margin-top: 28px; float: right;" name="register">Register</button>
    </form>    
</div>
</div>  
</body>
</html>
