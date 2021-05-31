<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table, th, td {
    border: 1px solid black;
    }
</style>
</head>
<body>
    Your Cart:
    <br>
    <?php
        session_start();
        if ($cart != 'None') {
            echo '<table>';
            foreach ($cart as $item) {
                echo '<th>';
                print_r($item); echo'</th>'//<th>'.$item["buy_quantity"].'</th>';
                ?>
                <form action="<?php echo BASE_PATH ?>/carts/addToCart" method='POST'>
                    <th><input type="number" name='buy_quantity' value=<?php echo $item["buy_quantity"]?>></th>
                </form>
                <form action="<?php echo BASE_PATH ?>/carts/removeFromCart" method='POST'>
                    <input type="hidden" id="id" name="id" value=<?php echo $item['0']['Product']['id'] ?>>
                    <th><input type="submit" value="Remove"></th>
                </form>
                <?php
                echo '</tr>';
            }
            echo '</table>';
            echo "<button><a href='" . BASE_PATH . "/orders/index'" . ">Buy</a></button>";
        } else {
            echo 'Cart empty';
        }
    ?>
   
    
</body>
</html>