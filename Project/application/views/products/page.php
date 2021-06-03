<?php foreach ($products as $product): ?>
    <div class="col-4" id="pagingProducts">
        <a href="<?php echo BASE_PATH.'/products/view/'.$product['Product']['id'] ?>"><img src="<?php echo BASE_PATH . '/public/images/' . $product['Product']['image']; ?>"></a>
        <h4><?php echo $product['Product']['name']; ?></h4>
        <p>$<?php echo $product['Product']['price']; ?></p>
    </div>
<?php endforeach ?>
<div class="pagination">
    <?php
    echo '<script>localStorage.setItem("currentPage", "'.$currentPageNumber.'")</script>';
    echo '<script>localStorage.setItem("totalPages", "'.$totalPages.'")</script>';
    if($name)
        {
            echo '<a id="left" href="'.BASE_PATH.'/products/page/'. ($currentPageNumber - 1).'/'.$name.' ">&laquo;</a>';
            for ($i = 1; $i <= $totalPages; $i++)
                echo '<a href="'. BASE_PATH.'/products/page/'.$i. '/'. $name .'">'.$i.'</a>';
            echo '<a id="right" href="'.BASE_PATH.'/products/page/'. ($currentPageNumber + 1).'/'.$name.' ">&raquo;</a>';
        }
    else
        {
            echo '<a id="left" href="'.BASE_PATH.'/products/page/'. ($currentPageNumber - 1).' ">&laquo;</a>';
            for ($i = 1; $i <= $totalPages; $i++)
                echo '<a href="'. BASE_PATH.'/products/page/'.$i. '/'. $name .'">'.$i.'</a>';
            echo '<a id="right" href="'.BASE_PATH.'/products/page/'. ($currentPageNumber + 1).' ">&raquo;</a>';
        }
?>

</div>
<script>
    function showArrow()
    {
        var rightArrow = document.getElementById('right');
        var leftArrow = document.getElementById('left');
        var currentPage = localStorage.getItem("currentPage");
        var totalPages = localStorage.getItem("totalPages");
        if( currentPage === totalPages )
            rightArrow.style.display = 'none';
        if( currentPage === '1' )
            leftArrow.style.display = 'none';
        if(currentPage !== totalPages && currentPage !== '1')
        {
            rightArrow.style.display = 'inline';
            leftArrow.style.display = 'inline';
        }
    }
    showArrow();
</script>
