<?php
    //define autoload function
    
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });
    
    $myCollection = array();
    
    //make a rectangle
    $r = new Rectangle();
    $r->width = 5;
    $r->height = 7;
    $myCollection[] = $r;
    unset($r);
    
    //make a triangle
    $t = new Triangle();
    $t->base = 4;
    $t->height = 5;
    $myCollection[] = $t;
    unset($t);
    
    //make a circle
    $c = new Circle();
    $c->radius = 3;
    $myCollection[] = $c;
    unset($c);
    
    //make a color
    $c = new Color();
    $c->name = "blue";
    $myCollection[] = $c;
    unset($c);
    
    foreach ($myCollection as $s) {
        if ($s instanceof Shape) {
            echo "Area: " . $s->getArea() . "<br>";
        }
        if ($s instanceof Polygon) {
            echo "Sides: " . $s->getNumberOfSides() . "<br>";
        }
        if ($s instanceof Color) {
            echo "Color: " . $s->name . "<br>";
        }
        echo "<br>";
    }
?>