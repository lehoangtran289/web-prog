<style>
    .hero-image {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url(<?php echo BASE_PATH . '/public/images/Banner_products.jpg' ?>);
        margin-bottom: 80px;
    }

    .button {
        border-radius: 5px;
        width: 100%;
        padding: 10px 0;
        text-transform: uppercase;
        font-weight: 700;
    }

    .row {
        align-items: stretch;
    }

    .filter-list {
        flex-basis: 30%;
        padding: 10px;
        min-width: 200px;
        margin-bottom: 70px;
    }

    .product-list {
        padding: 10px;
        flex-basis: 70%;
        min-width: 200px;
    }

    .filter-box {
        margin: 10px auto 0;
        width: 100%;
    }
</style>

<!-- JS code -->
<script>
    // SAVE FORM STATE WHEN RELOAD
    window.onload = function() {
        // orderBy input
        const orderBy = sessionStorage.getItem('orderBy');
        if (orderBy !== null) document.getElementById("orderBy").value = orderBy;

        // brands
        const brands = JSON.parse(sessionStorage.getItem('brands'));
        if (brands) {
            brands.forEach((item) => {
                document.getElementById(item.id).checked = item.checked;
            })
        }

        // price range
        const priceRange = sessionStorage.getItem('priceRange');
        if (priceRange !== null) {
            document.getElementsByName("priceRange").forEach(i => {
                if (i.value === priceRange) {
                    i.checked = true;
                }
            })
        }
    }

    window.onbeforeunload = function() {
        sessionStorage.setItem("orderBy", document.getElementById("orderBy").value);

        // brands input
        const brands = document.querySelectorAll(".brcb");
        console.log(brands);
        let brandsData = [];
        brands.forEach(item => {
            brandsData.push({
                id: item.id,
                checked: item.checked
            });
        });
        sessionStorage.setItem("brands", JSON.stringify(brandsData));
        console.log(JSON.stringify(brandsData));

        // priceRange input
        const priceRange = document.getElementsByName('priceRange');
        priceRange.forEach(item => {
            if (item.checked) {
                sessionStorage.setItem('priceRange', item.value);
            }
        })
    }

    // add filter when navigating between pages
    let processPaging = (url) => {
        console.log(document.getElementById("orderBy").value);
        let form = document.createElement("form");
        form.action = url;
        form.method = 'post';

        // orderBy Filter
        let orderByInput = document.createElement('input');
        orderByInput.type = 'hidden';
        orderByInput.name = 'orderBy';
        orderByInput.value = document.getElementById("orderBy").value;
        form.appendChild(orderByInput);

        // brands Filter
        if (sessionStorage.getItem('brands')) {
            const brands = JSON.parse(sessionStorage.getItem('brands'));
            let i = 0;
            brands.forEach((item) => {
                let brand = document.createElement('input');
                brand.type = 'checkbox';
                brand.name = 'brands[]';
                brand.style.visibility = 'hidden';
                brand.checked = item.checked;
                brand.value = item.id;
                form.appendChild(brand);
            });
        }

        // priceRange filter
        if (sessionStorage.getItem('priceRange')) {
            let priceRange = document.createElement('input');
            priceRange.type = 'hidden';
            priceRange.name = 'priceRange';
            priceRange.value = sessionStorage.getItem('priceRange');
            form.appendChild(priceRange);
        }

        document.getElementById('hidden_form_container').appendChild(form);
        console.log(form);
        form.submit();
    }
</script>

<div id="hidden_form_container" style="display:none;"></div>

<!-- Banner -->
<div class="hero-image">
    <div class="hero-text">
        <h4>New arrivals</h4>
        <h2>Check out all products here</h2>
    </div>
</div>

