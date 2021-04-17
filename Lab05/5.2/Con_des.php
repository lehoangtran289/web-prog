<?php
    
    class BaseClass {
        protected string $name = "BaseClass";
        
        function __construct() {
            print("In " . $this->$name . " constructor<br>");
        }
        
        function __destruct() {
            print("Destroying " . $this->$name . "<br>");
        }
    }
    
    class SubClass extends BaseClass {
        function __construct() {
            $this->$name = "SubClass";
            parent::__construct();
        }
        
        function __destruct() {
            parent::__destruct();
        }
    }
    
    $obj1 = new SubClass();
    $obj2 = new BaseClass();
    
    // Comments: Constructors are ordinary methods which are called during the instantiation of their corresponding object.
    // Parent constructors are not called implicitly if the child class defines a constructor.
    // In order to run a parent constructor, a call to parent::__construct() within the child constructor is required
    // When $obj2 = new BaseClass() is called, the property $name isn't initialized hence the output would not have "BaseClass"