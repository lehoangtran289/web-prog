<div class="row">
    <div class="col-2">
        <h1>Welcome To,<br>J Henlo Cheems Mobile Shop!</h1>
        <p>"The mobile phone is used from when you get up in the morning and is often the last thing you interact with at night.”</p>
    </div>
    <div class="col-2">
        <img src="<?php echo BASE_PATH.'/public/images/Banner.jpg'?>" >
    </div>
</div>


<div class="" style="width:700px;">
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
    </a>
</div>

</div>