<!-- Products -->
<div class="small-container">
    <div class="row">

        <!-- Filters section -->
        <div class="filter-list">
            <h2 style="text-transform: uppercase; font-size: 22px;">Filters</h2>
            <form id="searchForm" method="POST" action="<?php
                                                        if (!empty($name)) {
                                                            echo BASE_PATH . "/products/page/1/" . $name;
                                                        } else echo BASE_PATH . "/products/page"
                                                        ?>">
                <!-- Brand filter -->
                <div class="filter-box">
                    <h4>Brands</h4>
                    <!--Product search-->
                    <?php
                    foreach ($brands as $brand) {
                    ?>
                        <div class="checkbox-row">
                            <input class="brcb" id="<?php echo $brand['Category']['id'] ?>" type="checkbox" name="brands[]" value="<?php echo $brand['Category']['id'] ?>">
                            <label for="<?php echo $brand['Category']['brand'] ?>" class="checkmark"> <?php echo $brand['Category']['brand'] ?> </label>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <!-- Price filter -->
                <div class="filter-box">
                    <h4>Price</h4>
                    <div class="radio-row">
                        <input type="radio" id="priceRange0" name="priceRange" value="priceRange0">
                        <label for="priceRange0">Any price</label>
                    </div>
                    <div class="radio-row">
                        <input type="radio" id="priceRange1" name="priceRange" value="priceRange1">
                        <label for="priceRange1">$0 - $500</label>
                    </div>
                    <div class="radio-row">
                        <input type="radio" id="priceRange2" name="priceRange" value="priceRange2">
                        <label for="priceRange2">$500 - $1000</label>
                    </div>
                    <div class="radio-row">
                        <input type="radio" id="priceRange3" name="priceRange" value="priceRange3">
                        <label for="priceRange3">$1000 - $2000</label>
                    </div>
                    <div class="radio-row">
                        <input type="radio" id="priceRange4" name="priceRange" value="priceRange4">
                        <label for="priceRange4">> $2000</label>
                    </div>
                </div>

                <!-- Sort filter -->
                <div class="filter-box">
                    <h4>Sort</h4>
                    <!-- Order by price -->
                    <div class="select">
                        <select name="orderBy" id="orderBy">
                            <option value="low">Sort by price (low -> high)</option>
                            <option value="high">Sort by price (high -> low)</option>
                        </select>
                    </div>
                </div>

                <input type="submit" id="submit" value="Apply filter" class="button" />
            </form>
        </div>

        <!-- Product section -->
        <div class="product-list">
            <?php
            if (isset($msg)) {
                echo "<h3 align='center'>" . $msg . "</h3>";
            } else { ?>
                <div class="row" style="justify-content: flex-start;">
                    <?php foreach ($products as $product) : ?>
                        <div class="col-3" id="pagingProducts">
                            <a href="<?php echo BASE_PATH . '/products/view/' . $product['Product']['id'] ?>">
                                <img src="<?php echo BASE_PATH . '/public/images/' . $product['Product']['image'] . '_0.jpg'; ?>">
                            </a>
                            <h4><?php echo $product['Product']['name']; ?></h4>
                            <p>$<?php echo $product['Product']['price']; ?></p>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="row" style="float:left;">
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

                        echo "<a onclick=\"processPaging('" . $leftUrl . "')\" id=\"left\"><span>&laquo;</span></a>";
                        for ($i = 1; $i <= $totalPages; $i++) {
                            if ($i == $currentPageNumber) {
                                echo "<a onclick=\"processPaging('" . $midUrls[$i] . "')\"><span style=\"background: #ff523b;color: #fff;\">" . $i . "</span></a>";
                            } else {
                                echo "<a onclick=\"processPaging('" . $midUrls[$i] . "')\"><span>" . $i . "</span></a>";
                            }
                        }
                        echo "<a onclick=\"processPaging('" . $rightUrl . "')\" id=\"right\"><span>&raquo;</span></a>";
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<!-- SCROLL TO TOP BUTTON -->
<button onclick="topFunction()" id="myBtn" title="Go to top">
    <img src="<?php echo BASE_PATH . "/public/icons/expand_less.png" ?>">
</button>

<script type="text/javascript">
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

    let radios = document.getElementsByName('priceRange');
    for (let i = 0; i < radios.length; i++) {
        radios[i].onclick = function(e) {
            if (e.ctrlKey) {
                this.checked = false;
            }
        }
    }
</script>