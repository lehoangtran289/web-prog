<html>
    <head><title>Date Time processing</title></head>
    <body>
        Enter your name and select date and time for the appointment
        <br>
        <br>
        <form action="" method="POST">
            <table>
                <tr>Your name: <input type="text" name="name"></tr>
                <tr>

                    <td>Date:</td>
                    <td><select name="day">
                        <?php 
                        for($i=1;$i<31;$i++)
                        print("<option> $i </option>"); ?>
                    </select></td>
                    
                    <td><select name="month">
                        <?php 
                        for($i=1;$i<13;$i++)
                        print("<option> $i </option>"); ?>
                    </select></td>

                    <td><select name="year">
                        <?php 
                        for($i=2021;$i<2050;$i++)
                        print("<option> $i </option>"); ?>
                    </select></td>

                </tr>

                <tr>
                    <td>Time:</td>

                    <td><select name="hour">
                        <?php 
                        for($i=0;$i<24;$i++)
                        print("<option> $i </option>"); ?>
                    </select></td>

                    <td><select name="minute">
                        <?php 
                        for($i=0;$i<60;$i++)
                        print("<option> $i </option>"); ?>
                    </select></td>

                    <td><select name="second">
                        <?php 
                        for($i=0;$i<60;$i++)
                        print("<option> $i </option>"); ?>
                    </select></td>

                </tr>

                <tr>
                    <td><input type="submit" value="Submit"></td>
                    <td><input type="reset" value="Reset"></td>
                </tr>

            </table>    
    </form>

    <?php 
    $name = $_POST['name'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $hour = $_POST['hour'];
    if($hour >= 12)
        $another_hour = $hour - 12;
    else $another_hour = $hour;
    $minute = $_POST['minute'];
    $second = $_POST['second'];
    $numOfDays = 0;
    switch($month){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            $numOfDays = 31;
        case 4:
        case 6:
        case 9:
        case 11:
            $numOfDays = 30;
        case 2:
            if($year%4==0)
                if($year%100==0 && $year%400!=0)
                    $numOfDays = 28;
                else $numOfDays = 29;
            else $numOfDays = 28;    
            
    }
    print("Hi $name!<br>");
    print("You have choose to have an appointment on $hour:$minute:$second, $day/$month/$year <br>");
    print("More information<br>");
    print("In 12 hours, the time and date is $another_hour:$minute:$second, $day/$month/$year <br>");
    print("This month has $numOfDays days!");
    ?>
    </body>
</html>