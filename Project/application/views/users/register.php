<html>
    <head>
        <title>A sample form</title>
    </head>
    <body>
        
        <form action="../users/register" method="post">
            <table>
                <tr>
                    <td colspan="2">Register form</td>
                </tr>
                <tr>
                    <td>Username :</td>
                    <td><input required type="text" id="username" name="username"></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input required type="password" id="password" name="password"></td>
                </tr>
                <tr>
                    <td>Full name :</td>
                    <td><input required type="text" id="name" name="name"></td>
                </tr>
                <tr>
                    <td>Email :</td>
                    <td><input required type="email" id="email" name="email"></td>
                </tr>
                <tr>
                    <td>Address :</td>
                    <td><input required type="text" id="address" name="address"></td>
                </tr>
                <tr>
                    <td>Phone :</td>
                    <td><input required type="tel" id="phone" name="phone"></td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Register"></td>
                </tr>
            
            </table>
        
        </form>
    </body>
</html>