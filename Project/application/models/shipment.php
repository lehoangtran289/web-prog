<?php
    
    class Shipment extends VanillaModel {
        var $hasMany = array('Order' => 'Order');
    }