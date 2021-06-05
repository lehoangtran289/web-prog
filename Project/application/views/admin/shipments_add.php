<script type="text/javascript">
    let validateForm = () => {
        let method = document.getElementsByName("method")[0].value;
        let fee = document.getElementsByName("fee")[0].value;
        let description = document.getElementsByName("description")[0].value;
        
        if (!method || !fee || !description) {
            alert("Some fields are missing. Please fill out all blank!");
            return false;
        }
        return true;
    }
</script>

<section>
    <div class="content-box">
        <div class="form-box">
            <br>
            <h2>Add new user</h2><br>
            <form name="addShipmentForm" action="<?php echo BASE_PATH . '/admin/shipments/add' ?>" method="post"
                  onsubmit="return validateForm()">
                <table>
                    <tr class="input-box">
                        <td>Method</td>
                        <td><input type="text" name="method"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Fee</td>
                        <td><input type="number" name="fee"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Description</td>
                        <td><input type="text" name="description"></td>
                    </tr>
                    <tr class="input-box">
                        <td><input type="submit" name="submit" value="Submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>