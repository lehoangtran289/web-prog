<?php
    require_once "Shape.php";
    
    //concrete class
    class Circle extends Shape {
        public $radius;
        
        function getArea() {
            return pi() * $this->radius * $this->radius;
        }
    }