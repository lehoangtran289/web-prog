<?php

class Order extends VanillaModel {
    var $hasOne = array('Shipment' => 'Shipment', 'Payment' => 'Payment');
    var $hasManyAndBelongsToMany = array('Product' => 'Product');
}