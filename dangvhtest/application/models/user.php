<?php

class User extends VanillaModel {
    var $hasMany = array('Review' => 'Review');
}