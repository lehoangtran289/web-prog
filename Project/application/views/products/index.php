<style>
    .hero-image {
        height: 70%;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)),
            url(<?php echo BASE_PATH . '/public/images/banner.jpg' ?>);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .hero-text {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        text-align: center;
        width: 100%;
    }

    .hero-text h4 {
        color: #ff523b;
        font-size: 22px;
        text-transform: uppercase;
        font-weight: 700;
    }

    .hero-text h2 {
        color: #fff;
        font-size: 62px;
        text-transform: uppercase;
        letter-spacing: 5px;
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

    .logo-container {
        margin: auto;
        padding-left: 50px;
        padding-right: 50px;
    }

    .col-3 {
        flex-basis: 10%;
        margin-bottom: 40px;
    }

    .col-3 img {
        width: 100%;
        height: 100%;
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

<!-- Banner -->
<div class="hero-image">
    <div class="hero-text">
        <h4>Welcome to</h4>
        <h2>J Henlo Cheems Mobile Shop</h2>
        <a href="" class="button">Explore now</a>
    </div>
</div>

<!-- Featured categories -->
<div class="categories">
    <div class="logo-container">
        <h2 class="title">Brands</h2>
        <div class="row">
            <div class="col-3" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_samsung.png' ?>">
            </div>
            <div class="col-3" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_apple.png' ?>">
            </div>
            <div class="col-3" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_asus.png' ?>">
            </div>
            <div class="col-3" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_blackberry.png' ?>">
            </div>
            <div class="col-3" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_htc.png' ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-3" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_huawei.png' ?>">
            </div>
            <div class="col-3" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_nokia.png' ?>">
            </div>
            <div class="col-3" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_sony.png' ?>">
            </div>
            <div class="col-3" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_xiaomi.png' ?>">
            </div>
            <div class="col-3" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_lg.png' ?>">
            </div>
        </div>
    </div>
</div>

<div class="small-container">
    <!-- Featured products -->
    <h2 class="title">Featured Products</h2>
    <div class="row">
        <?php
        foreach ($featuredProducts as $featuredProduct) {
        ?>
            <div class="col-4" id="featuredProducts">
                <a href="<?php echo BASE_PATH . '/products/view/' . $featuredProduct['Product']['id'] ?>">
                    <img src="<?php echo BASE_PATH . '/public/images/' . $featuredProduct['Product']['image']; ?>">
                </a>
                <h4><?php echo $featuredProduct['Product']['name']; ?></h4>
                <p>$<?php echo $featuredProduct['Product']['price']; ?></p>
            </div>
        <?php
        }
        ?>
    </div>

    <!-- Latest products -->
    <h2 class="title">Latest Products</h2>
    <div class="row">
        <?php
        for ($i = 0; $i < count($latestProducts) / 2; $i++) {
        ?>
            <div class="col-4" id="latestProducts">
                <a href="<?php echo BASE_PATH . '/products/view/' . $latestProducts[$i]['Product']['id'] ?>">
                    <img src="<?php echo BASE_PATH . '/public/images/' . $latestProducts[$i]['Product']['image']; ?>">
                </a>
                <h4><?php echo $latestProducts[$i]['Product']['name']; ?></h4>
                <p>$<?php echo $latestProducts[$i]['Product']['price']; ?></p>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="row">
        <?php
        for ($i = count($latestProducts) / 2; $i < count($latestProducts); $i++) {
        ?>
            <div class="col-4" id="latestProducts">
                <a href="<?php echo BASE_PATH . '/products/view/' . $latestProducts[$i]['Product']['id'] ?>">
                    <img src="<?php echo BASE_PATH . '/public/images/' . $latestProducts[$i]['Product']['image']; ?>">
                </a>
                <h4><?php echo $latestProducts[$i]['Product']['name']; ?></h4>
                <p>$<?php echo $latestProducts[$i]['Product']['price']; ?></p>
            </div>
        <?php
        }
        ?>
    </div>
</div>