<div><h2><strong><?php echo $product['Product']['name'] ?></strong>
</div>
<div><h2>Price: $<?php echo $product['Product']['price'] ?></h2>
    <div><h2>Quantity: <?php echo $product['Product']['quantity'] ?></h2>
        <div><h2>Description: <?php echo $product['Product']['description'] ?></h2>
            <div><img src="<?php echo BASE_PATH.'/public/images/' . $product['Product']['image'] ?>">
            <form action="<?php echo BASE_PATH?>/carts/addToCart" method= 'POST'>
                <input type="hidden" id="id" name="id" value=<?php echo $product['Product']['id'] ?>>
                <input type="submit" value="Buy">
            </form>
                <button><a href="<?php echo BASE_PATH?>/users/login">Sign in</a> <br></button>
                <button><a href="<?php echo BASE_PATH?>/users/register">Register</a></button>
                <button><a href="<?php echo BASE_PATH?>/carts/index">Cart</a></button>