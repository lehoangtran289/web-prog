<form action="<?php echo BASE_PATH . '/admin/users/update/' . $user['User']['id'] ?>" method="post">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" value="<?php echo $user['User']['username']?>"></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $user['User']['name']?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $user['User']['email']?>"></td>
        </tr>
        <tr>
            <td>Role</td>
            <td><input type="text" name="role" value="<?php echo $user['User']['role']?>" readonly></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $user['User']['address']?>"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone" value="<?php echo $user['User']['phone']?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>
<br>
<button><a href="<?php echo BASE_PATH?>/users/logout">Log out</a></button>
