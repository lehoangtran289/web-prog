Order History
<br>
<ul>
<?php
    foreach($orders as $order) {
        echo '<li>' . json_encode($order['Order']) . '</li>';
    }
?>
</ul>