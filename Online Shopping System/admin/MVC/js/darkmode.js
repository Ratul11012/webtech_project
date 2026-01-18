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
