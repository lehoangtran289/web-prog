<script type="text/javascript">
    let validateForm = () => {
        let username = document.getElementsByName("username")[0].value;
        let password = document.getElementsByName("password")[0].value;
        let repassword = document.getElementsByName("repassword")[0].value;
        let name = document.getElementsByName("name")[0].value;
        let email = document.getElementsByName("email")[0].value;
        let address = document.getElementsByName("address")[0].value;
        let phone = document.getElementsByName("phone")[0].value;
        
        if (!username || !password || !repassword || !name || !email || !address || !phone) {
            alert("Some fields are missing. Please fill out all blank!");
            return false;
        }
        if (password !== repassword) {
            alert("Repassword incorrect");
            return false;
        }
        return true;
    }
</script>

<h2>Add new user</h2>
<form name="addUserForm" action="<?php echo BASE_PATH . '/admin/users/add' ?>" method="post" onsubmit="return validateForm();">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>Re-Password</td>
            <td><input type="password" name="repassword"></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Role</td>
            <td><input type="text" name="role" value="user" readonly></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td>Phone</td>
            <td><input type="text" name="phone"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>
