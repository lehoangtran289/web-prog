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
        <span style="font-size: medium; color: blue; ">Welcome to the Distance Calculator</span>
        <br>The page that calculates the distances from Chicago
        <br>Select a destination:
        <form action="CheckDistance.php" method="GET">
            <select name="destinations[]" multiple="multiple" size="5">
                <option> Boston </option>
                <option> Dallas </option>
                <option> Miami </option>
                <option> Nashville </option>
                <option> Las Vegas </option>
                <option> Pittsburgh </option>
                <option
            </select>
            <br>
            <input type="submit" value="Click to Submit">
            <input type="reset" value="Erase and  Restart">
        </form>
    </body>
</html>