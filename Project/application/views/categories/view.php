<!--<div><h2><strong>--><?php //echo $category['Category']['name'] ?><!--</strong>-->
</div>

<?php if (!empty($category['Product'])): ?>
    <div><h2>Please select a product</h2>
        <?php foreach ($category['Product'] as $product): ?>
            <div class="category">
                
                <?php echo $html->link($product['Product']['name'], 'products/view/' . $product['Product']['id'] . '/' . $product['Product']['name']) ?>
            
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>