<html>
    <head><title> Birthday </title></head>
    <h1>Got your input</h1>
    <body>
    <?php
        function reformat_str_date($date_str) {
            list($d, $m, $y) = explode('/',$date_str);
            $new_str_date = $m . "/" . $d . "/" . $y;
            return $new_str_date;
        }
        
        function check_dob($dob) {
            list($d, $m, $y) = explode('/',$dob);
            $day = intval($d);
            $month = intval($m);
            $year = intval($y);
            return checkdate($month, $day, $year);
        }

        function display_dob($dob) {
            $date_str = reformat_str_date($dob);
            $date = strtotime($date_str);    
            print "DOB: " . date("d, M, Y", $date);
        }

        function display_dob_diff($dob1, $dob2, $mode) {
            $date_str1 = reformat_str_date($dob1);
            $date1 = date_create($date_str1);  
            $date_str2 = reformat_str_date($dob2);
            $date2 = date_create($date_str2);  
            if ($mode == 1) {
                $interval = date_diff($date1, $date2);
                echo "<br>" . $interval -> format("Difference between two dobs is: %a day<br>");
            } else {
                $year_diff = $date1 -> diff($date2);
                echo "Difference between two dobs in year is: " . ($year_diff -> m) / 12 . " years";
            }
        }

        function cal_age($date) {
            $date_str = reformat_str_date($date);
            $d = date_create($date_str);
            $today = new DateTime;
            $interval = $d -> diff($today);
            return $interval -> y;
        }
        
        $name1 = $_POST["name1"];
        $dob1 = $_POST["dob1"];
        $name2 = $_POST["name2"];
        $dob2 = $_POST["dob2"];

        print "Name of the first person: " . $name1;
        echo "<br>";
        if (check_dob($dob1) == false) {
            print "DOB of the first person is invalid!!<br>";
        } else display_dob($dob1);
        echo "<br>";

        print "Name of the second person: " . $name2;
        echo "<br>";
        if (check_dob($dob2) == false) {
            print "DOB of the second person is invalid!!<br>";
        } else display_dob($dob2);
        echo "<br>";

        if (check_dob($dob1) && check_dob($dob2)) {
            display_dob_diff($dob1, $dob2, 1);
            $age1 = cal_age($dob1);
            $age2 = cal_age($dob2);
            print $name1 . " is " . $age1 . " years old.<br>";
            print $name2 . " is " . $age2 . " years old.<br>";
            display_dob_diff($dob1, $dob2, 2);
        }
    ?>
    </body>
</html>