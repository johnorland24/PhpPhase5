<?php  
$message = "";  
$error = "";  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
    $host = 'localhost'; // Change if needed  
    $db = 'addtocart';  
    $user = 'root'; // Change if needed  
    $pass = ''; // Change if needed  

    $connection = new mysqli($host, $user, $pass, $db);  
    
    if ($connection->connect_error) {  
        die("Connection failed: " . $connection->connect_error);  
    }  

    $username = $connection->real_escape_string($_POST['username']);  
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  

    // Check if the username already exists  
    $checkUserQuery = "SELECT * FROM users WHERE username = '$username'";  
    $result = $connection->query($checkUserQuery);  

    if ($result->num_rows > 0) {  
        // Username already exists  
        $error = "Username already taken. Please choose another username.";  
    } else {  
        // Proceed with the insertion if username does not exist  
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";  

        if ($connection->query($sql) === TRUE) {  
            $message = "Registration successful";  
        } else {  
            $error = "Error: " . $sql . "<br>" . $connection->error;  
        }  
    }  

    $connection->close();  
}  
?>  
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="styles.css">  
    <title>User Registration</title>  
    <style>  
        body {  
            font-family: 'Arial', sans-serif;  
            background-color: #f4f4f4;  
            margin: 0;  
            padding: 0;  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            height: 100vh;  
            background-image: url('tesla-background.jpg'); /* Optional: Add a background image */  
            background-size: cover;  
            background-position: center;  
        }  

        .container {  
            max-width: 500px;  
            width: 100%;  
            margin: 0 auto;  
            padding: 20px;  
            background: rgba(255, 255, 255, 0.9);  
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);  
            border-radius: 8px;  
        }  

        h2 {  
            text-align: center;  
            color: #333;  
            margin-bottom: 20px;  
        }  

        form {  
            display: flex;  
            flex-direction: column;  
            margin: 15px 0;  
        }  

        input {  
            margin: 10px 0;  
            padding: 15px;  
            border: 1px solid #ddd;  
            border-radius: 5px;  
            font-size: 16px;  
        }  

        button {  
            padding: 15px;  
            background-color: #e82127; /* Tesla red */  
            border: none;  
            border-radius: 5px;  
            color: white;  
            font-size: 16px;  
            cursor: pointer;  
            transition: background-color 0.3s;  
        }  
        .register-link{  
            margin-top: 1rem;  
            color: #888;  
        }  
        .register-link a{  
            color:#e82127;  
            text-decoration:none;  
        }  
        
        button:hover {  
            background-color: #b71c24; /* Darker red for hover effect */  
        }  

        @media (max-width: 480px) {  
            .container {  
                padding: 15px;  
            }  

            button {  
                font-size: 14px;  
            }  

            input {  
                font-size: 14px;  
            }  
        }  
    </style>  
</head>  
<body>  

    <div class="container">  
        <img style="width: 50px; height: 40px;" src="../uploads/icon.svg" alt="">    
        <h2 style="color:green"><?php echo $message ?></h2>   
        <h2 style="color:red"><?php echo $error?></h2>   
        <h2>Register</h2>  
        <form action="" method="POST">  
            <input type="text" name="username" placeholder="Username" required>  
            <input type="password" name="password" placeholder="Password" required>  
            <button name="submit" type="submit">Register</button>  
            <p class="register-link">I have account! <a href="signIn.php">login here</a></p>  
        </form>  
    </div>  

</body>  
</html>