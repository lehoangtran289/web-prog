<?php
    session_start();
    
    class OrdersController extends VanillaController {
        
        function beforeAction() {
            // check if user not login -> redirect to login page
            if (!isset($_SESSION['user']))
                header('Location: '.BASE_PATH.'/users/login');
        }

//    function view($id = null) {
//        $this->Product->id = $id;
//        $this->Product->showHasOne();
//        $this->Product->showHMABTM();
//        $this->Product->showHasMany();
//        $product = $this->Product->search();
//
//        $this->set('product', $product);
//
//    }
        /*
        function index() {
            $this->Order->showHasOne();
            $this->Order->showHasMany();
            $this->User->where('username', $username);
            $userId =$this->Order->custom('SELECT * FROM users WHERE username='.$_SESSION['user']['username']);

            $orders = $this->Order->search();
            $this->set('orders', $orders);
        }*/

        function index() {
            $cart = array();
            foreach ($_SESSION['cart'] as $id => $quantity) {
                $item = performAction('products', 'findById', array($id));
                $item['0']['buy_qty'] = $quantity; 
                array_push($cart, $item['0']);
            }
            $shipment_methods = performAction('shipments', 'findAll', array());
            $payment_methods = performAction('payments', 'findAll', array());
            $user = performAction('users', 'findById', array($_SESSION['user']['id']));
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
                $new_order -> total_bill =  $_POST['total_bill'];
                if ($new_order->save() == -1) {
                    echo "<script type='text/javascript'>alert('Purchase fail at create order, try again!');</script>";
                    return;
                }
                /*
                foreach ($_SESSION['cart'] as $id => $qty){
                    $new_order_product = new Orders_product();
                    $new_order_product -> id = null;
                    $new_order_product -> order_id = $new_order -> id;
                    $new_order_product -> product_id = $id;
                    $new_order_product -> product_qty = $qty;
                    if ($new_order_product->save() == -1) {
                        echo "<script type='text/javascript'>alert('Purchase fail at create order product, try again!');</script>";
                        return;
                    }
                }
                */
                header("Location: ". BASE_PATH ."/orders/thankyou");
            }
        }

        function payout() {
            // check if user not login -> redirect to login page

            if (!isset($_SESSION['user']))
                header('Location: '.BASE_PATH.'/users/login');

        }

        function thankyou(){

        }

        function viewall() {
            $this->Order->where('user_id', $_SESSION['user']['id']);
            $orders = $this->Order->search();
            $this->set('orders', $orders);
        }
        
        function afterAction() {
        
        }
    }