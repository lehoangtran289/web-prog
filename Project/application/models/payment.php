<?php
class Payment extends VanillaModel {
    var $hasMany = array('Order' => 'Order');
}
