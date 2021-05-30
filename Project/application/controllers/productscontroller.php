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
            
            $this->set('products', $products);
        }
        
        function removeFromCart() {
        
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
            return $this->Product->search();
        }
    }