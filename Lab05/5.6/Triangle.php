<?php
    require_once "Polygon.php";
    
    //concrete class
    class Triangle extends Polygon {
        public $base;
        public $height;
        
        public function getArea() {
            return ($this->base * $this->height) / 2;
        }
        
        function getNumberOfSides() {
            return (3);
        }
    }