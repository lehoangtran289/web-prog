<style>
    .row {
        justify-content: start;
    }
    
    .row h2 {
        text-transform: uppercase;
        font-size: 24px;
        font-weight: 700;
        transition: all .3s ease 0s;
    }
    
    .row p {
        margin-left: 20px;
        color: #ff523b;
        text-transform: uppercase;
        font-size: 24px;
        font-weight: 700;
        transition: all .3s ease 0s;
    }
    
    .total-price table {
        border-top: 3px solid #1e1e1eec;
        width: 100%;
        max-width: 300px;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
    }
    
    th {
        text-align: left;
        padding: 5px;
        color: #fff;
        background: #1e1e1eec;
        font-weight: normal;
    }
    
    td {
        padding: 10px 5px;
    }
    
    td a {
        color: #ff523b;
    }
    
    td img {
        width: 80px;
        height: 80px;
        margin-right: 10px;
    }
    
    button {
        background: #f3f3f3;
        padding: 5px 8px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    
    button:hover {
        background: #ff523b;
        color: #fff;
    }
    
    /*    modal     */
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    }
    
    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }
    
    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<div class="small-container order-page">
    <div class="row row-2">
        <h2>Order History</h2>
    </div>
    <table>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Total Bill</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Shipment</th>
            <th>Payment</th>
            <th>Detail</th>
        </tr>
        <?php
            $j = 1;
            foreach ($orders as $order) {?>
                <tr>
                    <td>
                        <?php echo $j; $j++;?>
                    </td>
                    <td>
                        <?php echo $order['Order']['date'] ?>
                    </td>
                    <td>
                        $<?php echo $order['Order']['total_bill'] ?>
                    </td>
                    <td>
                        <?php echo $order['Order']['phone'] ?>
                    </td>
                    <td>
                        <?php echo $order['Order']['address'] ?>
                    </td>
                    <td>
                        <?php echo $order['Shipment']['method'] ?>
                    </td>
                    <td>
                        <?php echo $order['Payment']['method'] ?>
                    </td>
                    <td>
                        <a href="#view-detail" onclick="viewData(<?php echo $order['Order']['id'] ?>)"
                           name="viewdetail-btn-<?php echo $order['Order']['id'] ?>"><span>View Detail</span></a>
                        <div id="myModal-<?php echo $order['Order']['id'] ?>" class="modal" name="modal">
                            <div class="modal-content">
                                <span class="close" id="close-<?php echo $order['Order']['id'] ?>">&times;</span>
                                <table>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Image</th>
                                        <th>Quantity</th>
                                    </tr>
                                    <?php
                                        $i = 1;
                                        foreach ($order['Product'] as $product) { ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i; $i++;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $product['Product']['name'] ?>
                                                    </td>
                                                    <td>
                                                        <img src="<?php echo BASE_PATH . '/public/images/' . $product['Product']['image'] . '_0.jpg'?>">
                                                    </td>
                                                    <td>
                                                        <?php echo $product['orders_products']['product_qty'] ?>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>
    <script type="text/javascript">
        let viewData = (id) => {
            const modal = document.getElementById("myModal-" + id);
            modal.style.display = "block";
            
            let span = document.getElementById("close-" + id);
            span.onclick = function () {
                modal.style.display = "none";
            }
            window.onclick = function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            }
        }
    </script>