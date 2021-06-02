<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        
        <form action="../users/login" method="POST">
            <fieldset>
                <legend>Login</legend>
                <table>
                    <tr>
                        <td>Username</td>
                        <td><input required type="text" name="username" size="30"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input required type="password" name="password" size="30"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" name="submit" value="Login"></td>
                    </tr>
                
                </table>
            </fieldset>
            <div><a href="../users/register">You dont have an account? Create one!</a></div>
        </form>
    </body>
</html>