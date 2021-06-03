<script type='text/javascript'>

    function validatePurchase() {
        var shipment_methods = document.getElementsByName('shipment-method');
        var payment_methods = document.getElementsByName('payment-method');
        var shipment = 'None';
        var payment = 'None';

        for (var i = 0, length = shipment_methods.length; i < length; i++) {
            if (shipment_methods[i].checked) {
                shipment = shipment_methods[i].value;
                break;
            }
        }

        for (var i = 0, length = payment_methods.length; i < length; i++) {
            if (payment_methods[i].checked) {
                var payment = payment_methods[i].value;
                break;
            }
        }

        if (shipment == 'None') {
            alert('Please choose shipment method!');
            return false;
        }

        if (payment == 'None') {
            alert('Please choose payment method!');
            return false;
        }
        return true;
    }

</script>
<form action="<?php echo BASE_PATH ?>/orders/confirmPurchase" method="POST" onsubmit="return validatePurchase()">
<table>
    <tr>
        <th>Item</th>
        <th>Quantity</th>
    </tr>
<?php
    //var_dump($user['0']['User']['id']);
    $total_bill = 0;
    foreach ($cart as $item) { // thong tin san pham lay tu trong bien $item nay nhe son
        //echo "<tr><td>".json_encode($item['Product'])."</td>";
        echo "<tr><td>".$item['Product']['name']."</td>";
        echo "<td>".$item['buy_qty']."</td></tr>";
        $total_bill += (int)$item['Product']['price'] * (int)$item['buy_qty'];
        ?>
        <input type="hidden" name="product_id" value="<?php $item['Product']['price']?>">
        <input type="hidden" name="buy_qty" value="<?php echo $item['buy_qty']?>">
        <?php
    }
?>
    <tr>
        <td>Sum</td>
        <td><?php echo $total_bill ?></td>
        <input type="hidden" name="user_id" value=<?php echo $user['id']?>>
        <input type="hidden" name="total_bill" value="<?php echo $total_bill ?>">
    </tr>
</table>
Choose Shipment Method
<br>
<?php 
    foreach ($shipment_methods as $method) {
        $methdod_id = $method['Shipment']['id'];
        ?>
            <input type="radio" name="shipment-method" id=<?php echo $methdod_id?> value=<?php echo $methdod_id?>>
            <label for="pickup"><?php echo $method['Shipment']['method']?></label>
        <?php
    }
?>
<br>
Choose Payment Method
<br>
<?php 
    foreach ($payment_methods as $method) {
        $methdod_id = $method['Payment']['id'];
        ?>
            <input type="radio" name="payment-method" id=<?php echo $methdod_id?> value=<?php echo $methdod_id?>>
            <label for="pickup"><?php echo $method['Payment']['method']?></label>
        <?php
        //<a href="<?php echo BASE_PATH /orders/confirmOrder">
    }
?>
<br>
<table>
    <tr>
        <td>Address</td>
        <td><input type="text" name="address" value="<?php echo $user['address']?>"></td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td><input type="text" name="phone" value="<?php echo $user['phone']?>"></td>
    </tr>
</table>
<input type="submit" name="confirmPurchase" value="Confirm Purchase">
</form>
<!--<button><a href="<!?php echo BASE_PATH?>/users/update">Your profile</a></button><br>
