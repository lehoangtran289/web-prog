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
            //console.log(data);
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
        console.log(JSON.stringify(data));
        let html = '';
        if (JSON.stringify(data) == '\"exceeding_stock\"') {
            alert("Not enough products in stock");
            return;
        }
        if (JSON.stringify(data) == '"exceeding_max_item"') {
            alert("You can only purchase up to 5 items of the same product");
            return;
        }
        if (JSON.stringify(data) === '"cart_empty"') {
            html += 'Cart Empty';
        } else {
            str = JSON.stringify(data);
            products = JSON.parse(str);            
            html += "<table border='1'>";
            Array.prototype.forEach.call(products, product => {
                info = JSON.stringify(product);
                info = JSON.parse(info);
                info = JSON.parse(info);
                //console.log(typeof(info.Product));
                let segment = '<tr><td>';
                segment += info.Product.name + ", price is " + info.Product.price + "</td>";
                segment += "<td><button type=\"button\" onclick=\"decreaseQty(" + info.Product.id + ")\">-</button></td>";
                segment += "<td>" + info.buy_qty +"</td>";
                segment += "<td><button type=\"button\" onclick=\"increaseQty(" + info.Product.id+ ")\">+</button></td>";
                segment += "<td><button type=\"button\" onclick=\"removeItem(" + info.Product.id + ")\">Remove</button></td></tr>";
                html += segment;
            });
            html += "</table>";
            html += "<button><a href=" + "<?php echo BASE_PATH . "/orders/index"?>" + ">Buy</a></button>"
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
        echo "<table border=\"1\">";
        foreach ($cart as $item) {
            $item = json_decode((json_encode(json_decode($item))), true);
            ?>
<!--                tat ca thong tin duoc luu trong bien $item nhe son-->
<!--            <tr><td>--><?php //echo json_encode($item['Product'])?><!--</td>-->
            <tr><td><?php echo $item['Product']['name'].', price is '.$item['Product']['price']?></td>
            <td><button type= "button" onclick="decreaseQty(<?php echo $item['Product']['id']?>)">-</button></td>
            <td><?php echo $item['buy_qty']?></td>
            <td><button type= "button" onclick="increaseQty(<?php echo $item['Product']['id']?>)">+</button></td>
            <td><button type= "button" onclick="removeItem(<?php echo $item['Product']['id']?>)">Remove</button></td></tr>
            <?php
        }
        echo '</table>';
        echo "<button><a href='" . BASE_PATH . "/orders/index'" . ">Buy</a></button>";
    } else {
        echo 'Cart Empty';
    }
?>
</div>