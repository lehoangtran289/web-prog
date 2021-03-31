<?php
    include_once "Shape.php";
    
    //abstract child class
    abstract class Polygon extends Shape {
        abstract function getNumberOfSides();
    }