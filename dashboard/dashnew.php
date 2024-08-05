<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #333;
            color: white;

        }

        .container {
            width: 80%;
            height: 80;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .navbar {

            backdrop-filter: blur(1.7px);
            overflow: hidden;

        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .navbar li {
            float: left;
        }

        .navbar li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar li a:hover {
            background-color: #ddd;
            color: black;
        }

        .tabs {
            margin: 20px 0;
        }

        .tablink {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            margin-right: 2px;
        }

        .tablink:hover {
            background-color: #ddd;
            color: black;
        }

        .tabcontent {
            display: none;
            padding: 20px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .tabcontent h2 {
            margin-top: 0;
        }
    </style>
</head>

<body>



    <div class="container">

    </div>

    <div class="container">
        <nav class="navbar">
            <ul>
                <li><a href="#">Cloth Hunt</a></li>
                <li><a href="#about" id="time">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>

        <div class="tabs">
            <button class="tablink" onclick="openTab(event, 'Tab1')">Tab 1</button>
            <button class="tablink" onclick="openTab(event, 'Tab2')">Tab 2</button>
            <button class="tablink" onclick="openTab(event, 'Tab3')">Tab 3</button>
        </div>

        <div id="Tab1" class="tabcontent">
            <h2>Tab 1</h2>
            <p>Content for Tab 1.</p>
        </div>

        <div id="Tab2" class="tabcontent">
            <h2>Tab 2</h2>
            <p>Content for Tab 2.</p>
        </div>

        <div id="Tab3" class="tabcontent">
            <h2>Tab 3</h2>
            <p>Content for Tab 3.</p>
        </div>
    </div>


    <script>
        function updateDateTime() {
            let now = new Date();
            let dateTimeString = now.toLocaleString();
            document.getElementById("time").textContent = dateTimeString;
        }
        updateDateTime();
        setInterval(updateDateTime, 1000);



        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;

            // Hide all tab content
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Remove the background color of all tablinks
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }

            // Show the current tab and add an "active" class to the button that opened the tab
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.style.backgroundColor = "#ddd";
        }

        // Open the first tab by default
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementsByClassName("tablink")[0].click();
        });
    </script>
</body>

</html>