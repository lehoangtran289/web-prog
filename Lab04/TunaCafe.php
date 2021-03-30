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
        <span style="font-size: large; color: blue; ">Welcome to the Tuna Cafe Survey!</span>
        <form action="TunaResults.php" method="get">
            <?PHP
                $menu = array('Tuna Casserole', 'Tuna Sandwich', 'Tuna Pie', 'Grilled Tuna', 'Tuna Surprise');
                $bestseller = 2;
                print "Please indicate all your favorite dishes<br>";
                for ($i = 0; $i < count($menu); $i++) {
                    print "<input type=\"checkbox\" name=\"prefer[]\" value=$i> $menu[$i]";
                    if ($i == $bestseller) {
                        print '<span style="color: #ff0000; "> Our Best Seller!!!! </span>';
                    }
                    print "<br>";
                }
            ?>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </body>
</html>