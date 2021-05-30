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
        
        // AJAX FUNCTIONS
        function processAction($controller = null) {
            $this->render = 0;
            error_reporting(0);
            if (isset($controller)) {
                global $inflect;
                if ($controller == 'users') {
                    $data = $this->Admin->custom("SELECT * FROM users WHERE role != 'admin'");
                } else {
                    $data = performAction($controller, 'findAll', array());
                }
                $data = array_map(function ($x) use ($inflect, $controller) {
                    return $x[ucfirst($inflect->singularize($controller))];
                }, $data);
                echo json_encode($data);
            }
        }
        
        // USER CRUD
        function users_add() {
            if (isset($_POST['submit'])) {
                $add_user = new User();
                $add_user->id = null;
                $add_user->username = $_POST['username'];
                $add_user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $add_user->name = $_POST['name'];
                $add_user->email = $_POST['email'];
                $add_user->address = $_POST['address'];
                $add_user->phone = $_POST['phone'];
                if ($add_user->save() == -1) {
                    return;
                }
                header('Location: ' . BASE_PATH . '/admin');
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
                if ($updated_user->save() == -1) {
                    return;
                }
                header('Location: ' . BASE_PATH . '/admin');
            }
        }
        
        function users_delete($id) {
            $deleted_user = new User();
            $deleted_user->id = $id;
            $deleted_user->delete();
            header('Location: ' . BASE_PATH . '/admin');
        }
        
        // PRODUCTS CRUD
        function products_update($id) {
            // TODO: performAction in productsontroller
        }
    
        // CATEGORIES CRUD
        function categories_update($id) {
            // TODO: performAction in categoriescontroller
        }
        
        // SHIPMENTS CRUD
        function shipments_update($id) {
            // TODO: performAction in shipmentscontroller
        }
        
        // PAYMENTS CRUD
        function payments_update($id) {
            // TODO: performAction in paymentscontroller
        }
    }