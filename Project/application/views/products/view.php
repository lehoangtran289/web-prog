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

    .review-box {
        border-radius: 5px;
        background-color: #f3f3f3;
        padding: 20px;
    }

    .review-box input[type="text"] {
        width: 100%;
        padding: 15px 20px;
        display: inline-block;
        margin: 10px 0;
        border: 0px;
        box-sizing: border-box;
        background-color: white;
        color: black;
        border-radius: 5px;
    }

    .review-box input[type="submit"] {
        width: 100%;
        background-color: #ff523b;
        color: #fff;
        padding: 14px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-transform: uppercase;
    }

    .review-box input[type="submit"]:hover {
        background-color: #563434;
    }

    .user-review {
        padding: 5px 0;
    }

    .row {
        justify-content: left;
    }

    .rate {
        display: flex;
        justify-content: center;
        flex-direction: row-reverse;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        /*top: -9999px;*/
        display: none;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>

<form action="<?php echo BASE_PATH ?>/carts/addToCart" method='POST'>

    <!-- Product description -->
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo BASE_PATH . '/public/images/' . $product['Product']['image'] . '_0.jpg' ?>" width="100%" id="productImage">
            </div>
            <div class="col-2">
                <div class="path">
                    <a href="<?php echo BASE_PATH . '/products/page' ?>">Products</a>
                    <p>/<?php echo $product['Product']['name'] ?></p>
                </div>
                <h1><?php echo $product['Product']['name'] ?></h1>
                <h4>$<?php echo $product['Product']['price'] ?></h4>
                <?php
                if($product['Product']['quantity'] == 0)
                    echo '<h4 style="color: red">This product is out of stock!</h4>';
                else
                    echo '<input type="submit" value="Add To Cart" class="button">';
                ?>
                <input type="hidden" id="id" name="id" value=<?php echo $product['Product']['id'] ?>>
                <h3>Description <i class="fa fa-ident"></i></h3>
                <p><?php echo $product['Product']['description'] ?></p>
            </div>
        </div>
    </div>

    <!-- Product information -->
    <div class="small-container">
        <div class="row row-2">
            <h2>Product Details</h2>
        </div>
        <div class="row">
            <table class="table-details">
                <tr>
                    <th>Quantity</th>
                    <th>OS</th>
                    <th>Chipset</th>
                    <th>RAM</th>
                    <th>Display</th>
                    <th>Resolution</th>
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
                    <td><?php echo $product['Product']['resolution'] ?></td>
                    <td><?php echo $product['Product']['camera'] ?></td>
                    <td><?php echo $product['Product']['memory'] ?></td>
                    <td><?php echo $product['Product']['pin'] ?></td>
                </tr>
            </table>
        </div>
    </div>

</form>

<!-- Reviews -->
<form action="<?php echo BASE_PATH ?>/reviews/addReview" method='POST' onsubmit="return validateReview();">
    <div class="small-container">
        <div class="row row-2">
            <h2>Reviews</h2>
        </div>
        <div class="review-box" style="margin-bottom: 30px;">
            <input type="hidden" id="idForReview" name="idForReview" value=<?php echo $product['Product']['id'] ?>>
            <label>Your review</label>
            <input required type="text" id="content" name="content" placeholder="Leave your review here">
            <label>Rate this product</label>
            <div class="rate" style="margin-bottom: 10px;">
                <input type="radio" id="star5" name="rating" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rating" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rating" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rating" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rating" value="1" />
                <label for="star1" title="text">1 star</label>
            </div>
            <input type="submit" value="Post review" name="postReview">
        </div>
        <div class="review-box">
            <div style="width: 100%;">
                <label style="text-transform: uppercase;">Others's reviews</label>
                <?php
                foreach ($reviews as $review) {
                    $star = $review['Review']['rating'];
                    ?>
                    <div class="user-review">
                        <div class="row">
                            <h4><?php echo $review['User']['name'] ?></h4>
                            <div class="user-rate-star" style="margin-left: 10px;">
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $star) {
                                        ?>
                                        <span class="fa fa-star checked" style="color: #ff523b;"></span>
                                        <?php
                                    } else {
                                        ?>
                                        <span class="fa fa-star"></span>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <p><?php echo $review['Review']['content'] ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</form>

<!-- Related products -->
<div class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
    </div>
    <div class="row">
        <?php
            forEach($relatedProducts as $product) {
            ?>
            <div class="col-4" id="relatedProducts">
                <a href="<?php echo BASE_PATH . '/products/view/' . $product['Product']['id'] ?>">
                    <img src="<?php echo BASE_PATH . '/public/images/' . $product['Product']['image'] . '_0.jpg'; ?>">
                </a>
                <h4><?php echo $product['Product']['name']; ?></h4>
                <p>$<?php echo $product['Product']['price']; ?></p>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<script>
    function validateReview() {
        let product_id = document.getElementById("idForReview").value;
        let content = document.getElementById("content").value;

        if (!product_id || !content) {
            allert('Review must not be empty!');
            return false;
        }

        const rbs = document.getElementsByName("rating");
        let selectedValue;
        for (const rb of rbs) {
            if (rb.checked) {
                selectedValue = rb.value;
                return true;
            }
        }
        alert("Please Rate the Product!");
        return false;
    }

    function hideOutOfStock()
    {
        document.getElementById('oufOfStock').style.display = 'none';
    }
</script>