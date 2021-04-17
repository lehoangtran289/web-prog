<?php
    
    class MethodTest {
        public function __call($name, $arguments) {
            //NOTE: value of $name is case sensitive
            echo "Calling object method '$name'" . implode(', ', $arguments) . "<br>";
        }
        
        public static function __callStatic($name, $arguments) {
            //NOTE: value of $name is case sentitive
            echo "Calling static method '$name'" .
                    implode(', ', $arguments) . "<br";
        }
    }
    
    $obj = new MethodTest();
    $obj->runTest('in object context');
    
    MethodTest::runTest('in static context');
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>MethodOverLoading</title>
    </head>
    <body>
    
    </body>
</html>
