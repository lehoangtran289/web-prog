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
    
            body,
            html {
                height: 100%;
                margin: 0;
                font-family: 'Poppins', sans-serif;
            }
    
            .header {
                width: 100%;
                margin: auto;
                padding-left: 100px;
                padding-right: 100px;
                background-color: #1e1e1eec;
            }
    
            .navbar {
                display: flex;
                align-items: center;
                padding: 20px;
                color: black;
            }
    
            .name h2 {
                color: #fff;
                text-transform: uppercase;
                font-size: 24px;
                font-weight: 700;
                transition: all .3s ease 0s;
            }
    
            .name h2 em {
                font-style: normal;
                color: #ff523b;
            }
    
            nav {
                margin-left: 100px;
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
    
            nav ul li a {
                text-transform: capitalize;
                font-size: 15px;
                font-weight: 500;
                letter-spacing: 0.5px;
                color: #fff;
                transition: all 0.5s;
                margin-top: 5px;
            }
    
            nav ul li a:hover {
                color: #fff;
                padding-bottom: 25px;
                border-bottom: 3px solid #f33f3f;
            }
    
            a {
                color: #555;
                text-decoration: none;
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
        <style>
            section {
                position: relative;
                width: 100%;
                display: flex;
            }
        
            .content-box {
                display: flex;
                width: 50%;
                height: 100%;
                justify-content: flex-end;
                align-items: center;
            }
        
            .form-box {
                width: 80%;
                margin-right: 50px;
            }

            .image-box {
                position: relative;
                display: flex;
                width: 50%;
                align-items: center;
                justify-content: flex-start;
            }

            .image-box img {
                width: 60%;
                height: auto;
                position: absolute;
                object-fit: cover;
            }
        
            .form-box h2 {
                color: #555;
                font-weight: 600;
                font-size: 1.5em;
                text-transform: uppercase;
                margin-bottom: 20px;
                border-bottom: 4px solid #ff523b;
                display: inline-block;
                letter-spacing: 1px;
            }
        
            .input-box {
                margin-bottom: 20px;
            }
        
            .input-box input, .input-box select {
                width: 100%;
                padding: 10px 20px;
                outline: none;
                font-weight: 400;
                border: 1px solid #607d8b;
                font-size: 16px;
                letter-spacing: 1px;
                color: #607d8b;
                background: transparent;
                border-radius: 30px;
            }
        
            .input-box input[type="submit"] {
                background: #ff523b;
                color: #fff;
                outline: none;
                border: none;
                font-weight: 500;
                cursor: pointer;
                margin-top: 20px;
            }
        
            .input-box input[type="submit"]:hover {
                background: #563434;
            }
        
            .input-box p {
                color: #607d8b;
            }
        
            .input-box a {
                color: #ff523b;
            }
    
        </style>
    </head>
    <body>
        <div class="header">
            <div class="navbar">
                <div class="name">
                    <a href="<?php echo BASE_PATH ?>/admin">
                        <h2><em>AD</em>MIN SITE</h2>
                    </a>
                </div>
                <nav class="nav-header">
                    <ul>
                        <!-- Put something here -->
                        <li><a href="<?php echo BASE_PATH ?>">Home</a></li>
                        <li><a href="<?php echo BASE_PATH ?>/users/logout">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <br>
        <div id="body-wrapper">



