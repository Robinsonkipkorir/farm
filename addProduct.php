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
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
 
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
// if ($_FILES["fileToUpload"]["size"] > 1000000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $name= $_POST['name'];
    $description= $_POST['description'];
    $price= $_POST['price'];
    $category = $_POST['category'];
    $url = basename( $_FILES["fileToUpload"]["name"]);
    $userseller =  $_SESSION['username']; 

    $sql = mysqli_query($conn,"INSERT INTO products (name,category,price,description,img,seller)
     VALUES('$name','$category','$price','$description','$url','$userseller')
    ");
  
    if($sql){
     echo " <script>
     Swal.fire(
        'Done',
        'Product added successifully',
        'success'
      )
     </script>";
    }else{
        echo " <script>
        Swal.fire(
           'Oops !',
           'unable to add product',
           'error'
         )
        </script>";
    }



  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
// if(isset($_POST['submit'])){
  
}

?>


   <div class="main">
       <form action="" method="post" enctype="multipart/form-data">
           <h4>Add Product</h4><br>
           <div class="form-group">
            <label for="">product Category</label>
          <select name="category" id="" required> 
              <option value="">--Select category--</option>
             <option value="crop">Crop</option>
              <option value="animal">Animal</option>
          </select> 
         </div>
           <div class="form-group">
              <label for="">product name</label>
           <input type="text" name="name" id="" required>  
           </div>
         
           
            <div class="form-group">
             <label for=""> product Price</label>
           <input type="number" name="price" id="" required>   
            </div> 
            <div class="form-group">
                <input type="file" name="fileToUpload" id="fileToUpload" required>
               
            </div>
           <div class="form-group">
            <label for="">Description</label>
           <textarea name="description" id="" cols="10" rows="5" required></textarea>  
           </div>
            <button name="submit">Submit</button>
        
       </form>
   </div>
   <script src="sweetalert2.min.js"></script>
  
</body>
</html>
