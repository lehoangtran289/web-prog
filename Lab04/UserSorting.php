<?php
    function user_sort($a, $b) {
        // smarts is all-important, so sort it first
        if ($b == 'smarts')
            return 1;
        else if ($a == 'smarts')
            return -1;
        return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
    }
    
    $values = array('name' => 'Buzz Lightyear',
            'email_address' => 'buzz@starcommand.gal',
            'age' => 32,
            'smarts' => 'some');
    $original_values = $values;
    
    if (isset($_POST['submitted'])) {
        $sort_type = $_POST['sort_type'];
        
        switch ($sort_type) {
            case 'sort':
                sort($values);
                break;
            case 'rsort':
                rsort($values);
                break;
            case 'usort':
                usort($values, 'user_sort');
                break;
            case 'ksort':
                ksort($values);
                break;
            case 'krsort':
                krsort($values);
                break;
            case 'uksort':
                uksort($values, 'user_sort');
                break;
            case 'asort':
                asort($values);
                break;
            case 'arsort':
                arsort($values);
                break;
            default:
                uasort($values, 'user_sort');
        }
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
        <style>
            table, th, td {
                border: 1px solid black;
                width: 40%;
            }
            
            th {
                padding: 0.5em;
            }
            
            td {
                padding: 1em;
            }
        </style>
    </head>
    <body>
        <form action="UserSorting.php" method="post">
            <p>
                <input type="radio" name="sort_type" value="sort" checked="checked"/> Standard sort<br/>
                <input type="radio" name="sort_type" value="rsort"/> Reverse sort<br/>
                <input type="radio" name="sort_type" value="usort"/> User-defined sort<br/>
                <input type="radio" name="sort_type" value="ksort"/> Key sort<br/>
                <input type="radio" name="sort_type" value="krsort"/> Reverse key sort<br/>
                <input type="radio" name="sort_type" value="uksort"/> User-defined key sort<br/>
                <input type="radio" name="sort_type" value="asort"/> Value sort<br/>
                <input type="radio" name="sort_type" value="arsort"/> Reverse value sort<br/>
                <input type="radio" name="sort_type" value="uasort"/> User-defined value sort<br/>
                <input type="submit" value="Sort" name="submitted"/>
            </p>
            <table>
                <tr>
                    <th>Unsorted</th>
                    <th>Sorted</th>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo '<p>Values unsorted(before sort): </p>';
                            echo '<ul>';
                            foreach ($original_values as $key => $value) {
                                echo "<li><b>$key</b>: $value</li>";
                            }
                            echo '</ul>';
                        ?>
                    </td>
                    <td>
                        <?php
                            if (isset($_POST['sort_type'])) {
                                echo '<p>Values sorted by ' . $_POST['sort_type'] . ': </p>';
                                echo '<ul>';
                                foreach ($values as $key => $value) {
                                    echo "<li><b>$key</b>: $value</li>";
                                }
                                echo '</ul>';
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>