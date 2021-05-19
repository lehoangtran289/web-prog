<?php
    $colors = array('black' => '#000000',
        'white' => 'ffffff',
        'red' => '#ff0000',
        'blue' => '#0000ff');
    
    $bg_name = $_POST['background'];
    $fg_name = $_POST['foreground'];
    
    setcookie('bg', $colors[$bg_name]);
    setcookie('fg', $colors[$fg_name]);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        Thank you. your preferences have been changed to: <br>
        Background: <?= $bg_name ?> <br>
        Foreground: <?= $fg_name ?> <br>
        
        Click <a href="prefs-demo.php">here</a> to see the preferences in action.
    </body>
</html>
