<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <?php
        $bg = $_COOKIE['bg'];
        $fg = $_COOKIE['fg'];
    ?>
    <body bgcolor="<?= $bg ?>" text="<?= $fg ?>">
        <h1> Welcome to the Store</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, dolore dolores esse facere nam obcaecati
            perspiciatis quaerat temporibus! Cupiditate doloremque ex expedita id nam numquam, obcaecati officia quas
            quos vitae.</p>
        Would you like to <a href="PrefSelection.html">Change your preferences?</a>
    </body>
</html>