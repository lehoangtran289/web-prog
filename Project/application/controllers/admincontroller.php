<?php
    session_start();
    
    class AdminController extends VanillaController {
        
        function beforeAction() {
            if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
                header('Location: ' . BASE_PATH . '/users/login');
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
                    $data = array_map(function ($x) use ($inflect, $controller) {
                        return $x[ucfirst($inflect->singularize($controller))];
                    }, $data);
                    echo json_encode($data);
                } else if ($controller == "products") {
                    $data = performAction($controller, 'findAll', array());
                    $data = array_map(function ($x) {
                        $x['Product']['brand'] = $x['Category']['brand'];
                        return $x['Product'];
                    }, $data);
                    echo json_encode($data);
                } else {
                    $data = performAction($controller, 'findAll', array());
                    $data = array_map(function ($x) use ($inflect, $controller) {
                        return $x[ucfirst($inflect->singularize($controller))];
                    }, $data);
                    echo json_encode($data);
                }
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
                    echo "<script type='text/javascript'>alert('Add/Update fail, try again!');</script>";
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
                $updated_user->email = $_POST['email'];
                $updated_user->name = $_POST['name'];
                $updated_user->address = $_POST['address'];
                $updated_user->phone = $_POST['phone'];
                if ($updated_user->save() == -1) {
                    echo "<script type='text/javascript'>alert('Add/Update fail, try again!');</script>";
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
        function products_add() {
            $categories = performAction('categories', 'findAll', array());
            $this->set("categories", $categories);
            
            if (isset($_POST['submit'])) {
                $add_product = new Product();
                $add_product->id = null;
                $add_product->name = $_POST['name'];
                $add_product->quantity = $_POST['quantity'];
                $add_product->category_id = $_POST['category'];
                $add_product->OS = $_POST['OS'];
                $add_product->chipset = $_POST['chipset'];
                $add_product->ram = $_POST['ram'];
                $add_product->display = $_POST['display'];
                $add_product->resolution = $_POST['resolution'];
                $add_product->camera = $_POST['camera'];
                $add_product->memory = $_POST['memory'];
                $add_product->pin = $_POST['pin'];
                $add_product->description = $_POST['description'];
                $add_product->price = $_POST['price'];
                if ($_FILES['image']['error'] > 0 || $_FILES['image']['size'] > 5000000) {
                    echo "<script type='text/javascript'>alert('Error uploading file!');</script>";
                    return;
                }
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $add_product->image = $_POST['name'] . ".jpg";
                    $target_path = PUBLIC_PATH . "/images/" . $add_product->image;
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
                } else {
                    echo "<script type='text/javascript'>alert('Uploading file failed!');</script>";
                    return;
                }
                if ($add_product->save() == -1) {
                    echo "<script type='text/javascript'>alert('Add fail, try again!');</script>";
                    return;
                }
                header('Location: ' . BASE_PATH . '/admin');
            }
        }
        
        function products_update($id) {
            $product = performAction('products', 'findById', array($id));
            $categories = performAction('categories', 'findAll', array());
            $this->set('product', $product[0]);
            $this->set("categories", $categories);
            
            if (isset($_POST['submit'])) {
                $updated_product = new Product();
                $updated_product->id = $id;
                $updated_product->name = $_POST['name'];
                $updated_product->category_id = $_POST['category'];
                $updated_product->quantity = $_POST['quantity'];
                $updated_product->OS = $_POST['OS'];
                $updated_product->ram = $_POST['ram'];
                $updated_product->chipset = $_POST['chipset'];
                $updated_product->display = $_POST['display'];
                $updated_product->camera = $_POST['camera'];
                $updated_product->resolution = $_POST['resolution'];
                $updated_product->memory = $_POST['memory'];
                $updated_product->description = $_POST['description'];
                $updated_product->pin = $_POST['pin'];
                $updated_product->price = $_POST['price'];
                if ($_FILES['image']['error'] > 0 || $_FILES['image']['size'] > 5000000) {
                    echo "<script type='text/javascript'>alert('Error uploading filee!');</script>";
                    return;
                }
                pprint($_FILES['image']);
                if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                    $updated_product->image = $_POST['name'] . ".jpg";
                    $target_path = PUBLIC_PATH . "/images/" . $updated_product->image;
                    move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
                    echo "here";
                }
                if ($updated_product->save() == -1) {
                    echo "<script type='text/javascript'>alert('Update fail, try again!');</script>";
                    return;
                }
//                header('Location: ' . BASE_PATH . '/admin');
            }
        }
        
        function products_delete($id) {
            $deleted_product = new Product();
            $deleted_product->id = $id;
            $deleted_product->delete();
            header('Location: ' . BASE_PATH . '/admin');
        }
        
        // CATEGORIES CRUD
        function categories_add() {
            if (isset($_POST['submit'])) {
                $add_category = new Category();
                $add_category->id = null;
                $add_category->brand = $_POST['brand'];
                if ($add_category->save() == -1) {
                    echo "<script type='text/javascript'>alert('Add/Update fail, try again!');</script>";
                    return;
                }
                header('Location: ' . BASE_PATH . '/admin');
            }
        }
        
        function categories_update($id) {
            $category = performAction('categories', 'findById', array($id));
            $this->set('category', $category[0]);
            if (isset($_POST['submit'])) {
                $updated_category = new Category();
                $updated_category->id = $id;
                $updated_category->brand = $_POST['brand'];
                if ($updated_category->save() == -1) {
                    echo "<script type='text/javascript'>alert('Add/Update fail, try again!');</script>";
                    return;
                }
                header('Location: ' . BASE_PATH . '/admin');
            }
        }
        
        function categories_delete($id) {
            $deleted_category = new Category();
            $deleted_category->id = $id;
            $deleted_category->delete();
            header('Location: ' . BASE_PATH . '/admin');
            
        }
        
        // SHIPMENTS CRUD
        function shipments_add() {
            if (isset($_POST['submit'])) {
                $add_shipment = new Shipment();
                $add_shipment->id = null;
                $add_shipment->method = $_POST['method'];
                $add_shipment->fee = $_POST['fee'];
                $add_shipment->description = $_POST['description'];
                if ($add_shipment->save() == -1) {
                    echo "<script type='text/javascript'>alert('Add/Update fail, try again!');</script>";
                    return;
                }
                header('Location: ' . BASE_PATH . '/admin');
            }
        }
        
        function shipments_update($id) {
            $shipment = performAction('shipments', 'findById', array($id));
            $this->set('shipment', $shipment[0]);
            if (isset($_POST['submit'])) {
                $updated_shipment = new Shipment();
                $updated_shipment->id = $id;
                $updated_shipment->method = $_POST['method'];
                $updated_shipment->fee = $_POST['fee'];
                $updated_shipment->description = $_POST['description'];
                if ($updated_shipment->save() == -1) {
                    echo "<script type='text/javascript'>alert('Add/Update fail, try again!');</script>";
                    return;
                }
                header('Location: ' . BASE_PATH . '/admin');
            }
        }
        
        function shipments_delete($id) {
            $deleted_shipment = new Shipment();
            $deleted_shipment->id = $id;
            $deleted_shipment->delete();
            header('Location: ' . BASE_PATH . '/admin');
        }
        
        // PAYMENTS CRUD
        function payments_add() {
            if (isset($_POST['submit'])) {
                $add_payment = new Payment();
                $add_payment->id = null;
                $add_payment->method = $_POST['method'];
                $add_payment->description = $_POST['description'];
                if ($add_payment->save() == -1) {
                    echo "<script type='text/javascript'>alert('Add/Update fail, try again!');</script>";
                    return;
                }
                header('Location: ' . BASE_PATH . '/admin');
            }
        }
        
        function payments_update($id) {
            $payment = performAction('payments', 'findById', array($id));
            $this->set('payment', $payment[0]);
            if (isset($_POST['submit'])) {
                $updated_payment = new Payment();
                $updated_payment->id = $id;
                $updated_payment->method = $_POST['method'];
                $updated_payment->description = $_POST['description'];
                if ($updated_payment->save() == -1) {
                    echo "<script type='text/javascript'>alert('Add/Update fail, try again!');</script>";
                    return;
                }
                header('Location: ' . BASE_PATH . '/admin');
            }
        }
        
        function payments_delete($id) {
            $delete_payment = new Payment();
            $delete_payment->id = $id;
            $delete_payment->delete();
            header('Location: ' . BASE_PATH . '/admin');
        }
    }