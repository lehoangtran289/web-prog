<script type='text/javascript'>

    function removeItem(id) {
        const url = "<?php echo BASE_PATH ."/carts/removeFromCart/"?>" + id ;
        res = fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            displayCart(data);
        });
    }

    function decreaseQty(id) {
        const url = "<?php echo BASE_PATH ."/carts/decreaseItemQty/"?>" + id ;
        res = fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            displayCart(data);
        });
    }
    function increaseQty(id) {
        const url = "<?php echo BASE_PATH ."/carts/increaseItemQty/"?>" + id ;
        res = fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            displayCart(data);
        });
    }

    function displayCart(data) {
        let html = '';
        if (JSON.stringify(data) === '{}') {
            html += 'Cart Empty';
        } else {
            str = JSON.stringify(data);
            products = JSON.parse(str);            
            html += "<table border='1' style='width:100%'>";
            Array.prototype.forEach.call(products, product => {
                info = JSON.stringify(product);
                info = JSON.parse(info);
                info = JSON.parse(info);
                //console.log(typeof(info.Product));
                let segment = '<tr><th>';
                segment += JSON.stringify(info.Product) + "</th>";
                segment += "<th><button type=\"button\" onclick=\"decreaseQty(" + info.Product.id + ")\">-</button></th>";
                segment += "<th>" + info.buy_qty +"</th>";
                segment += "<th><button type=\"button\" onclick=\"increaseQty(" + info.Product.id+ ")\">+</button></th>";
                segment += "<th><button type=\"button\" onclick=\"removeItem(" + info.Product.id + ")\">Remove</button></th></tr>";
                html += segment;
            });
            html += "</table>";
        }
        document.getElementById("table").innerHTML = html;
    }
</script>
Your Cart:
<br>
<div id='table'>
<?php
    session_start();
    if ($cart != 'None') {
        echo "<table border=\"1\" style=\"width:100%\">";
        foreach ($cart as $item) {
            $item = json_decode((json_encode(json_decode($item))), true);
            ?>
            <tr><th><?php echo json_encode($item['Product'])?></th>
            <th><button type= "button" onclick="decreaseQty(<?php echo $item['Product']['id']?>)">-</button></th>
            <th><?php echo $item['buy_qty']?></th>
            <th><button type= "button" onclick="increaseQty(<?php echo $item['Product']['id']?>)">+</button></th>
            <th><button type= "button" onclick="removeItem(<?php echo $item['Product']['id']?>)">Remove</button></th></tr>
            <?php
        }
        echo '</table>';
        echo "<button><a href='" . BASE_PATH . "/orders/index'" . ">Buy</a></button>";
    } else {
        echo 'Cart empty';
    }
?>
</div>