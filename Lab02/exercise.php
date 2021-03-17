<?php
    $name = $_POST["name"];
    $class = $_POST["class"];
    $university = $_POST["university"];
    $hobbies = $_POST["hobbies"];
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Receiving input</title>
    </head>
    <body>
        <span style="font-size:large;color:blue">Thank you: Got your Input</span>
        <br>Hello, <?= $name ?>
        <br>You are studying at <?= $class, $university ?>
        <?php
            if (empty($hobbies)) {
                echo "<br>No hobbies!!";
            } else {
                echo "<br>Your hobbies are:";
                echo "<ol>";
                foreach ($hobbies as &$hobby) {
                    echo "<li>$hobby</li>";
                }
                echo "</ol>";
            }
        ?>
    </body>
</html>
