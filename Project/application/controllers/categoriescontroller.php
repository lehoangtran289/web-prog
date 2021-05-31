<?php
    
    class CategoriesController extends VanillaController {
        
        function beforeAction() {
        
        }
        
        function afterAction() {
        
        }
        
        function view($categoryId = null) {
            
            $this->Category->id = $categoryId;
            $this->Category->showHasOne();
            $this->Category->showHasMany();
            $category = $this->Category->search();
            
            $this->set('category', $category);
            
        }
        
        
        function index() {
            $this->Category->orderBy('brand', 'ASC');
            $this->Category->showHasOne();
            $this->Category->showHasMany();
//            $this->Category->where('parent_id', '0');
            $categories = $this->Category->search();
            $this->set('categories', $categories);
        }
        
        /**
         * Now suppose that we are in the categories controller and we want to implement a query on the products
         * table. One way to implement this is using a custom query i.e. $this->Category->custom(’select * from
         * products where ….’);
         */
        function view2($categoryId = null, $categoryName = null) {
            $categories = performAction('products', 'findProducts', array($categoryId, $categoryName));
        }
        
        function findAll() {
            return $this->Category->search();
        }
    
        function findById($id = '') {
            if ($id != '') {
                $this->Category->where('id', $id);
                return $this->Category->search();
            }
        }
        
        
    }