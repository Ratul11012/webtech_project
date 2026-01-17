<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['theme'])) {
    $_SESSION['theme'] = 'light'; // Default theme
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>ASHTASY BD</title>
    <style>

        /*light mode*/
        body.light-mode {
            background-color: white;
            color: black;
        }

        /* Dark mode */
        body.dark-mode {
            background-color: black;
            color: white;
        }

        button {
            padding: 10px;
            font-size: 12px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 5px;
            background-color: #5e94b8;
            color: white;
        }

        button:hover {
            background-color: #FFD700;
        }
        
    </style>
</head>

<body>

    <center>
        <h3 id="pagetitle">Light Mode</h3>
        <button id="switchbutton" onclick="toggle()">Switch to Dark Mode</button>
    </center>

    <script>
        window.onload = function() {
            const storedTheme = localStorage.getItem('theme');
            if (storedTheme === 'dark') {
                document.body.style.backgroundColor = 'black';
                document.body.style.color = 'white';
                document.getElementById('pagetitle').innerHTML = '';
                document.getElementById('switchbutton').innerHTML = 'Switch to Light Mode';
            } else {
                document.body.style.backgroundColor = 'white';
                document.body.style.color = 'black';
                document.getElementById('pagetitle').innerHTML = '';
                document.getElementById('switchbutton').innerHTML = 'Switch to Dark Mode';
            }
        }


        function toggle() {
            var title = document.getElementById("pagetitle");
            var button = document.getElementById("switchbutton");

            if (document.body.style.backgroundColor === "black") {
                document.body.style.backgroundColor = "white";
                document.body.style.color = "black";
                title.innerHTML = "";
                button.innerHTML = "Switch to Dark Mode";
                localStorage.setItem('theme', 'light');
             
            } else {
                document.body.style.backgroundColor = "black";
                document.body.style.color = "white";
                title.innerHTML = "";
                button.innerHTML = "Switch to Light Mode";
                localStorage.setItem('theme', 'dark'); 
            }
        }
    </script>

</body>
</html>
