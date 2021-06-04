<script>
    function validateReview() {
        let product_id= document.getElementById("idForReview").value;
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
</script>

<div><h2><strong><?php echo $product['Product']['name'] ?></strong>
</div>
<div><h2>Price: $<?php echo $product['Product']['price'] ?></h2></div>
<div><h2>Quantity: <?php echo $product['Product']['quantity'] ?></h2></div>
<div><h2>Description: <?php echo $product['Product']['description'] ?></h2></div>
<div><img src="<?php echo BASE_PATH.'/public/images/' . $product['Product']['image'] ?>"></div>
<div><h2>Operating System: <?php echo $product['Product']['OS'] ?></h2></div>
<div><h2>Chipset: <?php echo $product['Product']['chipset'] ?></h2></div>
<div><h2>Ram: <?php echo $product['Product']['ram'] ?></h2></div>
<div><h2>Display: <?php echo $product['Product']['display'] ?></h2></div>
<div><h2>Camera: <?php echo $product['Product']['camera'] ?></h2></div>
<div><h2>Memory: <?php echo $product['Product']['memory'] ?></h2></div>
<div><h2>Battery: <?php echo $product['Product']['pin'] ?></h2></div>
            <form action="<?php echo BASE_PATH?>/carts/addToCart" method= 'POST'>
                <input type="hidden" id="id" name="id" value=<?php echo $product['Product']['id'] ?>>
                <input type="submit" value="Buy">
            </form>
                <?php
                foreach ($reviews as $review)
                {
                    echo $review['User']['name'].': rating '.$review['Review']['rating'].' stars';
                    echo '<br>';
                    echo $review['Review']['content'];
                    echo '<br>';
                }

                ?>

<form action="<?php echo BASE_PATH?>/reviews/addReview" method= 'POST' onsubmit="return validateReview();">
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