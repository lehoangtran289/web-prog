<?php
    class ShipmentsController extends VanillaController {
        
        function beforeAction() {
        
        }
        
        function afterAction() {
        
        }
    
        function findAll() {
            return $this->Shipment->search();
        }
    }