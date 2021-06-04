<style>
    .hero-image {
        height: 70%;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5),
        rgba(0, 0, 0, 0.5)),
        url(<?php echo BASE_PATH . '/public/images/Banner_products.jpg' ?>);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        margin-bottom: 80px;
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
    
    .row {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        justify-content: space-around;
    }
    
    .row-2 {
        justify-content: space-between;
        margin: 100px auto 50px;
    }
    
    .row-2 select {
        background: #f3f3f3;
        border: 0px;
        padding: 10px;
        border-radius: 20px;
    }
    
    .row-2 select:focus {
        outline: none;
    }
    
    .small-container {
        max-width: 1080px;
        margin: auto;
        padding-left: 25px;
        padding-right: 25px;
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
    
    .pagination {
        margin: 0 auto 80px;
    }
    
    .pagination span {
        display: inline-block;
        background: #f3f3f3;
        border-radius: 20px;
        margin-left: 10px;
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 40px;
        cursor: pointer;
    }
    
    .pagination span:hover {
        background: #ff523b;
        color: #fff;
    }

</style>

<!-- JS code -->
<script type="text/javascript">
    //let getHtmlProductList = (data) => {
    //    console.log(data);
    //    let result = '';
    //    data.forEach((item) => {
    //        result += "<form method='post' action='index'> <div style='border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;'align='center'>";
    //        result += "<div><img src='<?php //echo BASE_PATH . '/public/images/' ?>//" + item['image'] + "'/>";
    //        result += "<a href='<?php //echo BASE_PATH . '/products/view/' ?>//" + item['id'] + "'>" + item['name'] + "</a>";
    //        result += "<h4>$ " + item['price'] + "</h4>"
    //        result += "</div></div></form>";
    //    });
    //    console.log(result);
    //    return result;
    //}
    //
    //window.addEventListener('DOMContentLoaded', (event) => {
    //    const form = document.getElementById("searchForm");
    //    form.addEventListener('submit', function (e) {
    //        e.preventDefault();
    //        const formData = new FormData(form);
    //        let data = {};
    //        for (let [key, value] of formData.entries()) {
    //            if (key === 'brands') {
    //                data.hasOwnProperty('brands') ? data['brands'].push(value) : data['brands'] = [value];
    //            } else {
    //                if (value) data[key] = value;
    //            }
    //        }
    //        console.log(JSON.stringify(data));
    //        fetch("<?php //echo BASE_PATH . '/products/processSearchReq' ?>//", {
    //            method: 'POST',
    //            body: JSON.stringify(data),
    //            mode: "same-origin",
    //            credentials: "same-origin",
    //            headers: {
    //                "Content-Type": "application/json"
    //            }
    //        })
    //                .then(response => response.text())
    //                .then(data => {
    //                    console.log(data);
    //                    let obj = JSON.parse(data);
    //                    // create product list html
    //                    let res = getHtmlProductList(obj);
    //                    document.getElementById("productList").innerHTML = res;
    //                });
    //    })
    //});
</script>

<!-- Banner -->
<div class="hero-image">
    <div class="hero-text">
        <h4>New arrivals</h4>
        <h2>Check out all products here</h2>
    </div>
</div>

<!-- Products -->
<div class="small-container">
    <div class="row row-2">
        <h2>All Products</h2>
        
        <!--Product search-->
        <form id="searchForm" method="POST" action="<?php
            if (!empty($name)) echo BASE_PATH . "/products/page/" . $name;
            else echo BASE_PATH . "/products/page"
        ?>">
            <!-- Search by brand name(s) -->
            <span>Brand: </span>
            <?php
                foreach ($brands as $brand) {
                    echo "<input type='checkbox' name='brands[]' value=" . $brand['Category']['id'] . ">";
                    echo "<label for=" . $brand['Category']['brand'] . ">" . $brand['Category']['brand'] . "</label>";
                }
                echo "<br><br>";
            ?>
            
            <!-- Order by price -->
            <select name="orderBy" id="orderBy">
                <option value="low">Sort by price (low -> high)</option>
                <option value="high">Sort by price (high -> low)</option>
            </select>
            
            <br><br>
            <input type="submit" id="submit" value="Search"/>
        </form>
    </div>
    
    <!-- hoac them vao day -->
    
    <!-- List of products -->
    <div class="row">
        <?php foreach ($products as $product) : ?>
            <div class="col-4" id="pagingProducts">
                <a href="<?php echo BASE_PATH . '/products/view/' . $product['Product']['id'] ?>">
                    <img src="<?php echo BASE_PATH . '/public/images/' . $product['Product']['image']; ?>">
                </a>
                <h4><?php echo $product['Product']['name']; ?></h4>
                <p>$<?php echo $product['Product']['price']; ?></p>
            </div>
        <?php endforeach ?>
    </div>
    
    <!-- Page number -->
    <div class="pagination">
        <?php
            echo '<script>localStorage.setItem("currentPage", "' . $currentPageNumber . '")</script>';
            echo '<script>localStorage.setItem("totalPages", "' . $totalPages . '")</script>';
            
            $leftUrl = BASE_PATH . '/products/page/' . ($currentPageNumber - 1);
            $midUrls = array();
            for ($i = 1; $i <= $totalPages; $i++)
                $midUrls[$i] = BASE_PATH . '/products/page/' . $i;
            $rightUrl = BASE_PATH . '/products/page/' . ($currentPageNumber + 1);
            
            if (!empty($name)) {
                $leftUrl .= '/' . $name;
                for ($i = 1; $i <= $totalPages; $i++)
                    $midUrls[$i] .= '/' . $name;
                $rightUrl .= '/' . $name;
            }
            
            echo '<a id="left" href="' . $leftUrl . ' "><span>&laquo;</span></a>';
            for ($i = 1; $i <= $totalPages; $i++)
                echo '<a href="' . $midUrls[$i] . '"><span>' . $i . '</span></a>';
            echo '<a id="right" href="' . $rightUrl . ' "><span>&raquo;</span></a>';
        ?>
    </div>
</div>

<script>
    function showArrow() {
        var rightArrow = document.getElementById('right');
        var leftArrow = document.getElementById('left');
        var currentPage = localStorage.getItem("currentPage");
        var totalPages = localStorage.getItem("totalPages");
        if (currentPage === totalPages)
            rightArrow.style.display = 'none';
        if (currentPage === '1')
            leftArrow.style.display = 'none';
        if (currentPage !== totalPages && currentPage !== '1') {
            rightArrow.style.display = 'inline';
            leftArrow.style.display = 'inline';
        }
    }
    
    showArrow();
</script>