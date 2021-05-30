<div><h2><strong><?php echo $product['Product']['name'] ?></strong>
</div>

<div><h2>Price: $<?php echo $product['Product']['price'] ?></h2>
    <div><h2>Quantity: <?php echo $product['Product']['quantity'] ?></h2>
        <div><h2>Description: <?php echo $product['Product']['description'] ?></h2>
            <div><img src="<?php echo '../../../public/images/' . $product['Product']['image'] . '.png' ?>">
                <button><a href="../../../users/login">Sign in</a> <br></button>
                <button><a href="../../../users/register">Register</a></button>