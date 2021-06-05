<script type='text/javascript'>

    function validatePurchase() {
        var shipment = 'None';
        var payment = 'None';

        const shipments = document.querySelectorAll('input[name="shipment-method"]');
        for (const rb of shipments) {
            if (rb.checked) {
                shipment = rb.value;
                break
            }
        }

        const payments = document.querySelectorAll('input[name="payment-method"]');
        for (const rb of payments) {
            if (rb.checked) {
                payment = rb.value;
                break;
            }
        }
        console.log(payment);
        if (shipment == 'None') {
            alert('Please choose shipment method!');
            return false;
        }

        if (payment == 'None') {
            alert('Please choose payment method!');
            return false;
        }
        let in_cart = <?php echo count($cart)?>;
        if (in_cart == 0) {
            alert("Cart Empty, can not create Order!");
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
    foreach ($cart as $item) { // thong tin san pham lay tu trong bien $item nay nhe son
        //echo "<tr><td>".json_encode($item['Product'])."</td>";
        echo "<tr><td>".$item['Product']['name']."</td>";
        echo "<td>".$item['buy_qty']."</td></tr>";
    }
?>
    <tr>
        <td>Sum</td>
        <td><?php echo $_SESSION['order']['total_bill'] ?></td>
        <input type="hidden" name="user_id" value=<?php echo $user['id']?>>
    </tr>
</table>
Choose Shipment Method
<br>
<?php 
    foreach ($shipment_methods as $method) {
        $methdod_id = $method['Shipment']['id'];
        ?>
            <input type="radio" name="shipment-method" value=<?php echo $methdod_id?>>
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
            <input type="radio" name="payment-method" value=<?php echo $methdod_id?>>
            <label for="pickup"><?php echo $method['Payment']['method']?></label>
        <?php
        //<a href="<?php echo BASE_PATH /orders/confirmOrder">
    }
?>
<br>
<table>
    <tr>
        <td>Address</td>
        <td><input required type="text" name="address" value="<?php echo $user['address']?>"></td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td><input required type="text" name="phone" value="<?php echo $user['phone']?>"></td>
    </tr>
</table>
<input type="submit" name="confirmPurchase" value="Confirm Purchase">
</form>
<!--<button><a href="<!?php echo BASE_PATH?>/users/update">Your profile</a></button><br>
