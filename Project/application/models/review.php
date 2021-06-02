<?php
    
    class Review extends VanillaModel {
        var $hasOne = array('User' => 'User');
    }