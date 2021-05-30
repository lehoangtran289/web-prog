<?php
    session_start();
    
    class AdminController extends VanillaController {
        
        function beforeAction() {
            if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
                header('Location: '.BASE_PATH.'/users/login');
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
            $user = performAction('users', 'findById', array($id));
            $this->set('user', $user[0]);
            if (isset($_POST['submit'])) {
                $updated_user = new User();
                $updated_user->id = $id;
                $updated_user->username = $_POST['username'];
                $updated_user->name = $_POST['name'];
                $updated_user->email = $_POST['email'];
                $updated_user->address = $_POST['address'];
                $updated_user->phone = $_POST['phone'];
                $updated_user->save();
                header('Location: ' . BASE_PATH . '/admin');
            }
        }
        
        function users_delete($id) {
            $deleted_user = new User();
            $deleted_user->id = $id;
            $deleted_user->delete();
            header('Location: ' . BASE_PATH . '/admin');
        }
        
        function users_add() {
            echo "add";
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
    }