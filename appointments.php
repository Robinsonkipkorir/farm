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

</style>
<script type="text/javascript"> 
    function ExcelReport() 
  {
    var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';

    tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';
    tab_text = tab_text + '<x:Name>Software Sheet</x:Name>';
    tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
    tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

    tab_text = tab_text + "<table border='1px'>";
    tab_text = tab_text + $('#trackingDetails').html();
    tab_text = tab_text + "</table></body></html>";

    var data_type = 'data:application/vnd.ms-excel';

    $('#export').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
    $('#export').attr('download', 'ZFC. Report file.xls');
  }
</script>
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
	      <li class="active1"><a href="appointments.php">Appointments</a></li>	
	      <li><a href="regions.php">Regions</a></li>
	      <li><a href="chats.php">Chats</a></li>	  
        <li><a href="diagnose.php">Diagnose</a></li>
        <li><a href="email_notifications.php">Notifications</a></li>    
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
  <h4><span class="label label-success"><?php echo $_SESSION['username']; ?></span>, you can book your appointment for a farm visit from the following farms.</h4>
  <br>
  <div class="row">
  	<div class="page-header">
		 <h3>Appointments</h3>      
	</div>
  	<form role="form" method="post" action="includes/appointments.inc.php">
    <div class="col-sm-6">    	 	
    	<div class="form-group" style="padding-top: 8px; padding-bottom: 8px;">
            <label for="sel1">Agronomists:</label>
            <select class="form-control" id="sel1" name="agronomist" required="required">
              <option>-- Agronomists --</option>
              <?php
                $agronomists = mysqli_query($connect, "SELECT * FROM agronomists");
                while($agro_row=mysqli_fetch_assoc($agronomists))
                    {
              ?>  
              <option value="<?php echo $agro_row['username']; ?>"><?php echo $agro_row['username']." ".$agro_row['surname']." "."(".$agro_row['email'].")"; ?></option> 
              <?php
                    }     
              ?>      
            </select>
        </div> 
	  <div class="form-group">
          <label for="date"> Date of Appointment: </label>
          <input type="date" name="date" id="date" min="<?php echo date('Y-m-d'); ?>" class="form-control" required="required">
        </div>
        <div class="form-group">
          <label for="time"> Time of Appointment: </label>
          <select  name="time" id="time" class="form-control" required="required">
            <option value="8AM-10AM">8AM-10AM</option>
            <option value="10AM-12PM">10AM-12PM</option>
            <option value="12PM-2PM">12PM-2PM</option>
            <option value="2PM-4PM">2PM-4PM</option>
          </select>  
        </div>            
	 </div>
    <div class="col-sm-6">     	
		 <div class="form-group">
            <label for="subject"> Subject: </label>
            <select class="form-control" name="subject" >
              <option value="vaccination">vaccination</option>
              <option value="poultry">poultry</option>
              <option value="crop">crop</option>
              <option value="crop">Animal</option>
              

            </select>
        </div>
		 	<div class="form-group">
      <label for="sel2">Message:</label>
      <textarea class="form-control" name="message" rows="5" id="sel2" style="margin-top: 8px; padding-bottom: 8px;"></textarea>
	   </div>         	
    </div>
    <button type="submit" class="btn btn-success btn-block" style="margin-top: 28px; float: right;" name="send">Send</button>
    </form>    
  </div>  

<div class="table-responsive" style="padding-top: 25px;">             
  <table class="table table-striped" id="trackingDetails">
    <thead>
      <tr>
        <th>Subject</th>
        <th>Message</th>
        <th>FarmerUsername</th>
        <th>AgronomistUsername</th>
        <th>DateofAppointment</th>
        <th>TimeOfAppointment</th>        
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
       <?php                
        $result = mysqli_query($connect, "SELECT * FROM appointments WHERE farmer_username = '$username'"); 
        while($row = mysqli_fetch_assoc($result))
      {
      ?>
      <tr>
        <td><?Php echo $row['subject']; ?></td>
        <td><?Php echo $row['message']; ?></td>
        <td><?Php echo $row['farmer_username']; ?></td>
        <td><?Php echo $row['agronomist_username']; ?></td>         
        <td><?Php echo $row['date_of_appointment']; ?></td>
        <td><?Php echo $row['time_of_appointment']; ?></td>       
        <td><?Php if($row['status'] == 0){echo"<span class='label label-warning text-center'>Pending</span>";}elseif($row['status'] == 1){echo"<span class='label label-danger text-center'>Declined</span>";}else{echo"<span class='label label-success text-center'>Accepted</span>";} ?></td>                     
      </tr>         
      <?php
        }
      ?>     
    </tbody>
  </table>
</div>

<div class="row">    
  <a href="#" id="export" onClick="ExcelReport();" class="btn btn-success btn-block" style="margin-bottom: 20px; margin-top: 20px;"><span class="glyphicon glyphicon-export"></span> Export Table to Excel</a>
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