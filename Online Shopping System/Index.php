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
        }

        .header{
                background-color: gray;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 30px;     
                position: fixed;
                width: 100%;
                top: 0; 
        }

        .header ul li{
            list-style: none;
        }
        
        .header a{
            text-decoration: none;
            color: white;
            font-size: 12px;
            margin-left: 20px;
        }

        .header li{
            display: inline-block;
            margin-right:50px;

        }

        .footer{
            display: flex;
            justify-content: center;
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


    <main> 


    </main>


    <footer class="footer">

        <p>&copy; 2025 Online Shopping System. All rights reserved.</p>

    </footer>


    </body>
</html>