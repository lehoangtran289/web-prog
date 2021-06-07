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
            if(!$product)
                header('Location: ' . BASE_PATH . '/public/404.php');
            $relatedProducts = $this->Product->custom('SELECT * FROM products WHERE category_id = ' . $product['Product']['category_id'] . ' AND id != ' . $id . ' order by price desc limit 4');
            $reviews = performAction('reviews', 'findAll', array($id));
            $this->set('reviews', $reviews);
            $this->set('product', $product);
            $this->set('relatedProducts', $relatedProducts);
        }
        
        function page($pageNumber = 1, $name = '') {
            // handle filters
            if (isset($_POST['orderBy'])) {
                if ($_POST['orderBy'] == 'low') $this->Product->orderBy('price', 'ASC');
                else $this->Product->orderBy('price', 'DESC');
            }
            if (isset($_POST['brands'])) {
                $this->Product->in('category_id', $_POST['brands']);
            }
            if (isset($_POST['priceRange'])) {
                $priceRange = $_POST['priceRange'];
                switch ($priceRange) {
                    case 'priceRange1':
                        $this->Product->greaterOrEqual('price', 0);
                        $this->Product->lowerOrEqual('price', 500);
                        break;
                    case 'priceRange2':
                        $this->Product->greaterOrEqual('price', 500);
                        $this->Product->lowerOrEqual('price', 1000);
                        break;
                    case 'priceRange3':
                        $this->Product->greaterOrEqual('price', 1000);
                        $this->Product->lowerOrEqual('price', 2000);
                        break;
                    case 'priceRange4':
                        $this->Product->greaterOrEqual('price', 2000);
                        break;
                }
            }
            
            // handle header search
            if ($name != '' || !ctype_space($name)) {
                $this->Product->like('name', $name);
                $this->set('name', $name);
            }
            $this->Product->setPage($pageNumber);
            $this->Product->setLimit('12');
            $this->Product->greater('quantity', 0);
            
            $products = $this->Product->search();
            $totalPages = $this->Product->totalPages();
            if ($pageNumber > $totalPages || $pageNumber <= 0) {
                $this->set('msg', "No products found");
            }
            $categories = performAction('categories', 'findAll', array());
            $this->set('brands', $categories);
            
            $this->set('totalPages', $totalPages);
            $this->set('products', $products);
            $this->set('currentPageNumber', $pageNumber);
        }
        
        function index()       // show all products
        {
            $this->Product->showHasOne();
            $this->Product->showHasMany();
            $this->Product->greater('quantity', 0);
            $products = $this->Product->search();
            
            
            $this->set('products', $products);
            
            // Get the list of category
            $categories = $this->Product->custom('SELECT * FROM categories LIMIT 3');
            $this->set('categories', $categories);
            
            // Get list of featured products
            $featuredProducts = $this->Product->custom('SELECT * FROM products WHERE quantity>0 ORDER BY price DESC LIMIT 3');
            $this->set('featuredProducts', $featuredProducts);
            
            // Get list of latest products
            $latestProducts = $this->Product->custom('SELECT * FROM products WHERE quantity>0 ORDER BY created_at DESC LIMIT 8');
            $this->set('latestProducts', $latestProducts);
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
        
        function search($name = '') {
            $this->render = 0;
            error_reporting(0);
            if ($name != '') {
                $this->Product->like('name', $name);
                echo json_encode($this->Product->search());
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