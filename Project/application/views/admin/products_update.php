<script type="text/javascript">
    let validateForm = () => {
        let name = document.getElementsByName("username")[0].value;
        let quantity = document.getElementsByName("quantity")[0].value;
        let category = document.getElementsByName("category")[0].value;
        let OS = document.getElementsByName("OS")[0].value;
        let chipset = document.getElementsByName("chipset")[0].value;
        let ram = document.getElementsByName("ram")[0].value;
        let display = document.getElementsByName("display")[0].value;
        let resolution = document.getElementsByName("resolution")[0].value;
        let camera = document.getElementsByName("camera")[0].value;
        let memory = document.getElementsByName("memory")[0].value;
        let pin = document.getElementsByName("pin")[0].value;
        let image = document.getElementsByName("image")[0].value;
        let description = document.getElementsByName("description")[0].value;
        let price = document.getElementsByName("price")[0].value;
        
        if (!name || !quantity || !price || !category) {
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
            <h2>Edit product <?php echo $product['Product']['name'] ?></h2>
            <form action="<?php echo BASE_PATH . '/admin/products/update/' . $product['Product']['id'] ?>" method="post"
                  onsubmit="return validateForm()" enctype="multipart/form-data">
                <table>
                    <tr class="input-box">
                        <td>Product name</td>
                        <td><input type="text" name="name" value="<?php echo $product['Product']['name'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Quantity</td>
                        <td><input type="number" name="quantity" value="<?php echo $product['Product']['name'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Category</td>
                        <td>
                            <select name="category">
                                <?php
                                    foreach ($categories as $c) {
                                        if ($c['Category']['id'] == $product['Product']['category_id']) {
                                            echo "<option selected='selected' value=" . $c['Category']['id'] . ">";
                                        } else {
                                            echo "<option value=" . $c['Category']['id'] . ">";
                                        }
                                        echo $c['Category']['brand'];
                                        echo "</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr class="input-box">
                        <td>OS</td>
                        <td><input type="text" name="OS" value="<?php echo $product['Product']['OS'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Chipset</td>
                        <td><input type="text" name="chipset" value="<?php echo $product['Product']['chipset'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Ram</td>
                        <td><input type="text" name="ram" value="<?php echo $product['Product']['ram'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Display</td>
                        <td><input type="text" name="display" value="<?php echo $product['Product']['display'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Resolution</td>
                        <td><input type="text" name="resolution"
                                   value="<?php echo $product['Product']['resolution'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Camera</td>
                        <td><input type="text" name="camera" value="<?php echo $product['Product']['camera'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Memory</td>
                        <td><input type="text" name="memory" value="<?php echo $product['Product']['memory'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Pin</td>
                        <td><input type="text" name="pin" value="<?php echo $product['Product']['pin'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Image</td>
                        <td><input type="file" name="image[]" multiple="multiple" accept=".png, .jpg, .jpeg"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Description</td>
                        <td><input type="text" name="description"
                                   value="<?php echo $product['Product']['description'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td>Price</td>
                        <td><input type="number" name="price" value="<?php echo $product['Product']['price'] ?>"></td>
                    </tr>
                    <tr class="input-box">
                        <td><input type="submit" name="submit" value="Submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="image-box">
        <?php echo "<img src=" . BASE_PATH . '/public/images/' . $product['Product']['image'] . "_0.jpg" . ">"; ?>
    </div>
</section>