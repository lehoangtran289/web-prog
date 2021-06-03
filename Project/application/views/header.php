<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
              rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>JHenloCheems Shop</title>
        
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
                max-width: 1500px;
                margin: auto;
                padding-left: 10px;
                padding-right: 10px;
                background: #ffffff;
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
            }
            
            .pagination {
                display: inline-block;
            }
            
            .pagination a {
                color: black;
                float: left;
                padding: 8px 16px;
                text-decoration: none;
            }
            
            .searchBar {
                width: 40%;
                margin-left: 10%;
                display: flex;
                flex-direction: row;
                align-items: center;
            }
            
            #searchQueryInput {
                width: 100%;
                height: 2.8rem;
                background: #f5f5f5;
                outline: none;
                border: none;
                border-radius: 1.625rem;
                padding: 0 3.5rem 0 1.5rem;
                font-size: 1rem;
            }
            
            #searchQuerySubmit {
                width: 3.5rem;
                height: 2.8rem;
                margin-left: -3.5rem;
                background: none;
                border: none;
                outline: none;
            }
            
            #searchQuerySubmit:hover {
                cursor: pointer;
            }
        </style>
        
        <script type="text/javascript">
            function showButton() {
                loginButton = document.getElementById('login');
                logoutButton = document.getElementById('logout');
                if (localStorage.getItem("isLoggedIn") === 'true') {
                    loginButton.style.display = 'none';
                    logoutButton.style.display = 'inline-block';
                } else {
                    logoutButton.style.display = 'none';
                    loginButton.style.display = 'inline-block';
                }
            }
            
            let processSearch = () => {
                const input = document.getElementById("searchQueryInput").value;
                if (input) {
                    window.location.href = "<?php echo BASE_PATH . "/products/page/1/"?>" + input;
                }
            }
        
        </script>
    </head>
    
    <body>
        <div class="header">
            <div class="navbar">
                <div class="name">
                    <h1><a href="<?php echo BASE_PATH ?>">J Henlo Cheems</a></h1>
                </div>
                <div class="searchBar">
                    <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search" value=""/>
                    <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit" onclick="processSearch()">
                        <span class="material-icons md-24">search</span>
                    </button>
                </div>
                <nav class="nav-header">
                    <ul>
                        <!-- Put something here -->
                        <li><a href="<?php echo BASE_PATH . '/products/page' ?>">Products</a></li>
                        <li><a href="<?php echo BASE_PATH . '/users/update' ?>">Account</a></li>
                        <li id="login"><a href="<?php echo BASE_PATH ?>/users/login">Log in</a> <br></li>
                        <li id="logout"><a href="<?php echo BASE_PATH ?>/users/logout">Log out</a></li>
                    </ul>
                </nav>
                <a href="<?php echo BASE_PATH ?>/carts/index">
                    <a href="<?php echo BASE_PATH . '/carts/index' ?>"><img
                                src="<?php echo BASE_PATH ?>/images/cart.png"
                                width="30px" height="30px">
                    </a>
            </div>
        </div>
        <script>showButton();</script>