<?php
    session_start();
    class CartsController extends VanillaController {

        function beforeAction() {

        }
        
        function afterAction() {
        
        }

        function index() {
            var_dump($_SESSION['cart']);
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) {
                $cart = array();
                foreach ($_SESSION['cart'] as $id => $quantity) {
                    $item = performAction('products', 'findById', array($id));
                    $item['0']['buy_qty'] = $quantity; 
                    $item = json_encode($item['0']);
                    #echo $item;
                    array_push($cart, $item);
                }
                $this->set('cart', $cart);
            } else {
                $this->set('cart', 'None');
            }
        }

        function removeFromCart($id) {
            $this->render = 0;
            error_reporting(0);

            unset($_SESSION['cart'][$id]);
            $cart = array();
            foreach ($_SESSION['cart'] as $id => $quantity) {
                $item = performAction('products', 'findById', array($id));
                $item['0']['buy_qty'] = $quantity; 
                $item = json_encode($item['0']);
                array_push($cart, $item);
            }
            
            $this->set('cart', $cart);
            if (count($_SESSION['cart']) == 0) {
                echo '{}';
            } else {
                echo json_encode($cart);
            }
        }

        function increaseItemQty($id) {
            $this->render = 0;
            error_reporting(0);
            $_SESSION['cart'][$id] += 1;
            $cart = array();
            foreach ($_SESSION['cart'] as $id => $quantity) {
                $item = performAction('products', 'findById', array($id));
                $item['0']['buy_qty'] = $quantity; 
                $item = json_encode($item['0']);
                array_push($cart, $item);
            }
            echo json_encode($cart);
            $this->set('cart', $cart);
        }

        function decreaseItemQty($id) {
            $this->render = 0;
            error_reporting(0);
            $_SESSION['cart'][$id] -= 1;
            if ($_SESSION['cart'][$id] == 0) {
                unset($_SESSION['cart'][$id]);
            }
            $cart = array();
            foreach ($_SESSION['cart'] as $id => $quantity) {
                $item = performAction('products', 'findById', array($id));
                $item['0']['buy_qty'] = $quantity; 
                $item = json_encode($item['0']);
                array_push($cart, $item);
            }
            $this->set('cart', $cart);
            if (count($_SESSION['cart']) == 0) {
                echo '{}';
            } else {
                echo json_encode($cart);
            }
        }

        function addToCart() {
            $this->render = 0;
            error_reporting(0);
            $id = $_POST['id'];
            if (isset($_SESSION['cart'])) {
                if (isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id] += 1;
                } else {
                    $_SESSION['cart'][$id] = 1;
                }
            } else {
                $_SESSION['cart'][$id] = 1;
            }
            header("Location: " . BASE_PATH . "/carts/index");
        }

    
    }