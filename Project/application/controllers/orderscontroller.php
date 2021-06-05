<?php
    session_start();
    
    class OrdersController extends VanillaController {
        
        function beforeAction() {
            // check if user not login -> redirect to login page
            if (!isset($_SESSION['user']))
                header('Location: '.BASE_PATH.'/users/login');
        }

        function index() {
            $cart = array();
            $total_bill = 0;
            foreach ($_SESSION['cart'] as $id => $quantity) {
                $item = performAction('products', 'findById', array($id));
                $item['0']['buy_qty'] = $quantity; 
                $total_bill += (int)$item['0']['Product']['price'] * $quantity;
                array_push($cart, $item['0']);
            }
            $shipment_methods = performAction('shipments', 'findAll', array());
            $payment_methods = performAction('payments', 'findAll', array());
            $user = performAction('users', 'findById', array($_SESSION['user']['id']));
            //$this->set('total_bill', $total_bill);
            $_SESSION['order']['total_bill'] = $total_bill;
            $this->set('cart', $cart);
            $this->set('shipment_methods', $shipment_methods);
            $this->set('payment_methods', $payment_methods);
            $this->set('user', $user['0']['User']);
        }

        function confirmPurchase() {
            $this->render = 0;
            error_reporting(0);
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            if (isset($_POST['confirmPurchase'])) {
                $new_order = new Order();
                $new_order -> id = null;
                $new_order -> user_id = $_POST['user_id'];
                $new_order -> phone = $_POST['phone'];
                $new_order -> address = $_POST['address'];
                $new_order -> shipment_id = $_POST['shipment-method'];
                $new_order -> payment_id = $_POST['payment-method'];
                $new_order -> date = date("Y-m-d h:i:s");
                $new_order -> total_bill =  $_SESSION['order']['total_bill'];
                $order_id = $new_order->saveAndGetId();
                if ($order_id == -1) {
                    echo "<script type='text/javascript'>alert('Purchase fail at create order, try again!');</script>";
                    return;
                }
                foreach ($_SESSION['cart'] as $id => $qty){
                    $new_order_product = new Orders_product();
                    $res = $new_order_product->custom("INSERT INTO orders_products (order_id,product_id,product_qty) VALUES (".$order_id.",".$id.",".$qty.");");
                    if ($res == -1) {
                        echo "<script type='text/javascript'>alert('Purchase fail at create order product, try again!');</script>";
                        return;
                    }
                    $product = performAction('products', 'findById', array($id));
                    $updated_product = new Product;
//                    $updated_product -> quantity = $product['0']['Product']['quantity'] - $qty;
//                    $updated_product -> id = $product['0']['Product']['id'];
//                    if ($updated_product -> save() == -1) {
//                        echo "<script type='text/javascript'>alert('Purchase fail at update product, try again!');</script>";
//                    }
                    $updated_product->custom("UPDATE products SET `quantity` = '".($product['0']['Product']['quantity'] - $qty)."' WHERE `id`='".$id."'");
                }
                header("Location: ". BASE_PATH ."/orders/thankyou");
            }
        }

        function thankyou(){
            unset($_SESSION['cart']);
        }

        function viewall() {
            $this->Order->where('user_id', $_SESSION['user']['id']);
            $orders = $this->Order->search();
            $this->set('orders', $orders);
        }
        
        function is_bought($user_id, $product_id) {
            $this->Order->where('user_id', $user_id);
            $this->Order->showHasMany();
            $products = $this->Order->search();
            foreach($products as $product) {
                if ($product["Orders_product"][0]['Orders_product']['product_id'] == $product_id) {
                    return true;
                }
            }
            return False;
        }

        function afterAction() {
        
        }
    }