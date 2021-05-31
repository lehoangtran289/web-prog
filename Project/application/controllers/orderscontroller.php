<?php
    session_start();
    
    class OrdersController extends VanillaController {
        
        function beforeAction() {
        
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
        
        function index() {
            // check if user not login -> redirect to login page
            
            if (!isset($_SESSION['user']))
                header('Location: '.BASE_PATH.'/users/login');
            $this->Order->showHasOne();
            $this->Order->showHasMany();
            $orders = $this->Order->search();
            $this->set('orders', $orders);
        }

        function payout() {
            // check if user not login -> redirect to login page

            if (!isset($_SESSION['user']))
                header('Location: '.BASE_PATH.'/users/login');

        }


//    function findProducts($categoryId = null, $categoryName = null) {
//        $this->Product->where('category_id', $categoryId);
//        $this->Product->orderBy('name');
//        return $this->Product->search();
//    }
        
        
        function afterAction() {
        
        }
    }