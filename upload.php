<?php

require_once 'connection.php';

if(isset($_POST["submit"])){
  $productname = $_POST["productname"];
  $price = $_POST["price"];
  $discount = $_POST["discount"];

  //For uploads photos
  $upload_dir = "uploads/"; //this is where the uploaded photo stored
  $product_image = $upload_dir.$_FILES["imageUpload"]["name"];
  $upload_dir.$_FILES["imageUpload"]["name"];
  $upload_file = $upload_dir.basename($_FILES["imageUpload"]["name"]);
  $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION)); //used to detected the image format
  $check = $_FILES["imageUpload"]["size"]; // to detect the size of the image
  $upload_ok = 0;

  if(file_exists($upload_file)){
      echo "<script>alert('The file already exist')</script>";
      $upload_ok = 0;
  }else{
      $upload_ok = 1;
      if($check !== false){
        $upload_ok = 1;
        if($imageType == 'jpg' || $imageType == 'png' || $imageType == 'jpeg' || $imageType == 'gif'){
            $upload_ok = 1;
        }else{
            echo '<script>alert("please change the image format")</script>';
        }
      }else{
          echo '<script>alert("The photo size is 0 please change the photo ")</script>';
          $upload_ok = 0;
      }
  }

  if($upload_ok == 0){
     echo '<script>alert("sorry your file is doesn\'t uploaded. Please try again")</script>';
  }else{
      if($productname != "" && $price !=""){
          move_uploaded_file($_FILES["imageUpload"]["tmp_name"],$upload_file);

          $sql = "INSERT INTO product(product_name,price,discount,product_image)
          VALUES('$productname',$price,$discount,'$product_image')";

          if($conn->query($sql) === TRUE){
              echo "<script>alert('your product uploaded successfully')</script>";
          }
      }
  }


  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="upload.css">
    <style>
        #upload_container {  
    max-width: 600px;  
    margin: auto;  
    padding: 20px;  
    background: #f9f9f9;  
    border-radius: 8px;  
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);  
}  

h2 {  
    text-align: center;  
    font-family: 'Arial', sans-serif;  
    margin-bottom: 20px;  
    color: #333;  
}  

form {  
    display: flex;  
    flex-direction: column;  
}  

input[type="text"],  
input[type="number"],  
button,  
input[type="submit"] {  
    padding: 12px 15px;  
    margin-bottom: 15px;  
    border: 1px solid #ccc;  
    border-radius: 5px;  
    font-size: 16px;  
    transition: border-color 0.3s;  
}  

input[type="text"]:focus,  
input[type="number"]:focus {  
    border-color: #007bff;  
    outline: none;  
}  

button {  
    background-color: #007bff;  
    color: white;  
    border: none;  
    cursor: pointer;  
}  

button:hover {  
    background-color: #0056b3;  
}  

input[type="submit"] {  
    background-color: #f44336;  
    color:black;  
    border: none;  
    cursor: pointer;  
}  


/* Responsive styles */  
@media (max-width: 768px) {  
    #upload_container {  
        padding: 15px;  
    }  

    input[type="text"],  
    input[type="number"],  
    button,  
    input[type="submit"] {  
        font-size: 14px;  
    }  
}
    </style>
</head>
<body>
    <?php
         include_once 'header.php';

    ?>
    <section id="upload_container">
        <form action="upload.php" method="POST" enctype="multipart/form-data" >
            <input type="text" name="productname" id="productname" placeholder="Product Name" required>
            <input type="number" name="price" id="price" placeholder="Product Price" required>
            <input type="number" name="discount" id="discount" placeholder="Product Discount">
            <input type="file" name="imageUpload" id="imageUpload" required hidden>
            <button id="choose" onclick="upload();">Choose Image</button>
            <input type="submit" value="Upload" name="submit" style="background-color:#F9E55B">
        </form>
    </section>

    <script>
        var productname = document.getElementById("productname");
        var price = document.getElementById("price");
        var discount = document.getElementById("discount");
        var choose = document.getElementById("choose");
        var uploadImage = document.getElementById("imageUpload");

        function upload(){
            uploadImage.click();
        }

        uploadImage.addEventListener("change",function(){
            var file = this.files[0];
            if(productname.value == ""){
                productname.value = file.name;
            }
            choose.innerHTML = "You can change("+file.name+") picture";
        })
    </script>
</body>
</html>