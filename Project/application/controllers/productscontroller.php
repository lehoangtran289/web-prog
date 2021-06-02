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
            $review = performAction('reviews', 'findAll', array());
            pprint($review);
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