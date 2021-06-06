<script type='text/javascript'>
    function removeItem(id) {
        const url = "<?php echo BASE_PATH . "/carts/removeFromCart/" ?>" + id;
        res = fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                displayCart(data);
            });
    }

    function decreaseQty(id) {
        const url = "<?php echo BASE_PATH . "/carts/decreaseItemQty/" ?>" + id;
        res = fetch(url)
            .then(response => response.json())
            .then(data => {
                //console.log(data);
                displayCart(data);
            });
    }

    function increaseQty(id) {
        const url = "<?php echo BASE_PATH . "/carts/increaseItemQty/" ?>" + id;
        res = fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                displayCart(data);
            });
    }

    function displayCart(data) {
        console.log(JSON.stringify(data));
        let html = '<div class="row row-2"><h2>Your cart</h2></div>';
        if (JSON.stringify(data) == '\"exceeding_stock\"') {
            alert("Not enough products in stock");
            return;
        }
        if (JSON.stringify(data) == '"exceeding_max_item"') {
            alert("You can only purchase up to 5 items of the same product");
            return;
        }
        if (JSON.stringify(data) === '"cart_empty"') {
            html += '<h4 style="color: red;">Cart Empty</h4>';
        } else {
            str = JSON.stringify(data);
            products = JSON.parse(str);
            total_bill = 0;
            html += "<table><tr><th>Product</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr>";
            Array.prototype.forEach.call(products, product => {
                info = JSON.stringify(product);
                info = JSON.parse(info);
                info = JSON.parse(info);
                sub_total = info.Product.price * info.buy_qty;
                total_bill += sub_total;
                //console.log(typeof(info.Product));
                let segment = '';
                segment += "<tr><td><div class=\"cart-info\"><img src=\"<?php echo BASE_PATH . '/public/images/' ?>" + info.Product.image + "_0.jpg\">";
                segment += "<div><p>" + info.Product.name + "</p></div></div></td>";
                segment += "<td>$" + info.Product.price + "</td>";
                segment += "<td><button type=\"button\" onclick=\"decreaseQty(" + info.Product.id + ")\">-</button> ";
                segment += info.buy_qty;
                segment += " <button type=\"button\" onclick=\"increaseQty(" + info.Product.id + ")\">+</button></td>";
                segment += "<td>$" + sub_total + "</td>";
                segment += "<td><a href=\"\" onclick=\"removeItem(" + info.Product.id + ")\">Remove</a></td></tr>";

                html += segment;
            });
            html += "</table><div class=\"row\" style=\"margin-top: 40px;\"><h2>Total</h2><p>$" + total_bill + "</p>";
            html += "<a href=\"<?php echo BASE_PATH . '/orders/index'; ?> \" class=\"button\" style=\"margin-left: auto;\">Buy</a></div>";
        }
        document.getElementsByClassName("small-container cart-page")[0].innerHTML = html;
    }
</script>

<style>
    .row {
        justify-content: start;
    }

    .row h2 {
        text-transform: uppercase;
        font-size: 24px;
        font-weight: 700;
        transition: all .3s ease 0s;
    }

    .cart-page {
        margin: 80px auto;
        min-height: 50%;
    }

    .cart-info {
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
        height: 80px;
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
</style>

<!-- Display cart table -->
<div class="small-container cart-page">
    <div class="row row-2">
        <h2>Your cart</h2>
    </div>
    <?php
    session_start();
    if ($cart != 'None') {
        $totalPrice = 0;
    ?>
        <table>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
            <?php
            foreach ($cart as $item) {
                $item = json_decode((json_encode(json_decode($item))), true);
            ?>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="<?php echo BASE_PATH . '/public/images/' . $item['Product']['image'] . '_0.jpg' ?>">
                            <div>
                                <p><?php echo $item['Product']['name'] ?></p>
                            </div>
                        </div>
                    </td>
                    <td>$<?php echo $item['Product']['price'] ?></td>
                    <td>
                        <button type="button" onclick="decreaseQty(<?php echo $item['Product']['id'] ?>)">-</button>
                        <?php echo $item['buy_qty'] ?>
                        <button type="button" onclick="increaseQty(<?php echo $item['Product']['id'] ?>)">+</button>
                    </td>
                    <td>
                        $
                        <?php
                        $subTotal = $item['buy_qty'] * $item['Product']['price'];
                        $totalPrice += $subTotal;
                        echo $subTotal;
                        ?>
                    </td>
                    <td><a href="" onclick="removeItem(<?php echo $item['Product']['id'] ?>)">Remove</a></td>
                </tr>
            <?php
            }
            ?>
        </table>

        <div class="row" style="margin-top: 40px;">
            <h2>Total</h2>
            <p style="margin-left: 20px; color: #ff523b; text-transform: uppercase; font-size: 24px; font-weight: 700; transition: all .3s ease 0s;">
                $<?php echo $totalPrice ?>
            </p>
            <a href="<?php echo BASE_PATH . '/orders/index'; ?> " class="button" style="margin-left: auto;">Buy</a>
        </div>
    <?php
    } else {
        echo '<h4 style="color: red;">Cart Empty</h4>';
    }
    ?>
</div>