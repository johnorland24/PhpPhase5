<?php

  require_once '../connection.php';

  $sql = "SELECT * FROM product";
  $all_product = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>My php project</title>
</head>
<body>
    <style>

header {  
    background-color: #282c34;  
    color: white;  
    padding: 15px 0;  
}  

.container {  
    display: flex;  
    flex-wrap: wrap;  
    justify-content: space-between;  
    align-items: center;  
    max-width: 1200px;  
    margin: auto;  
    padding: 0 15px;  
}  

.logo h1 {  
    font-size: 2rem;  
}  

nav ul {  
    list-style: none;  
    display: flex;  
    gap: 20px;  
}  

nav ul li {  
    display: inline;  
}  

nav ul li a {  
    color: white;  
    text-decoration: none;  
    padding: 8px 12px;  
    transition: background 0.3s;  
}  

nav ul li a:hover {  
    background: rgba(255, 255, 255, 0.1);  
    border-radius: 5px;  
}  

footer {  
    background-color: #f1f1f1;  
    color: #333;  
    padding: 20px 0;  
    text-align: center;  
    margin-top: 20px;  
}  

.social-icons {  
    margin: 10px 0;  
}  

.social-icons a {  
    color: #333;  
    margin: 0 10px;  
    font-size: 1.5rem;  
    transition: color 0.3s;  
}  

.social-icons a:hover {  
    color: #007bff;  
}  

footer nav ul {  
    list-style: none;  
    display: flex;  
    justify-content: center;  
    gap: 15px;  
    margin: 10px 0;  
}  

footer nav ul li a {  
    text-decoration: none;  
    color: #333;  
}  

footer nav ul li a:hover {  
    color: #007bff;  
}
        *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color: black;
}

html{
    font-size: 62.5%;
}

main{
    max-width: 1500px;
    width: 95%;
    margin: 30px auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: auto;
}

main .card{
    max-width: 300px;
    flex: 1 1 210px;
    text-align: center;
    height: 300px;
    border: 1px solid lightgray;
    margin: 20px;
}

main .card .image{
    height: 150px;
    width: 100%;
    margin-bottom: 20px;
}

main .card .image img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

main .card .caption{
    padding-left: 1em;
    text-align: left;
    line-height: 3em;
    height: 25%;
}

main .card .caption p{
    font-size: 1.5rem;
}

del{
    text-decoration: line-through;
}

main .card .caption .rate{
    display: flex;
}

main .card .caption .rate i{
    color: gold;
    margin-left: 2px;
}

main .card a{
    width: 50%;
}

main .card button{
    border: 2px solid black;
    padding: 1em;
    width: 80%;
    cursor: pointer;
    margin-top: 2em;
    font-weight: bold;
    position: relative;
    background-color:#F9E55B;
}

/* main .card button:before{
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    width: 0;
    background-color: black;
    transition: all .5s;
    margin: 0;
}

main .card button::after{
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: 0;
    background-color: black;
    transition: all .5s;
} */

main .card button:hover::before{
    width: 30%;
}

main .card button:hover::after{
    width: 30%;
}


    </style>
    <?php
      include_once 'userheader.php';
   ?>

   <main>
       <?php
          while($row = mysqli_fetch_assoc($all_product)){
       ?>
       <div class="card">
           <div class="image">
               <img src="../<?php echo $row["product_image"]; ?>" alt="">
           </div>
           <div class="caption">
               <p class="rate">
               <i class='bx bxs-star'></i>
               <i class='bx bxs-star'></i>
               <i class='bx bxs-star'></i>
               <i class='bx bxs-star'></i>
               <i class='bx bxs-star'></i>
               </p>
               <p class="product_name"><?php echo $row["product_name"];  ?></p>
               <p class="price"><b>$<?php echo $row["price"]; ?></b></p>
               <p class="discount"><b><del>$<?php echo $row["discount"]; ?></del></b></p>
           </div>
           <button class="add" data-id="<?php echo $row["product_id"];  ?>">Add to cart</button>
       </div>
       <?php

          }
     ?>
   </main>
   <script>
       var product_id = document.getElementsByClassName("add");
       for(var i = 0; i<product_id.length; i++){
           product_id[i].addEventListener("click",function(event){
               var target = event.target;
               var id = target.getAttribute("data-id");
               var xml = new XMLHttpRequest();
               xml.onreadystatechange = function(){
                   if(this.readyState == 4 && this.status == 200){
                       var data = JSON.parse(this.responseText);
                       target.innerHTML = data.in_cart;
                       document.getElementById("badge").innerHTML = data.num_cart + 1;
                   }
               }

               xml.open("GET","../connection.php?id="+id,true);
               xml.send();
            
           })
       }
    
   </script>
   <footer>  
    <div class="container">  
        <p>&copy; <?php echo date("Y"); ?> Tela e Commerce. All Rights Reserved.</p>  
        <div class="social-icons">  
            <a href="#"><i class='bx bxl-facebook'></i></a>  
            <a href="#"><i class='bx bxl-twitter'></i></a>  
            <a href="#"><i class='bx bxl-instagram'></i></a>  
            <a href="#"><i class='bx bxl-linkedin'></i></a>  
        </div>  
        <nav>  
            <ul>  
                <li><a href="terms.php">Terms of Service</a></li>  
                <li><a href="privacy.php">Privacy Policy</a></li>  
            </ul>  
        </nav>  
    </div>  
</footer>
    
</body>
</html>