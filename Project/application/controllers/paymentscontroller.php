<?php
    
    class PaymentsController extends VanillaController {
        
        function beforeAction() {
        
        }
        
        function afterAction() {
        
        }
        
        function findAll() {
            return $this->Payment->search();
        }
    }