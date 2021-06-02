<script type="text/javascript">
    let validateForm = () => {
        let method = document.getElementsByName("method")[0].value;
        let description = document.getElementsByName("description")[0].value;

        if (!method || !description) {
            alert("Some fields are missing. Please fill out all blank!");
            return false;
        }
        return true;
    }
</script>

<br>
<h2>Add new user</h2><br>
<form name="addPaymentForm" action="<?php echo BASE_PATH . '/admin/payments/add' ?>" method="post" onsubmit="return validateForm()">
    <table>
        <tr>
            <td>Method</td>
            <td><input type="text" name="method"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="description"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>
