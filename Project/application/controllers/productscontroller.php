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
            $reviews = performAction('reviews', 'findAll', array($id));
            $this->set('reviews', $reviews);
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

            
            $this->set('products', $products);

            // Get the list of category
            $categories = $this->Product->custom('SELECT * FROM categories LIMIT 3');
            $this->set('categories', $categories);

            // Get list of featured products
            $featuredProducts = $this->Product->custom('SELECT * FROM products ORDER BY price DESC LIMIT 4');
            $this->set('featuredProducts', $featuredProducts);

            // Get list of latest products
            $latestProducts = $this->Product->custom('SELECT * FROM products ORDER BY created_at DESC LIMIT 8');
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
    }