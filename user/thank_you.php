<?php  
session_start();  
?>  

<!DOCTYPE html>  
<html lang="en">  
    <style>
        body {  
    font-family: Arial, sans-serif;  
    margin: 0;  
    padding: 0;  
    display: flex;  
    justify-content: center;  
    align-items: center;  
    height: 100vh;  
    background-color: #f8f9fa;  
}  

.thank-you-container {  
    text-align: center;  
    padding: 20px;  
    background-color: white;  
    border-radius: 5px;  
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  
}  

.btn {  
    display: inline-block;  
    margin-top: 20px;  
    padding: 10px 20px;  
    background-color: #007bff;  
    color: white;  
    text-decoration: none;  
    border-radius: 5px;  
}  

.btn:hover {  
    background-color: #0056b3;  
}
    </style>
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Thank You for Your Purchase</title>  
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->  
</head>  
<body>  
    <div class="thank-you-container">  
        <h1>Thank You for Your Purchase!</h1>  
        <p>Your order has been successfully placed. We'll send you an email confirmation shortly.</p>  
        <p>Your order will be processed, and you'll receive updates regarding delivery.</p>  
        <a href="user.php" class="btn">Continue Shopping</a>  
    </div>  
</body>  
</html>