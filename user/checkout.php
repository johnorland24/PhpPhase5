<?php  
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cart_data'])) {  
    $cart_items = unserialize(htmlspecialchars_decode($_POST['cart_data']));  

    if ($cart_items) {  
        foreach ($cart_items as $item) {  
            // Here you can process each item for payment, etc.  
            echo "<div class='product'>";  
            echo "<p>Product Name: " . htmlspecialchars($item['product_name']) . "</p>";  
            echo "<p>Price: $" . htmlspecialchars($item['price']) . "</p>";  
            echo "<p>Discount: <del>$" . htmlspecialchars($item['discount']) . "</del></p>";  
            echo "<img src='../" . htmlspecialchars($item['product_image']) . "' alt=''>";  
            echo "</div>";  
        }  
    } else {  
        echo "No items in the cart.";  
    }  
} else {  
    echo "Invalid request.";  
}  
?>