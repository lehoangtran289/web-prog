<!-- CSS -->
<style>

</style>

<!-- JS code -->
<script type="text/javascript">
    window.addEventListener('DOMContentLoaded', (event) => {
        const form = document.getElementById("searchForm");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(form);
            let data = {};
            for (let [key, value] of formData.entries()) {
                if (key === 'brands') {
                    data.hasOwnProperty('brands') ? data['brands'].push(value) : data['brands'] = [value];
                } else {
                    if (value) data[key] = value;
                }
            }
            console.log(JSON.stringify(data));
            fetch("<?php echo BASE_PATH . '/products/processSearchReq' ?>", {
                method: 'POST',
                body: JSON.stringify(data),
                mode: "same-origin",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                }
            })
                    .then(response => response.text())
                    .then(data => {
                        console.log(data);
                    });
        })
    });
</script>

<!--Product search-->
<form id="searchForm" method="POST">
    <!-- Search by name -->
    <label for="name">Search product name: </label>
    <input type="text" id="name" name="name" placeholder="Product name"><br><br>
    
    <!-- Search by brand name(s) -->
    <span>Brand: </span>
    <?php
        foreach ($brands as $brand) {
            echo "<input type='checkbox' name='brands' value=" . $brand['Category']['brand'] . ">";
            echo "<label for=" . $brand['Category']['brand'] . ">" . $brand['Category']['brand'] . "</label>";
        }
        echo "<br><br>";
    ?>
    
    <!-- Order by price -->
    <label for="orderBy">Priority: </label>
    <select name="orderBy" id="orderBy">
        <option value="lowToHigh">Low price</option>
        <option value="highToLow">High Price</option>
    </select>
    
    <br><br>
    <input type="submit" id="submit" value="Search"/>
</form>

<!--Products list-->
<div class="container" style="width:700px;">
    <?php
        foreach ($products as $product) {
            ?>
            <div class="col-md-4">
                <form method="post" action="index">
                    <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;"
                         align="center">
                        <div><img src="<?php echo BASE_PATH.'/public/images/' . $product['Product']['image']?>">
                            <?php echo $html->link($product['Product']['name'], 'products/view/' . $product['Product']['id'] . '/' . $product['Product']['name']); ?>
                            <h4>$ <?php echo $product['Product']["price"]; ?></h4>
                        </div>
                </form>
            </div>
            <?php
        }
    
    ?>
    <div style="clear:both"></div>
    <br/>
    <h3>Cart Details</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="40%">Item Name</th>
                <th width="20%">Price</th>
                <th width="5%">Action</th>
            </tr>
        </table>
    </div>
</div>
<br/>
<button><a href="<?php echo BASE_PATH?>/users/login">Sign in</a> <br></button>
<button><a href="<?php echo BASE_PATH?>/users/register">Register</a></button>
<button><a href="<?php echo BASE_PATH?>/carts/index">Cart</a></button>
<div><a href="">
        <button>Update your profile</button>
    </a></div>
