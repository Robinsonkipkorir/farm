<?php
error_reporting(0);
	session_start();
	if (!isset($_SESSION['username'])) {
	    header("Location: index.php?login=invalid");
	}   
	require 'config/connection.php';
  $username = $_SESSION['username']; 
  $username_receiver = $_GET['begin_chat'];  
     
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

/*************Chat CSS**************/
.chatbox{
    display: flex ;
    flex-direction: column;    
    width: 100%;
    border: solid 2px #518e40;
    display: flex;
    flex-direction: column;
    padding: 10px;
  }
.messages {
  margin-top: 30px;
  display: flex;
  flex-direction: column;
}
.message {
  border-radius: 20px;
  padding: 8px 15px;
  margin-top: 5px;
  margin-bottom: 5px;
  display: inline-block;
}

.yours {
  align-items: flex-start;
}

.yours .message {
  margin-right: 25%;
  background-color: #eee;
  position: relative;
}

.yours .message.last:before {
  content: "";
  position: absolute;
  z-index: 0;
  bottom: 0;
  left: -7px;
  height: 20px;
  width: 20px;
  background: #eee;
  border-bottom-right-radius: 15px;
}
.yours .message.last:after {
  content: "";
  position: absolute;
  z-index: 1;
  bottom: 0;
  left: -10px;
  width: 10px;
  height: 20px;
  background: white;
  border-bottom-right-radius: 10px;
}

.mine {
  align-items: flex-end;
}

.mine .message {
  color: white;
  margin-left: 25%;
  background: linear-gradient(to bottom, #5cb85c 0%, #5cb85c 100%);
  background-attachment: fixed;
  position: relative;
}

.mine .message.last:before {
  content: "";
  position: absolute;
  z-index: 0;
  bottom: 0;
  right: -8px;
  height: 20px;
  width: 20px;
  background: linear-gradient(to bottom, #5cb85c 0%, #5cb85c 100%);
  background-attachment: fixed;
  border-bottom-left-radius: 15px;
}

.mine .message.last:after {
  content: "";
  position: absolute;
  z-index: 1;
  bottom: 0;
  right: -10px;
  width: 10px;
  height: 20px;
  background: white;
  border-bottom-left-radius: 10px;
}

/*************End of Chat CSS**************/
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
  <h3>ZFC'S FARMING ADVISORY SYSTEM [<small><?php echo $username_receiver;?>'s chat</small>]</h3>  
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <div class="chatbox">
      <?php
          if (!empty($username_receiver)) {             
                      
              $message = mysqli_real_escape_string($connect, $_POST['message']);

              if($message=="") 
              {

              }
              else
              {
              $insertMessageQuery = mysqli_query($connect, "INSERT INTO chats (sender_username, receiver_username, message, date_posted, time_posted) VALUES('$username', '$username_receiver', '$message', CURDATE(), CURTIME())") or die("failed");  
                 }       

              $getMessageQuery = mysqli_query($connect, "SELECT * FROM chats ORDER BY time_posted ASC");
              while($message_row = mysqli_fetch_assoc($getMessageQuery))
              {
                $sender = $message_row['sender_username'];
                $receiver = $message_row['receiver_username'];
                $messagez= $message_row['message'];
                $message_sent="";
                $message_receipt="";

                if($sender==$username && $receiver==$username_receiver )
                {
                    $message_sent=$messagez;
                }
                elseif($receiver==$username && $sender==$username_receiver)
                {
                    $message_receipt=$messagez;
                }
        ?> 

        <?php
                if(!empty($message_sent))
                {
                ?>
                  <div class="mine messages">      
                      <div class="message last">
                      <p><?php echo    $message_sent. "  <small style='font-size: 65%;'>". $message_row['date_posted']. " ".  $message_row['time_posted'] ."</small>"; ?></p>
                      </div>       
                  </div>

        <?php
                  }
                ?>

              <?php
              if(!empty($message_receipt))
              {
              ?>
                  <div class="yours messages">            
                    <div class="message last">
                      <p><?php echo  $message_receipt. "  <small style='font-size: 65%;'>". $message_row['date_posted']. " ".  $message_row['time_posted'] ."</small>"; ?></p>
                    </div>
                  </div>
              <?php
              }
              ?>
               <?php
                        }
                      }
                   ?>
    </div>
    <div class="messagebox">
      <form role="form" method="post" action="">
        <div class="form-group">
          <label for="sel2">Chat Message:</label>
          <textarea class="form-control" name="message" rows="5" id="sel2" style="margin-top: 8px; padding-bottom: 8px;"></textarea>
        </div>
        <button type="submit" class="btn btn-success btn-block" name="send">Send</button>
      </form>      
    </div>
  </div>
  <div class="col-sm-2"></div>  
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