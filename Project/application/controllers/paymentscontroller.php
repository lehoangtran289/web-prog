<?php
    
    class PaymentsController extends VanillaController {
        
        function beforeAction() {
        
        }
        
        function afterAction() {
        
        }
        
        function findAll() {
            return $this->Payment->search();
        }
    
        function findById($id = '') {
            if ($id != '') {
                $this->Payment->where('id', $id);
                return $this->Payment->search();
            }
        }
    }