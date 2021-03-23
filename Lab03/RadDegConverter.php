<?php
    function RadianToDegree($rad) {
        echo is_numeric($rad) ? "The degree of $rad is " . rad2deg($rad) : "Invalid format";
    }
    
    function DegreeToRadian($deg) {
        echo is_numeric($deg) ? "The radian of $deg is " . deg2rad($deg) : "Invalid format";
    }

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
        <h2 style="color: blue">A Rad&Deg Converter</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
            <table>
                <tr>
                    <td>Choose an option:</td>
                    <td>
                        <select id="options" name="options">
                            <option value="deg2rad">Degree To Radian</option>
                            <option value="rad2deg">Radian To Degree</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Enter a number:</td>
                    <td><input type="text" size="10" maxlength="20" name="num"></td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" name="submit" value="Submit"></td>
                    <td align="left"><input type="submit" name="reset" value="Reset"></td>
                </tr>
            </table>
        </form>
        <?php
            if (!empty($_GET['submit'])) {
                $num = $_GET["num"];
                if ($_GET['options'] == 'deg2rad')
                    DegreeToRadian($num);
                if ($_GET['options'] == 'rad2deg')
                    RadianToDegree($num);
            }
        ?>
    </body>
</html>