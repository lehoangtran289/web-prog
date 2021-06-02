<style>
    .hero-image {
        height: 50%;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)),
            url("public/images/Banner.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .hero-text {
        text-align: start;
        position: absolute;
        top: 50%;
        left: 40%;
        transform: translate(-50%, -50%);
        color: white;
    }

    .hero-text p {
        margin: 20px 0;
    }

    .button {
        display: inline-block;
        background: #ff523b;
        color: #fff;
        padding: 8px 30px;
        border-radius: 30px;
        transition: background 0.5;
    }

    .button:hover {
        background: #563434;
    }

    .categories {
        margin: 70px 0;
    }

    .row {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .small-container {
        max-width: 1080px;
        margin: auto;
        padding-left: 25px;
        padding-right: 25px;
    }

    .col-3 {
        flex-basis: 30%;
        min-width: 250px;
        margin-bottom: 30px;
    }

    .col-3 img {
        width: 100%;
        max-height: 400px;
    }

    .title {
        text-align: center;
        margin: 0 auto 80px;
        position: relative;
        line-height: 60px;
        color: #555;
    }

    .title::after {
        content: '';
        background: #ff523b;
        width: 80px;
        height: 5px;
        border-radius: 5px;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    .col-4 {
        flex-basis: 25%;
        padding: 10px;
        min-width: 200px;
        margin-bottom: 50px;
        transition: transform 0.5s;
    }

    .col-4 img {
        width: 100%;
    }

    .col-4 h4 {
        text-align: center;
    }

    .col-4 p {
        text-align: center;
        font-size: 14px;
    }

    .col-4:hover {
        transform: translateY(-10px);
    }
</style>

<!-- Hero image -->
<div class="hero-image">
    <div class="hero-text">
        <h1>Welcome to<br>J Henlo Cheems Mobile Shop!</h1>
        <p>"The mobile phone is used from when you get up in the morning and is often the last thing you interact with at night.”</p>
        <a href="" class="button">Explore now</a>
    </div>
</div>

<!-- Featured categories -->
<div class="categories">
    <div class="small-container">
        <div class="row">
            <!-- Replace by real categories -->
            <div class="col-3">
                <img src="public/images/apple-logo.png">
            </div>
            <div class="col-3">
                <img src="public/images/samsung-logo.png">
            </div>
            <div class="col-3">
                <img src="public/images/xiaomi-logo.png">
            </div>
        </div>
    </div>
</div>

<!-- Featured products -->
<div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row">
        <!-- Replace by real products -->
        <div class="col-4">
            <img src="public/images/product-1.jpg">
            <h4>IPhone 12 Pro Max</h4>
            <p>$1000</p>
        </div>
        <div class="col-4">
            <img src="public/images/product-2.jpg">
            <h4>IPhone 12 Pro Max</h4>
            <p>$1000</p>
        </div>
        <div class="col-4">
            <img src="public/images/product-3.jpg">
            <h4>IPhone 12 Pro Max</h4>
            <p>$1000</p>
        </div>
        <div class="col-4">
            <img src="public/images/product-4.jpg">
            <h4>IPhone 12 Pro Max</h4>
            <p>$1000</p>
        </div>
    </div>
    <h2 class="title">Latest Products</h2>
    <div class="row">
        <!-- Replace by real products -->
        <div class="col-4">
            <img src="public/images/product-3.jpg">
            <h4>IPhone 12 Pro Max</h4>
            <p>$1000</p>
        </div>
        <div class="col-4">
            <img src="public/images/product-2.jpg">
            <h4>IPhone 12 Pro Max</h4>
            <p>$1000</p>
        </div>
        <div class="col-4">
            <img src="public/images/product-1.jpg">
            <h4>IPhone 12 Pro Max</h4>
            <p>$1000</p>
        </div>
        <div class="col-4">
            <img src="public/images/product-4.jpg">
            <h4>IPhone 12 Pro Max</h4>
            <p>$1000</p>
        </div>
    </div>
    <div class="row">
        <!-- Replace by real products -->
        <div class="col-4">
            <img src="public/images/product-4.jpg">
            <h4>IPhone 12 Pro Max</h4>
            <p>$1000</p>
        </div>
        <div class="col-4">
            <img src="public/images/product-1.jpg">
            <h4>IPhone 12 Pro Max</h4>
            <p>$1000</p>
        </div>
        <div class="col-4">
            <img src="public/images/product-2.jpg">
            <h4>IPhone 12 Pro Max</h4>
            <p>$1000</p>
        </div>
        <div class="col-4">
            <img src="public/images/product-3.jpg">
            <h4>IPhone 12 Pro Max</h4>
            <p>$1000</p>
        </div>
    </div>
</div>


<!-- <div class="" style="width:700px;">
    <?php
    foreach ($products as $product) {
    ?>
        <div class="col-md-4">
            <form method="post" action="index">
                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                    <div>
                        <img src="<?php echo BASE_PATH . '/public/images/' . $product['Product']['image'] ?>">
                        <?php echo $html->link($product['Product']['name'], 'products/view/' . $product['Product']['id'] . '/' . $product['Product']['name']); ?>
                        <h4>$ <?php echo $product['Product']["price"]; ?></h4>
                    </div>
            </form>
        </div>
    <?php
    }
    ?>
    <div style="clear:both"></div>
    <br />
    
</div>

<br /> -->
<!-- <button><a href="<?php echo BASE_PATH ?>/users/login">Sign in</a> <br></button>
<button><a href="<?php echo BASE_PATH ?>/users/register">Register</a></button> -->