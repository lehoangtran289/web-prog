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

<br>
<button><a href="<?php echo BASE_PATH?>/admin">Back to admin page</a></button>
<h2>Edit shipment <?php echo $shipment['Shipment']['method'] ?></h2>
<form action="<?php echo BASE_PATH . '/admin/shipments/update/' . $shipment['Shipment']['id'] ?>" method="post" onsubmit="return validateForm()">
    <table>
        <tr>
            <td>Method</td>
            <td><input type="text" name="method" value="<?php echo $shipment['Shipment']['method']?>"></td>
        </tr>
        <tr>
            <td>Fee</td>
            <td><input type="number" name="fee" value="<?php echo $shipment['Shipment']['fee']?>"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="description" value="<?php echo $shipment['Shipment']['description']?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>
