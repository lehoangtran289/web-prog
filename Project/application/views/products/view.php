<style>
    .small-container {
        max-width: 1080px;
        margin: auto;
        padding-left: 25px;
        padding-right: 25px;
    }

    .row {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .path {
        display: flex;
        margin-bottom: 20px;
    }

    .path a {
        color: #ff523b;
    }

    .single-product {
        margin-top: 50px;
    }

    .single-product .col-2 {
        padding: 20px;
    }

    .single-product .col-2 img {
        padding: 0;
    }

    .single-product h4 {
        margin-bottom: 20px;
        font-size: 22px;
        font-weight: normal;
    }

    .single-product .fa {
        color: #ff523b;
        margin-left: 10px;
    }

    .col-2 {
        flex-basis: 50%;
        min-width: 300px;
    }

    .col-2 img {
        max-width: 100%;
    }

    .col-2 h1 {
        font-size: 45px;
        line-height: 55px;
    }

    .col-2 input[type="submit"] {
        cursor: pointer;
        margin-bottom: 30px;
        display: inline-block;
        background: #ff523b;
        border: 0px;
        color: #fff;
        padding: 8px 30px;
        border-radius: 30px;
        transition: background 0.5;
    }

    .col-2 input[type="submit"]:hover {
        background: #563434;
    }

    .small-img-row {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }

    .small-img-col {
        flex-basis: 22%;
        cursor: pointer;
    }
</style>

<!-- Product details -->
<form action="<?php echo BASE_PATH ?>/carts/addToCart" method='POST'>
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo BASE_PATH . '/public/images/' . $product['Product']['image'] ?>" width="100%" id="productImage">

                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="<?php echo BASE_PATH . '/public/images/' . $product['Product']['image'] ?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="<?php echo BASE_PATH . '/public/images/product-2.jpg' ?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="<?php echo BASE_PATH . '/public/images/product-3.jpg' ?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="<?php echo BASE_PATH . '/public/images/product-4.jpg' ?>" width="100%" class="small-img">
                    </div>
                </div>

            </div>
            <div class="col-2">
                <div class="path">
                    <a href="<?php echo BASE_PATH . '/products/page' ?>">Products</a>
                    <p>/<?php echo $product['Product']['name'] ?></p>
                </div>
                <h1><?php echo $product['Product']['name'] ?></h1>
                <h4>$<?php echo $product['Product']['price'] ?></h4>
                <input type="hidden" id="id" name="id" value=<?php echo $product['Product']['id'] ?>>
                <input type="submit" value="Add To Cart">
                <h3>Product Details <i class="fa fa-ident"></i></h3>
                <p><?php echo $product['Product']['description'] ?></p>
            </div>
        </div>
    </div>
</form>

</div>
<div>
    <h2></h2>
</div>
<div>
    <h2>Quantity: <?php echo $product['Product']['quantity'] ?></h2>
</div>
<div>
    <h2>Operating System: <?php echo $product['Product']['OS'] ?></h2>
</div>
<div>
    <h2>Chipset: <?php echo $product['Product']['chipset'] ?></h2>
</div>
<div>
    <h2>Ram: <?php echo $product['Product']['ram'] ?></h2>
</div>
<div>
    <h2>Display: <?php echo $product['Product']['display'] ?></h2>
</div>
<div>
    <h2>Camera: <?php echo $product['Product']['camera'] ?></h2>
</div>
<div>
    <h2>Memory: <?php echo $product['Product']['memory'] ?></h2>
</div>
<div>
    <h2>Battery: <?php echo $product['Product']['pin'] ?></h2>
</div>

<?php
foreach ($reviews as $review) {
    echo $review['User']['name'] . ': rating ' . $review['Review']['rating'] . ' stars';
    echo '<br>';
    echo $review['Review']['content'];
    echo '<br>';
}
?>

<form action="<?php echo BASE_PATH ?>/reviews/addReview" method='POST' onsubmit="return validateReview()">
    <input type="hidden" id="idForReview" name="idForReview" value=<?php echo $product['Product']['id'] ?>>
    <input required type="text" id="content" name="content" placeholder="Post your review here">
    <br>
    <input type="submit" value="Post review" name="postReview">
    <br>
    <input type="radio" name="rating" value='1'>
    <input type="radio" name="rating" value='2'>
    <input type="radio" name="rating" value='3'>
    <input type="radio" name="rating" value='4'>
    <input type="radio" name="rating" value='5'>
</form>


<form action="<?php echo BASE_PATH ?>/carts/addToCart" method='POST'>
    <input type="hidden" id="id" name="id" value=<?php echo $product['Product']['id'] ?>>
    <input type="submit" value="Buy">
</form>

<?php
foreach ($reviews as $review) {
    echo $review['User']['name'] . ': rating ' . $review['Review']['rating'] . ' stars';
    echo '<br>';
    echo $review['Review']['content'];
    echo '<br>';
}

?>

<form action="<?php echo BASE_PATH ?>/reviews/addReview" method='POST' onsubmit="return validateReview();">
    <input type="hidden" id="idForReview" name="idForReview" value=<?php echo $product['Product']['id'] ?>>
    <input required type="text" id="content" name="content" placeholder="Post your review here man">
    <br>
    <input type="submit" value="Post review" name="postReview">
    <br>
    <input type="radio" id="rating" value='1'>
    <input type="radio" id="rating" value='2'>
    <input type="radio" id="rating" value='3'>
    <input type="radio" id="rating" value='4'>
    <input type="radio" id="rating" value='5'>
</form>

<script>
    function validateReview() {
        let product_id = document.getElementById("idForReview").value;
        let content = document.getElementById("content").value;

        if (!product_id || !content) {
            allert('Review must not be empty!');
            return false;
        }

        const rbs = document.querySelectorAll('input[id="rating"]');
        let selectedValue;
        for (const rb of rbs) {
            if (rb.checked) {
                selectedValue = rb.value;
                alert(selectedValue);
                return true;
            }
        }
        alert("Please Rate the Product!");
        return false;
    }

    var productImage = document.getElementById("productImage");
    var smallImage = document.getElementsByClassName("small-img");

    // Show the small image when clicked
    smallImage[0].onclick = function() {
        productImage.src = smallImage[0].src;
    }
    smallImage[1].onclick = function() {
        productImage.src = smallImage[1].src;
    }
    smallImage[2].onclick = function() {
        productImage.src = smallImage[2].src;
    }
    smallImage[3].onclick = function() {
        productImage.src = smallImage[3].src;
    }
</script>
