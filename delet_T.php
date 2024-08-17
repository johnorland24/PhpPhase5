<?php  
// Database connection details  
$servername = "localhost";  
$username = "root"; // Change this as needed  
$password = ""; // Change this as needed  
$dbname = "addtocart";  

// Create connection  
$conn = new mysqli($servername, $username, $password, $dbname);  

// Check connection  
if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  
}  

// Check if product_id is set  
if (isset($_POST['product_id'])) {  
    $product_id = $_POST['product_id'];  

    // Prepare delete statement  
    $stmt = $conn->prepare("DELETE FROM product WHERE product_id = ?");  
    $stmt->bind_param("i", $product_id);  
    
    if ($stmt->execute()) {  
        echo 'success';  
    } else {  
        echo 'error';  
    }  

    $stmt->close();  
}  

$conn->close();  
?>