<style>
    .hero-image {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url(<?php echo BASE_PATH . '/public/images/Banner.jpg' ?>);
    }

    .categories {
        margin: 70px 0;
    }

    .logo-container {
        margin: auto;
        padding-left: 50px;
        padding-right: 50px;
    }
</style>

<button onclick="topFunction()" id="myBtn" title="Go to top">
    <img src="<?php echo BASE_PATH . "/public/icons/expand_less.png" ?>">
</button>
<script type="text/javascript">
    //Get the button
    var mybutton = document.getElementById("myBtn");

    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<!-- Banner -->
<div class="hero-image">
    <div class="hero-text">
        <h4>Welcome to</h4>
        <h2>J Henlo Cheems Mobile Shop</h2>
        <a href="#feature-section" class="button">Explore now</a>
    </div>
</div>

<!-- Brands -->
<div class="categories">
    <div class="logo-container">
        <h2 class="title">Brands</h2>
        <div class="row">
            <div class="col-5" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_samsung.png' ?>">
            </div>
            <div class="col-5" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_apple.png' ?>">
            </div>
            <div class="col-5" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_asus.png' ?>">
            </div>
            <div class="col-5" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_blackberry.png' ?>">
            </div>
            <div class="col-5" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_htc.png' ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-5" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_huawei.png' ?>">
            </div>
            <div class="col-5" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_nokia.png' ?>">
            </div>
            <div class="col-5" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_sony.png' ?>">
            </div>
            <div class="col-5" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_xiaomi.png' ?>">
            </div>
            <div class="col-5" id="categories">
                <img src="<?php echo BASE_PATH . '/public/images/logo_lg.png' ?>">
            </div>
        </div>
    </div>
</div>

<!-- Products -->
<div class="small-container">

    <!-- Featured products -->
    <h2 class="title" id="feature-section">Featured Products</h2>
    <div class="row">
        <?php
        foreach ($featuredProducts as $featuredProduct) {
        ?>
            <div class="col-3" id="featuredProducts">
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
        for ($i = 0; $i < count($latestProducts); $i++) {
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