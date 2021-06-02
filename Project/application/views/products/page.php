<?php foreach ($products as $product): ?>
    <div class="col-4" id="pagingProducts">
        <a href="<?php echo BASE_PATH.'/products/view/'.$product['Product']['id'] ?>"><img src="<?php echo BASE_PATH . '/public/images/' . $product['Product']['image']; ?>"></a>
        <h4><?php echo $product['Product']['name']; ?></h4>
        <p>$<?php echo $product['Product']['price']; ?></p>
    </div>
<?php endforeach ?>
<div class="pagination">
<a href="#">&laquo;</a>
<?php for ($i = 1; $i <= $totalPages; $i++)
{
    echo '<a href="'. BASE_PATH.'/products/page/'.$i .'">'.$i.'</a>';
} ?>
<a href="#">&raquo;</a>
</div>
<!--<div align="center" class="pagination">-->
<!--    <a href="#">&laquo;</a>-->
<!--    --><?php
//    for ($i = 1; $i < $totalPages ; $i++) {
//        echo '<a href="'. BASE_PATH. '/products/page/'. $i .'">'.$i .'</a>';
//    }
//    ?>
<!--    <a href="#">&raquo;</a>-->
<!--</div>-->
