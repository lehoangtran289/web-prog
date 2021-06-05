<script type="text/javascript">
    let validateForm = () => {
        let brand = document.getElementsByName('brand')[0].value;
        
        if (!brand) {
            alert("Some fields are missing. Please fill out all blank!");
            return false;
        }
    }
</script>

<section>
    <div class="content-box">
        <div class="form-box">
            <br>
            <h2>Edit category <?php echo $category['Category']['brand'] ?></h2>
            <form action="<?php echo BASE_PATH . '/admin/categories/update/' . $category['Category']['id'] ?>"
                  method="post" onsubmit="return validateForm()">
                <table>
                    <tr class="input-box">
                        <td>Brand name</td>
                        <td><input type="text" name="brand" value="<?php echo $category['Category']['brand'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td><input type="submit" name="submit" value="Submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>