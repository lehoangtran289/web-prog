<script type="text/javascript">
    let validateForm = () => {
        let username = document.getElementsByName('username')[0].value;
        let name = document.getElementsByName("name")[0].value;
        let email = document.getElementsByName("email")[0].value;
        let address = document.getElementsByName("address")[0].value;
        let phone = document.getElementsByName("phone")[0].value;
        
        if (!username || !name || !email || !address || !phone) {
            alert("Some fields are missing. Please fill out all blank!");
            return false;
        }
    }
</script>

<form action="<?php echo BASE_PATH . '/admin/users/update/' . $user['User']['id'] ?>" method="post" onsubmit="return validateForm()">
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
