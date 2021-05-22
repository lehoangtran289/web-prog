<?php

class Category extends VanillaModel {
    var $hasMany = array('Product' => 'Product');
}