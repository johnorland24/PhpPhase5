<?php  
session_start();  
include '../connection.php'; // Database connection file  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    // Check if user is logged in  
    if (!isset($_SESSION['user_id'])) {  
        // Redirect to login page instead of showing a direct message  
        header('Location: login.php'); // Change this to your login page  
        exit();  
    }  

    // Get total price from the form  
    $total_price = $_POST['total_price'];  
    $user_id = $_SESSION['user_id']; // User ID stored in session  
    $product_ids = implode(',', $_SESSION['cart']); // Assume your cart is stored in session  

    // Simulate a successful payment process (replace with actual payment processing logic)  
    $payment_successful = true; // Change this according to payment status  

    if ($payment_successful) {  
        // Prepare SQL statement to insert order  
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, product_ids, total_price, payment_status) VALUES (?, ?, ?, ?)");  
        $payment_status = "successful";  
        $stmt->execute([$user_id, $product_ids, $total_price, $payment_status]);  

        // Redirect to thank-you page  
        header('Location: thank_you.php');  
        exit();  
    } else {  
        // Generic error message for payment issues  
        echo "Payment failed. Please try again.";  
    }  
} else {  
    // Handle invalid request method  
    echo "Invalid request method.";  
}  
?>