<html>

<head>
    <title> Order Product 2 </title>
</head>

<body>
    <?php
    $username = $_POST["username"];
    $password =  $_POST["password"];

    // connect to DB
    $server = "localhost";
    $user = "dangvh";
    $dbpassword = "1";
    $dbname = "test";

    $connection = new mysqli($server, $user, $dbpassword, $dbname) or die('DB connection failed');

    $sql_query = "SELECT password, name FROM Users where Username = '$username'";
    $retrieved_password = $connection->query($sql_query);
    if (!$retrieved_password) {
        die("Cannot retrieve password");
    } else {
        if ($result = mysqli_fetch_array($retrieved_password)) {
            if ($result["password"] == $password) {
                echo 'Wrong password! Redirecting to the login page';
                session_start();
                $_SESSION['name'] = $result["name"];
                header("Location: prefs-demo.php");
            } else {
                echo "Wrong password!";
                header("Location: login.php");
            }
        } else {
            echo 'Username doesn\'t exist! Redirecting to the login page';
            header("Location: login.php");
        }
    }
    ?>
</body>

</html>