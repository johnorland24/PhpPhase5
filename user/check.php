<?php  
session_start();  
include '../connection.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cart_data'])) {  
    $cart_items = unserialize(htmlspecialchars_decode($_POST['cart_data']));  

    if ($cart_items) {  
        $total_price = 0;  
        foreach ($cart_items as $item) {  
            $total_price += $item['price']; // Calculate the total price  
            echo "<div class='product'>";  
            echo "<p>Product Name: " . htmlspecialchars($item['product_name']) . "</p>";  
            echo "<p>Price: $" . htmlspecialchars($item['price']) . "</p>";  
            echo "<p>Discount: <del>$" . htmlspecialchars($item['discount']) . "</del></p>";  
            echo "<img src='../" . htmlspecialchars($item['product_image']) . "' alt=''>";  
            echo "</div>";  
        }  
        ?>  

        <form method="post" action="payment.php">  
            <input type="hidden" name="total_price" value="<?php echo htmlspecialchars($total_price); ?>">  
            <?php foreach ($cart_items as $key => $item): ?>  
                <input type="hidden" name="product_id[]" value="<?php echo htmlspecialchars($item['product_id']); ?>">  
            <?php endforeach; ?>  
            <button type="submit" style="font-size: 20px; padding: 10px;">Proceed to Payment</button>  
        </form>  

        <?php  
    } else {  
        echo "No items in the cart.";  
    }  
} else {  
    echo "Invalid request.";  
}  
?>