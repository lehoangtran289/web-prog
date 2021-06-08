<script type='text/javascript'>
    var shipment_fee = 0;
    
    function chargeFee(fee) {
        var total_bill = <?php echo $_SESSION['order']['total_bill'] ?>;
        total_bill += fee;
        html = "<h1 style=\"color: #ff523b; font-weight: 600\">$" + total_bill + "</h1>";
        document.getElementById("bill").innerHTML = html;
    }
    
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
        let in_cart = <?php echo count($cart) ?>;
        if (in_cart == 0) {
            alert("Cart Empty, can not create Order!");
            return false;
        }
        return true;
    }
</script>

<style>
    .row h2 {
        text-transform: uppercase;
        font-size: 24px;
        font-weight: 700;
        transition: all .3s ease 0s;
    }
    
    .order-page {
        margin: 80px auto;
        min-height: 50%;
    }
    
    .order-info {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    th {
        text-align: left;
        padding: 5px;
        color: #fff;
        background: #1e1e1eec;
        font-weight: normal;
    }
    
    td {
        padding: 10px 5px;
    }
    
    td a {
        color: #ff523b;
    }
    
    td img {
        width: 80px;
        /*height: 80px;*/
        margin-right: 10px;
    }
    
    button {
        background: #f3f3f3;
        padding: 5px 8px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    
    button:hover {
        background: #ff523b;
        color: #fff;
    }
    
    .method-box {
        margin-bottom: 20px;
        width: 100%;
    }
    
    .button {
        border-radius: 5px;
        width: 100%;
        padding: 10px 0;
        text-transform: uppercase;
        font-weight: 700;
    }
</style>

<div>
    <form action="<?php echo BASE_PATH ?>/orders/confirmPurchase" method="POST" onsubmit="return validatePurchase()">
        <div class="small-container order-page">
            <div class="row" style="margin-bottom: 50px;">
                <h2>Confirm order</h2>
            </div>
            <div class="row" style="align-items: stretch;">
                <div class="col-2">
                    <table>
                        <tr>
                            <th>#</th>
                            <th>Products</th>
                            <th>Quantity</th>
                        </tr>
                        <?php
                            $i = 0;
                            foreach ($cart as $item) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td>
                                        <div class="order-info">
                                            <img src="<?php echo BASE_PATH . '/public/images/' . $item['Product']['image'] . '_0.jpg' ?>">
                                            <div>
                                                <p><?php echo $item['Product']['name'] ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $item['buy_qty'] ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                        <tr>
                            <td style="font-size: 22px; font-weight:600">Total</td>
                            <td style="font-size: 22px; font-weight:600; color: #ff523b">
                                $<?php echo $_SESSION['order']['total_bill'] ?></td>
                            <input type="hidden" name="user_id" value=<?php echo $user['id'] ?>>
                        </tr>
                    </table>
                </div>
                
                <div class="col-2" style="padding: 0 60px; min-width: 200px">
                    <div class="method-box">
                        <h4>Shipment Method</h4>
                        <?php
                            foreach ($shipment_methods
                            
                            as $method) {
                            $method_id = $method['Shipment']['id'];
                        ?>
                        <div class="radio-row">
                            <input type="radio" name="shipment-method"
                                   onchange="chargeFee(<?php echo $method['Shipment']['fee'] ?>)"
                                   id="<?php echo $method['Shipment']['method'] ?>" value=<?php echo $method_id ?>>
                            <label for="<?php echo $method['Shipment']['method'] ?>"><?php echo $method['Shipment']['method'] . "<br>Fee: " . $method['Shipment']['fee'] ?></label>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    
                    <div class="method-box">
                        <h4>Payment Method</h4>
                        <?php
                            foreach ($payment_methods
                            
                            as $method) {
                            $method_id = $method['Payment']['id'];
                        ?>
                        <div class="radio-row">
                            <input type="radio" name="payment-method" id="<?php echo $method['Payment']['method'] ?>"
                                   value=<?php echo $method_id ?>>
                            <label for="<?php echo $method['Payment']['method'] ?>"><?php echo $method['Payment']['method'] ?></label>
                            <br>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    
                    <div class="method-box">
                        <h4>Address</h4>
                        <input required type="text" name="address" value="<?php echo $user['address'] ?>"
                               style="width: 100%;">
                    </div>
                    
                    <div class="method-box">
                        <h4>Phone</h4>
                        <input required type="text" name="phone" value="<?php echo $user['phone'] ?>"
                               style="width: 100%;">
                    </div>
                    
                    <div class="row" id="bill">
                        <h1 style="color: #ff523b; font-weight: 600">
                            $<?php echo $_SESSION['order']['total_bill'] ?></h1>
                    </div>
                    
                    <div class="method-box" style="margin-top:20px;">
                        <input type="submit" name="confirmPurchase" value="Confirm" class="button">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>