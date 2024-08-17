<?php

require_once '../connection.php';

$sql_cart = "SELECT * FROM cart";
$all_cart = $conn->query($sql_cart);

?>


<main>  
    
<h1><?php echo mysqli_num_rows($all_cart); ?> Items</h1>  
    <hr>  
    <?php session_start();  

if (isset($_POST['checkout'])) {  
    $_SESSION['cart_items'] = $all_cart; // Assuming $all_cart is an array of cart items.  
    header("Location: checkout.php");  
    exit();  
} ?>
    
   

   
    <!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="user/style.css"> <!-- Add your CSS file here -->  
    <title>Checkout</title>  
    <html>
    <style>  
       * {  
    box-sizing: border-box;  
    margin: 0;  
    padding: 0;  
}  

body {  
    font-family: Arial, sans-serif;  
    background-color: #f8f9fa;  
    color: #333;  
    padding: 20px;  
}  

h1 {  
    text-align: center;  
    margin-bottom: 20px;  
}  

hr {  
    margin: 20px 0;  
    border: none;  
    height: 1px;  
    background-color: #ddd;  
}  

.card {  
    background-color: #fff;  
    border: 1px solid #ddd;  
    border-radius: 5px;  
    margin: 10px;  
    padding: 15px;  
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);  
    transition: transform 0.2s;  
}  

.card:hover {  
    transform: scale(1.03);  
}  

.images img {  
    max-width: 100%;  
    height: auto;  
    border-radius: 5px;  
}  

.caption {  
    text-align: center;  
    margin-top: 10px;  
}  

.rate {  
    color: gold;  
    margin-bottom: 5px;  
}  

.product_name {  
    font-weight: bold;  
    margin: 10px 0;  
}  

.price {  
    color: #28a745;  
}  

.discount {  
    color: #dc3545;  
    text-decoration: line-through;  
}  

.remove {  
    background-color: #dc3545;  
    color: white;  
    border: none;  
    padding: 5px 10px;  
    border-radius: 5px;  
    cursor: pointer;  
}  

.remove:hover {  
    background-color: #c82333;  
}  

button[type="submit"] {  
    background-color: #007bff;  
    color: white;  
    border: none;  
    padding: 10px 20px;  
    border-radius: 5px;  
    cursor: pointer;  
    font-size: 18px;  
    display: block;  
    margin: 20px auto;  
    transition: background-color 0.3s;  
}  

button[type="submit"]:hover {  
    background-color: #0056b3;  
}  

@media (max-width: 768px) {  
    .card {  
        margin: 5px;  
        padding: 10px;  
    }  

    button[type="submit"] {  
        font-size: 16px;  
        padding: 8px 15px;  
    }  
}  

@media (min-width: 768px) {  
    .card {  
        width: calc(33.333% - 20px);  
        display: inline-block;  
        vertical-align: top;  
    }  
}
    </style>  

     </body>
      </html>
      <?php  
$cart_items = []; // Array to hold cart items  

while ($row_cart = mysqli_fetch_assoc($all_cart)) {  
    $sql = "SELECT * FROM product WHERE product_id=" . $row_cart["product_id"];  
    $all_product = $conn->query($sql);  
    
    while ($row = mysqli_fetch_assoc($all_product)) {  
        $cart_items[] = $row; // Collecting product details  
        ?>  
         <?php
      include_once 'headCart.php';
          ?>

        <div class="card">  
            <div class="images">  
                <img src="../<?php echo $row["product_image"]; ?>" alt="">  
            </div>  

            <div class="caption">  
                <p class="rate">  
                    <i class="fas fa-star"></i>  
                    <i class="fas fa-star"></i>  
                    <i class="fas fa-star"></i>  
                    <i class="fas fa-star"></i>  
                    <i class="fas fa-star"></i>  
                </p>  
                <p class="product_name"><?php echo $row["product_name"]; ?></p>  
                <p class="price"><b>$<?php echo $row["price"]; ?></b></p>  
                <p class="discount"><b><del>$<?php echo $row["discount"]; ?></del></b></p>  
               
            </div>  
        </div>  
        <?php  
    }  
}  
?>  
<form id="cartForm" method="POST" action="payment.php">  
    <!-- Your cart items here -->  
    <input type="hidden" name="total_price" value="100.00"> <!-- Example total price -->  
    <button type="submit">Proceed to Payment</button>  
</form>

