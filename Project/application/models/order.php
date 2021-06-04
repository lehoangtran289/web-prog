<?php
    
    class Order extends VanillaModel {
        var $hasOne = array('Shipment' => 'Shipment', 'Payment' => 'Payment');
        var $hasMany = array('Orders_product' => 'Orders_product');
        var $hasManyAndBelongsToMany = array('Product' => 'Product');
    }