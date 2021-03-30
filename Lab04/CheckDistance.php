<?php
    $cities = array('Dallas' => 803, 'Toronto' => 435, 'Boston' => 848,
            'Nashville' => 406, 'Las Vegas' => 1526, 'San Francisco' => 1835,
            'Washington, DC' => 595, 'Miami' => 1189, 'Pittsburgh' => 409);
?>

<?php
    if (isset($_GET["destinations"])) {
        $destinations = $_GET["destinations"];
    //    print_r($destinations);
    }
    
    function printResult($destinations, $cities) {
        echo "<table>
                <tr>
                <th>No</th>
                <th>Destination</th>
                <th>Distance</th>
                <th>Driving Time</th>
                <th>Walking Time</th>
                </tr>";
        for ($i = 0; $i < count($destinations); $i++) {
            if (isset($cities[$destinations[$i]])) {
                $distance = $cities[$destinations[$i]];
                $time = round(($distance / 60), 2);
                $walktime = round(($distance / 5), 2);
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>" . $destinations[$i] . "</td>";
                echo "<td>" . $distance . "</td>";
                echo "<td>" . $time . "</td>";
                echo "<td>" . $walktime . "</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Distance and Time Calculation</title>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <?php
            if (isset($destinations)) {
                printResult($destinations, $cities);
            } else {
                echo "Nothing is selected!";
            }
        ?>
    
    </body>
</html>