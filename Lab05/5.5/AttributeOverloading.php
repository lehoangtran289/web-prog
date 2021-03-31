<?php
    class PropertyTest {
        /** Location for overloaded data. */
        private array $data = array();
        
        /** Overloading not used on declared properties */
        public int $declared = 1;
        
        /** Overloading only used on this when accessed outside the class. */
        private int $hidden = 2;
        
        public function __get($name) {
            echo "Getting '$name' <br>";
            if (array_key_exists($name, $this->data)) {
                return $this->data[$name];
            } else {
                echo "'" . $name .  "' not found or private";
            }
            
            $trace = debug_backtrace();
            trigger_error(
                'Undefined property via __get(): ' . $name .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'],
                E_USER_NOTICE
            );
            return null;
        }
        
        public function __set($name, $value) {
            echo "Setting '$name' to '$value'<br>";
            $this->data[$name] = $value;
        }
        
        public function __isset($name): bool {
            echo "Is '$name' set?<br>";
            return isset($this->data[$name]);
        }
        
        public function __unset($name) {
            echo "<br>Unsetting '$name'<br>";
            unset($this->data[$name]);
        }
        
        public function getHidden(): int {
            return $this->hidden;
        }
    }
    
    $obj = new PropertyTest;
    $obj->a = 1;
    echo $obj->a . "<br>";
    
    var_dump(isset($obj->a));
    unset($obj->a);
    var_dump(isset($obj->a));
    echo "<br>";
    
    echo $obj->declared."<br>";
    echo "Let's experiment with the private property named 'hidden':<br>";
    echo "Privates are visible inside the class, so __get() not used...<br>";
    echo $obj->getHidden()."<br>";
    
    echo "Privates not visible outside of class, so __get() is used...<br>";
    echo $obj->hidden."<br>";
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    
    </body>
</html>

