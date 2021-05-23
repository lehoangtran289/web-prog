<div><h2><strong><?php echo $product['Product']['name'] ?></strong>
</div>

<div><h2>Price: $<?php echo $product['Product']['price'] ?></h2>
<div><h2>Quantity: <?php echo $product['Product']['quantity'] ?></h2>
<div><h2>Description: <?php echo $product['Product']['description'] ?></h2>
<div><img src="<?php echo ROOT.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$product['Product']['image'].'.png' ?>">

    
<!--    --><?php //if (!empty($product['Tag'])): ?>
<!--    <h2>Tags:</h2>-->
<!--    -->
<!--    --><?php //foreach ($product['Tag'] as $tags): ?>
<!--        <div class="tag">-->
<!--            --><?php //echo $tags['Tag']['name'] ?>
<!--        </div>-->
<!--    --><?php //endforeach ?>
<!--</div>-->
<?php //endif ?>