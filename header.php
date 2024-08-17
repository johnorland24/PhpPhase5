<?php
  
  require_once 'connection.php';

$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<style>
    
    #main_tabs{
      display:flex;
      width:400px;
      
    }
    header #main_tabs a{
        margin-left:100px;
    }
    header a span{
    
    position: absolute;
    width: 15px;
    height: 15px;
    top: -10%;
    right: -20%;
    background-color: red;
    color: white;
    border-radius: 50%;
    font-size: 1rem;
    padding: .2em;
    text-align: center;
}
@media (max-width:428px) {
    main .card{
       max-width:428px;

        
    }
}
    @media (max-width: 415px) {
    header{
        display: none;

        
    }
    
    
}
@media (min-width:415px) {
    #main_tabs {
    display: flex;
    width: auto;
}
}
@media (max-width: 526px) {
    main .card{
       max-width:457px;

        
    }
    
    
}


</style>
<body>
     <header style=" height: 80px" >
         <h1><a href="home.php"><img style="width: 50px; height: 40px;" src="uploads/icon.svg" alt=""></a></h1>
         <div id="main_tabs">
         <a href="Home.php"  style="font-size:40px" class="home"><i class='bx bx-home'></i></a>
         <a href="upload.php" style="font-size:40px" clas="add"><i class='bx bx-cart-add'></i></a>
         <a href="login.php" style="font-size:40px" ><i class='bx bx-log-out'></i></a>
         <a href="delete.php" style="font-size:40px" ><i class='bx bxs-comment-x'></i></a>
         <a href="cart.php"><i class='bx bxs-cart' style="font-size:40px"></i><span id="badge"><?php echo mysqli_num_rows($all_cart);  ?></span></a>
         </div>
         
     </header>
</body>
</html>