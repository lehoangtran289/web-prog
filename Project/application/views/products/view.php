<style>
    .button {
        margin-bottom: 30px;
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
        margin-bottom: 50px;
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

    .small-img-row {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }

    .small-img-col {
        flex-basis: 22%;
        cursor: pointer;
    }

    .table-details {
        width: 100%;
        border-collapse: collapse;
    }

    .table-details th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #1e1e1eec;
        color: white;
    }

    .table-details th,
    .table-details td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .table-details td:hover {
        background-color: #ddd;
    }
</style>

<!-- Product details -->
<form action="<?php echo BASE_PATH ?>/carts/addToCart" method='POST'>

    <!-- Product details -->
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
                <input type="submit" value="Add To Cart" class="button">
                <h3>Product Details <i class="fa fa-ident"></i></h3>
                <p><?php echo $product['Product']['description'] ?></p>
            </div>
        </div>
    </div>

    <!-- Table of information -->
    <div class="small-container">
        <div class="row">
            <table class="table-details">
                <tr>
                    <th>Quantity</th>
                    <th>OS</th>
                    <th>Chipset</th>
                    <th>RAM</th>
                    <th>Display</th>
                    <th>Camera</th>
                    <th>Memory</th>
                    <th>Battery</th>
                </tr>
                <tr>
                    <td><?php echo $product['Product']['quantity'] ?></td>
                    <td><?php echo $product['Product']['OS'] ?></td>
                    <td><?php echo $product['Product']['chipset'] ?></td>
                    <td><?php echo $product['Product']['ram'] ?></td>
                    <td><?php echo $product['Product']['display'] ?></td>
                    <td><?php echo $product['Product']['camera'] ?></td>
                    <td><?php echo $product['Product']['memory'] ?></td>
                    <td><?php echo $product['Product']['pin'] ?></td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Related products -->
    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
        </div>
        <div class="row">
            <?php
            for ($i = 0; $i < count($relatedProducts); $i++) {
            ?>
                <div class="col-4" id="relatedProducts">
                    <a href="<?php echo BASE_PATH . '/products/view/' . $relatedProducts[$i]['Product']['id'] ?>">
                        <img src="<?php echo BASE_PATH . '/public/images/' . $relatedProducts[$i]['Product']['image']; ?>">
                    </a>
                    <h4><?php echo $relatedProducts[$i]['Product']['name']; ?></h4>
                    <p>$<?php echo $relatedProducts[$i]['Product']['price']; ?></p>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</form>

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

    // Change image when clicking on small images
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
