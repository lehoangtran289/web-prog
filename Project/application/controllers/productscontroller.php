<?php
    session_start();
    
    class ProductsController extends VanillaController {
        
        function beforeAction() {
        
        }
        
        function view($id = null) {
            $this->Product->id = $id;
            $this->Product->showHasOne();
            $this->Product->showHMABTM();
            $this->Product->showHasMany();
            $product = $this->Product->search();
            
            $this->set('product', $product);
            
        }
        
        function page($pageNumber = 1) {
            $this->Product->setPage($pageNumber);
            $this->Product->setLimit('10');
            $products = $this->Product->search();
            $totalPages = $this->Product->totalPages();
            $this->set('totalPages', $totalPages);
            $this->set('products', $products);
            $this->set('currentPageNumber', $pageNumber);
        }
        
        function index()       // show all products
        {
            $this->Product->showHasOne();
            $this->Product->showHasMany();
            $products = $this->Product->search();
            
            
            if (isset($_POST["add_to_cart"]))   // if user add something to cart
            {
                if (isset($_SESSION["cart"]))   // check if cart has something
                {
                
                } else      // if cart is empty
                {
                
                }
            }
            
            $brands = performAction('categories', 'findAll', array());
            $this->set('brands', $brands);
            $this->set('products', $products);
        }
        
        function delete() {
        
        }
        
        
        function findProducts($categoryId = null, $categoryName = null) {
            $this->Product->where('category_id', $categoryId);
            $this->Product->orderBy('name');
            return $this->Product->search();
        }
        
        
        function afterAction() {
        
        }
        
        function findAll() {
            $this->Product->showHasOne();
            return $this->Product->search();
        }
    
        function findById($id = '') {
            if ($id != '') {
                $this->Product->where('id', $id);
                return $this->Product->search();
            }
        }
        
        function processSearchReq() {
            $this->render = 0;
            error_reporting(0);
            
            $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
            
            if ($contentType === "application/json") {
                //Receive the RAW post data.
                $content = trim(file_get_contents("php://input"));
                $decoded = json_decode($content, true);
                
                $db = @mysqli_connect('127.0.0.1', 'root', '1');
                $sql = "select * from products inner join categories on products.category_id = categories.id where '1'='1'";
                foreach ($decoded as $key => $value) {
                    if ($key == 'name') {
                        $sql .= " and name like " . "'%" . mysqli_real_escape_string($db, $value) . "%'";
                    }
                    if ($key == 'brands') {
                        $sql .= " and brand in (";
                        foreach ($value as $k => $v) {
                            if ($k != count($value) - 1) {
                                $sql .= "'" . mysqli_real_escape_string($db, $v) . "'" . ", ";
                            } else {
                                $sql .= "'" . mysqli_real_escape_string($db, $v) . "'";
                            }
                        }
                        $sql .= ") ";
                    }
                    if ($key == 'orderBy') {
                        $sql .= $value == 'lowToHigh' ? "order by price asc" : "order by price desc";
                    }
                }
                
                global $inflect;
                $data = $this->Product->custom($sql);
                $data = array_map(function ($x) use ($inflect) {
                    return $x[ucfirst($inflect->singularize('products'))];
                }, $data);
                echo json_encode($data);
            }
        }
    }