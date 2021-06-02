<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin Site</title>
        <style>
            a {
                text-decoration: none;
            }

            h1 > a:visited, button > a:visited, h1 > a:hover, button > a:hover, h1 > a:active, button > a:active {
                color: #000;
            }

            img {
                width: 80px;
                height: auto;
            }
        </style>
    </head>
    <h1><a href="<?php echo BASE_PATH ?>/admin">Admin Site</a></h1>
    <body>

        <button><a href="<?php echo BASE_PATH ?>/users/logout">Log out</a></button>



