<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Admin Site</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
    
            body, html {
                height: 100%;
                margin: 0;
                font-family: 'Poppins', sans-serif;
            }
            
            .header {
                max-width: 1500px;
                margin: auto;
                padding-left: 10px;
                padding-right: 10px;
                background: #f5f5f5;
            }
    
            .navbar {
                display: flex;
                align-items: center;
                padding: 20px;
                color: black;
            }
    
            nav {
                flex: 1;
                text-align: right;
            }
    
            nav ul {
                display: inline-block;
                list-style-type: none;
            }
    
            nav ul li {
                display: inline-block;
                margin-right: 20px;
            }
    
            a {
                text-decoration: none;
                color: #555;
                display:inline-block;
            }

            h1 > a:visited, button > a:visited, h1 > a:hover, button > a:hover, h1 > a:active, button > a:active {
                color: #555;
            }
            
            input, .btn, select {
                padding: 5px;
            }

            img {
                width: 80px;
                height: auto;
            }

            a img {
                display:block;
            }
            
            .material-icons.md-red {
                color: #f44336
            }
            
            .material-icons.md-blue {
                color: #2196f3;
                margin-right: 20px;
            }
            
            .div-description {
                max-height: 50px;
                overflow: auto;
                text-align: left;
                padding-left: 10px;
            }
            
            .index-table td {
                min-width: 80px;
                max-width: 350px;
                text-align: center;
                vertical-align: middle;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <div class="navbar">
                <div class="name">
                    <h1><a href="<?php echo BASE_PATH ?>/admin">Admin Site</a></h1>
                </div>
                <nav>
                    <ul>
                        <!-- Put something here -->
                        <li><a href="<?php echo BASE_PATH ?>">Home</a></li>
                        <li><a href="<?php echo BASE_PATH ?>/users/logout">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <br>



