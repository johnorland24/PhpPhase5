<?php  
require_once 'connection.php';  

$sql_cart = "SELECT * FROM cart";  
$all_cart = $conn->query($sql_cart);  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="font/css/all.min.css">  
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>  
    <title>In Cart Products</title>  
    <style>  
        body {  
            font-family: Arial, sans-serif;  
            margin: 0;  
            padding: 0;  
            line-height: 1.6;  
            background: #f4f4f4;  
        }  

        main {  
            max-width: 1200px;  
            margin: 20px auto;  
            padding: 20px;  
            background: #fff;  
            border-radius: 8px;  
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  
        }  

        h1 {  
            text-align: center;  
            color: #333;  
        }  

        .card {  
            display: flex;  
            margin: 10px 0;  
            padding: 15px;  
            background: #f9f9f9;  
            border: 1px solid #ddd;  
            border-radius: 4px;  
            transition: 0.3s;  
        }  

        .card:hover {  
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);  
        }  

        .images {  
            flex: 1;  
            display: flex;  
            justify-content: center;  
            align-items: center;  
        }  

        .images img {  
            max-width: 100%;  
            height: auto;  
            border-radius: 4px;  
            display: block; /* For image alignment */  
        }  

        .caption {  
            flex: 2;  
            padding-left: 15px;  
        }  

        .rate i {  
            color: gold;  
        }  

        .product_name {  
            font-size: 1.2em;  
            font-weight: bold;  
            margin: 0.5em 0;  
        }  

        .price, .discount {  
            font-size: 1em;  
            margin: 0.5em 0;  
        }  

        .price {  
            color: green;  
        }  

        .discount {  
            color: red;  
            text-decoration: line-through;  
        }  

        button.remove {  
            background: #f44336;  
            color: #fff;  
            padding: 10px;  
            border: none;  
            border-radius: 4px;  
            cursor: pointer;  
            transition: background 0.3s;  
        }  

        button.remove:hover {  
            background: #d32f2f;  
        }  

        @media (max-width: 768px) {  
            .card {  
                flex-direction: column;  
                align-items: center;  
                text-align: center;  
            }  

            .caption {  
                padding-left: 0;  
                padding-top: 10px;  
            }  
        }  
    </style>  
</head>  
<body>  
    <?php include_once 'header.php'; ?>  

    <main>  
        <h1><?php echo mysqli_num_rows($all_cart); ?> Items</h1>  
        <hr>  
        <?php  
          while ($row_cart = mysqli_fetch_assoc($all_cart)) {  
              $sql = "SELECT * FROM product WHERE product_id=" . $row_cart["product_id"];  
              $all_product = $conn->query($sql);  
              while ($row = mysqli_fetch_assoc($all_product)) {  
        ?>  
        <div class="card">  
            <div class="images">  
                <img src="<?php echo $row["product_image"]; ?>" alt="">  
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
                <button class="remove" data-id="<?php echo $row["product_id"]; ?>"><i class='bx bxs-folder-minus'></i></button> 
            </div>  
        </div>  
        <?php  
              }  
          }  
        ?>  
    </main>  

    <script>  
        var remove = document.getElementsByClassName("remove");  
        for (var i = 0; i < remove.length; i++) {  
            remove[i].addEventListener("click", function(event) {  
                var target = event.target; 
                var cart_id = target.getAttribute("data-id");  
                var xml = new XMLHttpRequest();  
                xml.onreadystatechange = function() {  
                    if (this.readyState == 4 && this.status == 200) {  
                        target.innerHTML = this.responseText;  
                        target.style.opacity = .3;  
                    }  
                }  

                xml.open("GET", "connection.php?cart_id=" + cart_id, true);  
                xml.send();  
            });  
        }  
    </script>  
    
    <?php include_once 'footer.php'; ?>  
</body>  
</html>