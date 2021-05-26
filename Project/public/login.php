<?php
session_start();
echo 'This is just a demo page and have no function';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php
include 'lib/connection.php';
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['pass'];

    // counter sql injection

    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    if($username == '' || $password == ''){
        echo 'Please fill in all blank!';
    }
    else{
        $sql = "select * from user where username = '$username' and password = '$password' ";
        $result = mysqli_query($conn,$sql);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows==0) {
            echo "username or password incorrect !";
        }else{
            //save username to session
            $_SESSION['username'] = $username;
            // redirect index.php
            header('Location: index.php');
        }
    }
}
?>
<form action="login.php" method="POST" >
    <fieldset>
        <legend>Login</legend>
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" size="30"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass" size="30"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"> <input type="submit" name="submit" value="Login"></td>
            </tr>

        </table>
    </fieldset>
    <div><a href="register.php">You dont have an account? Create one!</a></div>
</form>
</body>
</html>