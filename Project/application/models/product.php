<?php
    
    class Product extends VanillaModel {
        var $hasOne = array('Category' => 'Category');
        var $hasManyAndBelongsToMany = array('Order' => 'Order');
        var $hasMany = array('Review' => 'Review');
    }