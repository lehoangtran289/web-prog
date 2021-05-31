<script type="text/javascript">
    let validateForm = () => {
        let brand = document.getElementsByName('brand')[0].value;

        if (!brand) {
            alert("Some fields are missing. Please fill out all blank!");
            return false;
        }
    }
</script>

<br>
<button><a href="<?php echo BASE_PATH?>/admin">Back to admin page</a></button>
<h2>Edit category <?php echo $category['Category']['brand'] ?></h2>
<form action="<?php echo BASE_PATH . '/admin/categories/update/' . $category['Category']['id'] ?>" method="post" onsubmit="return validateForm()">
    <table>
        <tr>
            <td>Brand name</td>
            <td><input type="text" name="brand" value="<?php echo $category['Category']['brand']?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>
