<?php
    session_start();
    
    class AdminController extends VanillaController {
        
        function beforeAction() {
            if (!isset($_SESSION['user']['username'])) { //TODO: admin authenticate
                header('Location: ' . BASE_PATH . '/users/login');
            }
        }
        
        function afterAction() {
        
        }
        
        function index() {
            // navigate link to edit page
        }
        
        function processAction($controller_value = null) {
            $this->render = 0;
            error_reporting(0);
            if (isset($controller_value)) {
                global $inflect;
//                $data = $this->Admin->custom("SELECT * FROM " . $controller_value);
                $data = performAction($controller_value, 'findAll', array());
                $data = array_map(function ($x) use ($inflect, $controller_value) {
                    return $x[ucfirst($inflect->singularize($controller_value))];
                }, $data);
                echo json_encode($data);
            }
        }
        
        function users_update($id) {
            // TODO: performAction in usercontroller
        }
    
        function products_update($id) {
            // TODO: performAction in productsontroller
        }
    
        function categories_update($id) {
            // TODO: performAction in categoriescontroller
        }
    
        function shipments_update($id) {
            // TODO: performAction in shipmentscontroller
        }
    
        function payments_update($id) {
            // TODO: performAction in paymentscontroller
        }
        
        function users() {
            $users = performAction('users', 'findAll', array());
            $this->set('users', $users);
        }
    }