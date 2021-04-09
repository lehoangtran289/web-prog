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
        <?php
            $menu = array('Tuna Casserole', 'Tuna Sandwich', 'Tuna Pie', 'Grilled Tuna', 'Tuna Surprise');
            
            if (isset($_GET["prefer"])) {
                echo "<span style=\"font-size: medium; color: blue; \">Tuna Cafe Results Received</span>";
                $prefer = $_GET["prefer"];
                echo '<br>Your selection were <ul>';
                foreach ($prefer as $item) {
                    echo "<li>$menu[$item]</li>";
                }
                echo '</ul>';
            } else {
                echo "Nothing is selected!";
            }
        
        ?>
    </body>
</html>