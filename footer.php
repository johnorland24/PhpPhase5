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
   
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
 
</head>
<style>
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    text-decoration: none;
    color: black;
}

html{
    font-size: 62.5%;
}

footer{
    position:sticky;
    bottom:0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    box-shadow: 1px 1px 1px 1px lightgrey;
}

footer a{
    position: relative;
    font-size: 2rem;

}

footer a:hover{
    color: red;


}

footer #main_tabs a{
    margin-left: 1em;
}

footer a span{
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
@media (max-width: 414px) {
    footer{
        display:block;
        display:flex;
    }
}
@media (min-width: 415px) {
    footer{
        display: none;
    }
}

   </style>
<body>
     <footer style=" height: 80px" >
         <h1><a href="home.php"><img style="width: 50px; height: 40px;" src="uploads/icon.svg" alt=""></a></h1>
         <div id="main_tabs">
             <a href="upload.php" style="font-size:40px"><i class='bx bx-cart-add'></i></a>
             <a href="Home.php"  style="font-size:40px"><i class='bx bx-home'></i></a>
         </div>
         <a href="login.php" style="font-size:40px" ><i class='bx bx-log-out'></i></a>
         <a href="cart.php"><i class='bx bxs-cart' style="font-size:40px"></i><span id="badge"><?php echo mysqli_num_rows($all_cart);  ?></span></a>
</footer>
</body>
</html>