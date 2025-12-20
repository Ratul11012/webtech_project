<!DOCTYPE html>
<html>
    <head>
        <title>Online Shopping System</title>
       
        <style>
        
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
            font-family: Arial, sans-serif;
        }

        .body{
            background-color: lightgray;
            color:#333;
        }

        /* Header Styling */

        .header{
                background-color:  #0d1553a7;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 20px 30px;     
                position: fixed;
                width: 100%;
                top: 0; 
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        
        .header a{
            text-decoration: none;
            color: white;
            font-size: 12px;
            font-weight: bold;
            margin-left: 20px;
        }

        .header ul{
            display: flex;
            list-style: none;
        }

        .header li{
            margin-right:50px;

        }

        .header a:hover{
            color: orange;
        }

        /* Main Content Styling */

        .main{
            margin-top: 100px;
            display: flex;
            flex-wrap: wrap;
            justify-content:center;
            margin-bottom: 90px;

            
        }

        .product{
            margin: 20px;
            border: 2px solid black;
            max-width: 300px;
            padding: 30px;
            text-align: center;
            
         
        }

          .product a{
            display: block;
            text-decoration: none;
            color: black;
            background-color: greenyellow;
            padding: 10px;
            width: 100%;
            margin-top: 10px;

            
        }
        
        .product a:hover{
            background-color: darkorange;
        }



        /* Product Image Styling */ 

        .product img{
            width: 130px;
        }

        .productPrice{
            font-weight: bold;
            font-size: 20px;
            color: darkred;
        }
        
        

        .footer{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: lightblue;
            position: fixed;
            bottom: 0;
            padding: 2px;
            width: 100%;
        }

        .footer p{
            text-align: center;
            font-size: 14px;
            color: black;
        }



        </style>


    </head>
    <body>

    <header class="header">
    <a href="index.php">SHOP</a>
    <nav> 
    <ul>

        <li> <a href=" ">LOGIN </a> </li>
        <li> <a href="register.php">SIGNUP </a> </li>
        <li> <a href="">DASHBOARD </a> </li>
     
    </ul>
    </nav>
    </header>


    <main class="main"> 

    <div class="product"> 
        <img src="productImg/hoodie1.jpg" alt="productImg">
        <h2>product title </h2>
        <p>product description</p>
        <p>product quantity </p>
        <p class="productPrice">product price </p>
        <a href="#">Buy Now</a>
    </div>

      <div class="product"> 
        <img src="productImg/hoodie2.jpg" alt="productImg">
        <h2>product title </h2>
        <p>product description</p>
        <p>product quantity </p>
        <p class="productPrice">product price </p>
        <a href="#">Buy Now</a>
    </div>

    
    <div class="product"> 
        <img src="productImg/hoodie3.jpg" alt="productImg">
        <h2>product title </h2>
        <p>product description</p>
        <p>product quantity </p>
        <p class="productPrice">product price </p>
        <a href="#">Buy Now</a>
    </div>

      <div class="product"> 
        <img src="productImg/hoodie4.jpg" alt="productImg">
        <h2>product title </h2>
        <p>product description</p>
        <p>product quantity </p>
        <p class="productPrice">product price </p>
        <a href="#">Buy Now</a>
    </div>

    
    <div class="product"> 
        <img src="productImg/hoodie5.jpg" alt="productImg">
        <h2>product title </h2>
        <p>product description</p>
        <p>product quantity </p>
        <p class="productPrice">product price </p>
        <a href="#">Buy Now</a>
    </div>

      <div class="product"> 
        <img src="productImg/hoodie6.jpg" alt="productImg">
        <h2>product title </h2>
        <p>product description</p>
        <p>product quantity </p>
        <p class="productPrice">product price </p>
        <a href="#">Buy Now</a>
    </div>

    
    <div class="product"> 
        <img src="productImg/hoodie7.jpg" alt="productImg">
        <h2>product title </h2>
        <p>product description</p>
        <p>product quantity </p>
        <p class="productPrice">product price </p>
        <a href="#">Buy Now</a>
    </div>

      <div class="product"> 
        <img src="productImg/hoodie8.jpg" alt="productImg">
        <h2>product title </h2>
        <p>product description</p>
        <p>product quantity </p>
        <p class="productPrice">product price </p>
        <a href="#">Buy Now</a>
    </div>

    
    <div class="product"> 
        <img src="productImg/hoodie9.jpeg" alt="productImg">
        <h2>product title </h2>
        <p>product description</p>
        <p>product quantity </p>
        <p class="productPrice">product price </p>
        <a href="#">Buy Now</a>
    </div>




    </main>


    <footer class="footer">

        <p>&copy; 2025 Online Shopping System. All rights reserved.</p>

    </footer>


    </body>
</html>