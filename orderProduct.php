<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" href="style.css">
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <link rel="stylesheet" href="sweetalert2.min.css">
    <title>Document</title>
</head>
<body>
<?php
$conn = mysqli_connect('localhost','root','','farmingapp');
session_start();
if(!$conn){
  echo 'server error';
}
// file uploads


if(isset($_POST["submit"])) {
$seller = $_GET['seller'];
$quantity = $_POST['quantity'];
$contact = $_POST['contact'];
$product = $_GET['pname'];
$buyer = $_SESSION['username'];

 $sql = mysqli_query($conn,"INSERT INTO orders (seller,buyer,product,quantity,contact)
  VALUES('$seller','$buyer','$product','$quantity','$contact')
 ");

if($sql){
    echo " <script>
    Swal.fire(
       'Done',
       'Ordered successifully',
       'success'
     )
    </script>";
   }else{
       echo " <script>
       Swal.fire(
          'Oops !',
          'unable to Order',
          'error'
        )
       </script>";
   }
}

?>


   <div class="main">
       <form action="" method="post" enctype="multipart/form-data">
           <h4>Order Product</h4><br>
           <div class="form-group">

            <label for="">Quantity</label>
           <input type="number" name="quantity">
        
         </div>
           <div class="form-group">
              <label for="">Contact</label>
           <input type="number" name="contact" id="" required>  
           </div>
         
            <button name="submit">Submit</button>
        
       </form>
   </div>
   <script src="sweetalert2.min.js"></script>
  
</body>
</html>
