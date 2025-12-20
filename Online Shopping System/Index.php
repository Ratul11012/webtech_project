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

        /*// Brand Name Styling */
        .brandName{
            font-family:'lucida handwriting', cursive;
            font-weight: bold;
            color: white;
            margin-right: auto;
            text-decoration: none;
            letter-spacing: 2px;
            text-align: center;
            flex-grow:1;
            
        }


        /* Main Content Styling */

        .main{
            margin-top: 100px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            justify-items: center;
            padding: 20px;

            
        }

        .product{
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12x rgba(0, 0, 0, 0.1);
            margin: 20px;
            border: 2px solid black;
            max-width: 300px;
            padding: 30px;
            text-align: center;

        }

        .product:hover{
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

          .product a{
            display:block;
            text-decoration: none;
            color: black;
            background-color: #5e94b8ff;
            padding: 10px;
            width: 100%;
            margin-top: 10px;
            
        }
        
        .product a:hover{
            background-color: darkorange;
        }

        .product h2{
            margin: 15px 0;
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }


        .product p{
            fomnt-size: 14px;
            color: #666;
        }



        /* Product Image Styling */ 

        .product img{
            width: 100px;
            height: 200px;
            object-fit: cover;
            border-bottom: 2px solid black;
        }

        .product .productPrice{
            font-weight: bold;
            font-size: 18px;
            color: #E74C3C; 
            margin: 10px 0;
        }
        
        
   
        /* Footer Styling */

        .footer{
            text-align: center;
            background-color: lightblue;
            color: white;
            position:sticky;
            bottom: 0;
            padding: 5px;
            width: 100%;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
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
    <a href="index.php"  class="brandName" style="font-size: 24px; color: #D4AF37;"> ASHTASY </a>       
    
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
        <h2>ASHTASY HOODIE </h2>
        <p>Comfortable and stylish hoodie perfect for casual wear.</p>
        <p class="productPrice">TK. 3999 </p>
        <a href="#">Buy Now</a>
    </div>

      <div class="product"> 
        <img src="productImg/hoodie2.jpg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>Comfortable and stylish black hoodie perfect for casual wear.</p>
        <p class="productPrice">TK. 2899 </p>
        <a href="#">Buy Now</a>
    </div>

    
    <div class="product"> 
        <img src="productImg/hoodie3.jpg" alt="productImg">
        <h2>ASHTASY HOODIE </h2>
        <p>Solid beige hoodie perfect for casual wear.</p>
        <p class="productPrice">TK. 3599 </p>
        <a href="#">Buy Now</a>
    </div>

      <div class="product"> 
        <img src="productImg/hoodie4.jpg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>Cozy charcoal hoodie for effortless everyday style.</p>
        <p class="productPrice">TK. 1599 </p>
        <a href="#">Buy Now</a>
    </div>

    
    <div class="product"> 
        <img src="productImg/hoodie5.jpg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>Cream marble hoodie, effortlessly cool comfort.</p>
        <p class="productPrice">TK. 2199 </p>
        <a href="#">Buy Now</a>
    </div>

      <div class="product"> 
        <img src="productImg/hoodie6.jpg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>Rich mocha hoodie, minimal and effortlessly relaxed.</p>
        <p class="productPrice">TK. 3999 </p>
        <a href="#">Buy Now</a>
    </div>

    
    <div class="product"> 
        <img src="productImg/hoodie7.jpg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>Oversized black quarter-zip hoodie, minimalist design.</p>
        <p class="productPrice">TK. 3799 </p>
        <a href="#">Buy Now</a>
    </div>

      <div class="product"> 
        <img src="productImg/hoodie8.jpg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>Mustard hoodie with 3D black spine graphic.</p>
        <p class="productPrice">TK. 1849 </p>
        <a href="#">Buy Now</a>
    </div>

    
    <div class="product"> 
        <img src="productImg/hoodie9.jpeg" alt="productImg">
        <h2>ASHTASY HOODIE</h2>
        <p>White “PROVIDENCE” print hoodie, casual fit.</p>
        <p class="productPrice">TK. 2199 </p>
        <a href="#">Buy Now</a>
    </div>


        
    <div class="product"> 
        <img src="productImg/jacket1.jpg" alt="productImg">
        <h2>ASHTASY JACKET</h2>
        <p>Beige suede-style zip-up jacket, clean minimal look.</p>
        <p class="productPrice">TK. 4999 </p>
        <a href="#">Buy Now</a>
    </div>

     <div class="product"> 
        <img src="productImg/jacket4.jpeg" alt="productImg">
        <h2>ASHTASY JACKET</h2>
        <p>White “PROVIDENCE” print jacket, casual fit.</p>
        <p class="productPrice">TK. 2199 </p>
        <a href="#">Buy Now</a>
    </div>

    <div class="product"> 
        <img src="productImg/jacket2.jpg" alt="productImg">
        <h2>ASHTASY JACKET</h2>
        <p>White “PROVIDENCE” print jacket, casual fit.</p>
        <p class="productPrice">TK. 2199 </p>
        <a href="#">Buy Now</a>
    </div>

    <div class="product"> 
        <img src="productImg/jacket3.jpg" alt="productImg">
        <h2>ASHTASY JACKET</h2>
        <p>White “PROVIDENCE” print jacket, casual fit.</p>
        <p class="productPrice">TK. 2199 </p>
        <a href="#">Buy Now</a>
    </div>



    </main>



    <footer class="footer">

        <p>&copy; 2025 ASHTASY BD, ALL RIGHTS RESERVED. DESIGNED & DEVELOPED BY MUSTAKIM & FAHIM.</p>

    </footer>


    </body>
</html>