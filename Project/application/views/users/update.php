
<form action="../users/update" method="post">
    <table>
        <tr>
            <td colspan="2">Update form</td>
        </tr>
        <tr>
            <td>Username :</td>
            <td><input required type="text" id="username" name="username" value="<?php echo $currentUser['username'] ?>"></td>
        </tr>
        <tr>
            <td>Password :</td>
            <td><input required type="password" id="password" name="password"></td>
        </tr>
        <tr>
            <td>Full name :</td>
            <td><input required type="text" id="name" name="name" value="<?php echo $currentUser['name'] ?>"></td>
        </tr>
        <tr>
            <td>Email :</td>
            <td><input required type="email" id="email" name="email" value="<?php echo $currentUser['email'] ?>"></td>
        </tr>
        <tr>
            <td>Address :</td>
            <td><input required type="text" id="address" name="address" value="<?php echo $currentUser['address'] ?>"></td>
        </tr>
        <tr>
            <td>Phone :</td>
            <td><input required type="tel" id="phone" name="phone" value="<?php echo $currentUser['phone'] ?>"></td>
        </tr>

        <tr>
            <td colspan="2" align="center"><input type="submit" name="submit" value="Save changes"></td>
        </tr>

    </table>

</form>
<button><a href="<?php echo BASE_PATH?>/users/logout">Log out</a></button>