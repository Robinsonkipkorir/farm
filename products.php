<?php
session_start();
$conn = mysqli_connect('localhost','root','','farmingapp');
if(!$conn){
  echo 'server error';
}
$user = $_SESSION['username'];
$sql = mysqli_query($conn,"SELECT * FROM products where seller !='$user' ");
$products = mysqli_fetch_all($sql,MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
         <div class="products">
             <?php foreach($products as $product): ?>
             <div class="product">
                 <div class="image">
                     <img  src="images/<?php echo $product['img'] ?>" alt="" width="100%" >
                 </div>
                 <div class="details">
                     <h5> <?php echo $product['name'] ?>  </h5>
                     <h5>KES<?php echo $product['price'] ?> </h5>
                 </div>
                 <div class="description">
                 <?php echo $product['description'] ?> 
                 </div>
                 <a href="orderProduct.php?seller=<?php echo $product['seller'] ?>&pname=<?php echo $product['name'] ?>">Order</a>
             </div> 
             <?php endforeach ?>    
                      
         </div>
    </div>
</body>
</html>