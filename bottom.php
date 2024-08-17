

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href='https://unpkg.com/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <style>
        /* Footer Styles */  

/* Responsive Styles */  
@media (max-width: 768px) {  
    .footer-container {  
        flex-direction: column; /* Stack elements vertically on smaller screens */  
        align-items: center; /* Center align items */  
    }  

    .footer-nav, .footer-social {  
        width: 100%; /* Make nav and social sections full width */  
        text-align: center; /* Center align text */  
        margin: 10px 0; /* Adjust margin */  
    }  

    .footer-social .social-icons {  
        margin-top: 5px; /* Reduce margin on smaller screens */  
    }  

    .footer-nav a, .footer-social a {  
        display: inline-block; /* Make links inline-block for better spacing */  
        margin: 0 10px; /* Add horizontal space between links */  
    }  
}  

@media (max-width: 480px) {  
    .footer-nav h3, .footer-social h3 {  
        font-size: 18px; /* Smaller heading font size */  
    }  

    .footer-social .social-icons a {  
        font-size: 20px; /* Smaller icon size for mobile */  
    }  
}
    </style>
<footer class="footer">  
    <div class="footer-container">  
        <div class="footer-nav">  
            <h3>Navigational Links</h3>  
            <ul>  
                <li><a href="#">Home</a></li>  
                <li><a href="#">Shop</a></li>  
                <li><a href="#">About Tesla</a></li>  
                <li><a href="#">Support</a></li>  
                <li><a href="#">Contact Us</a></li>  
                <li><a href="#">Privacy Policy</a></li>  
                <li><a href="#">Terms of Service</a></li>  
            </ul>  
        </div>  
        <div class="footer-social">  
            <h3>Follow Us</h3>  
            <div class="social-icons">  
                <a href="https://facebook.com" target="_blank"><i class='bx bxl-facebook'></i></a>  
                <a href="https://twitter.com" target="_blank"><i class='bx bxl-twitter'></i></a>  
                <a href="https://instagram.com" target="_blank"><i class='bx bxl-instagram'></i></a>  
                <a href="https://linkedin.com" target="_blank"><i class='bx bxl-linkedin'></i></a>  
                <a href="https://youtube.com" target="_blank"><i class='bx bxl-youtube'></i></a>  
            </div>  
        </div>  
    </div>  
    <div class="footer-bottom">  
        <p>© 2023 Tesla Inc. All Rights Reserved.</p>  
    </div>  
</footer>  
</body>
</html>