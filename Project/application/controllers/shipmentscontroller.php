<?php
    
    class ShipmentsController extends VanillaController {
        
        function beforeAction() {
        
        }
        
        function afterAction() {
        
        }
        
        function findAll() {
            return $this->Shipment->search();
        }
    
        function findById($id = '') {
            if ($id != '') {
                $this->Shipment->where('id', $id);
                return $this->Shipment->search();
            }
        }
    }