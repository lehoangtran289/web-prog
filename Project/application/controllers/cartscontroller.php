<?php
    session_start();
    class CartsController extends VanillaController {

        function beforeAction() {

        }
        
        function afterAction() {
        
        }

        function view() {
            var_dump($_SESSION['cart']);
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0) {
                $cart = array();
                foreach ($_SESSION['cart'] as $id => $quantity) {
                    $data = $this->Cart->custom('SELECT * FROM products WHERE id='.$id);
                    $data['buy_quantity'] = $quantity; 
                    array_push($cart, $data);
                }
                $this->set('cart', $cart);
            } else {
                $this->set('cart', 'None');
            }
        }

        function removeFromCart() {
            $id = $_POST['id'];
            unset($_SESSION['cart'][$id]);
        }

        function addToCart() {

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
        }

    
    }