<?php
    session_start();
    if (!isset($_SESSION['x'])) {
        $x = rand(1, 100);
        $guess_cnt = 1;
        $_SESSION['x'] = $x;
        $_SESSION['guess_cnt'] = $guess_cnt;
    } else {
        $x = $_SESSION['x'];
        $guess_cnt = $_SESSION["guess_cnt"];
    }
    if (!empty($_GET['restart'])) {
        session_unset();
        $x = rand(1, 99);
        $guess_cnt = 1;
        $_SESSION['x'] = $x;
        $_SESSION['guess_cnt'] = $guess_cnt;
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Guess a number</title>
    </head>
    <body>
        <h2 style="color: blue">Guess a number</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
            <table>
                <tr>
                    <td>Enter a number:</td>
                    <td><input type="text" size="10" maxlength="20" name="num"></td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" name="submit" value="Submit"></td>
                    <td align="left"><input type="submit" name="reset" value="Reset"></td>
                </tr>
                <tr>
                    <td align="right"><input type="submit" name="restart" value="Restart"></td>
                </tr>
            </table>
        </form>
        <table>
            <?php
                if (!empty($_GET['submit'])) {
                    $num = $_GET["num"];
                    if (!is_numeric($num)) {
                        echo "Wrong format<br>";
                    } else {
                        if ($num < $x) {
                            echo "Wrong. Please try a higher number. You have guessed $guess_cnt time!”. <br />";
                            $guess_cnt++;
                        } elseif ($num > $x) {
                            echo "Wrong. Please try a lower number. You have guessed $guess_cnt time!”. <br />";
                            $guess_cnt++;
                        } elseif ($num == $x) {
                            echo "Congrats! You guessed the right number: $x <br />";
                            echo "number of guesses: $guess_cnt";
                            session_unset();
                        } else {
                            echo "Error! Try again<br />";
                        }
                    }
                    $_SESSION["guess_cnt"] = $guess_cnt;
                }
            ?>
        </table>
    
    </body>
</html>