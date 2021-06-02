<?php
    
    class ReviewsController extends VanillaController {
        
        function beforeAction() {
        
        }
        
        function afterAction() {
        
        }

        function findAll()
        {
            $this->Review->showHasOne();
            return $this->Review->search();
        }
    }
