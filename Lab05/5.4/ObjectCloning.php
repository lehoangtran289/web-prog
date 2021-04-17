<?php
    
    class ObjectTracker {
        private static $nextSerial = 0;
        private $id, $name;
        
        function __construct($name) {
            $this->name = $name;
            $this->id = ++self::$nextSerial;
        }
        
        function __clone() {
            $this->name = "Clone of $this->name";
            $this->id = ++self::$nextSerial;
        }
        
        function getId() {
            return $this->id;
        }
        
        function getName() {
            return $this->name;
        }
        
        function setName($name) {
            $this->name = $name;
        }
    }
    
    $ot = new ObjectTracker("Zeev Object");
    $ot2 = clone $ot;
    
    $ot2->setName("Another Project");
    
    echo $ot->getId() . " " . $ot->getName() . "<br>";
    echo $ot2->getId() . " " . $ot2->getName() . "<br>";
    
    $ot2 = $ot;
    $ot2->setName("Another Project using '='");
    
    echo $ot->getId() . " " . $ot->getName() . "<br>";
    echo $ot2->getId() . " " . $ot2->getName() . "<br>";
    
    // Comments:
    // When an object is cloned using `__clone()`, PHP will perform a shallow copy of all of the object's properties.
    // Assigning ot to ot2 using "=" will create a reference of ot, any modification on ot2's properties will result in
    // the same modification on ot1's properties