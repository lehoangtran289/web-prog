<script type="text/javascript">
    let config = {
        users: ['username', 'name', 'role', 'email', 'address', 'phone', 'created_at', 'updated_at'],
        products: ['name', 'quantity', 'brand', 'OS', 'chipset', 'ram', 'display', 'resolution', 'camera', 'memory', 'pin', 'description', 'price', 'created_at', 'updated_at'],
        categories: ['brand', 'created_at', 'updated_at'],
        shipments: ['method', 'fee', 'description', 'created_at', 'updated_at'],
        payments: ['method', 'description', 'created_at', 'updated_at']
    };
    
    /**
     * Get the HTTP Object
     */
    function getHTTPObject() {
        if (window.ActiveXObject) {
            return new ActiveXObject("Microsoft.XMLHTTP");
        } else if (window.XMLHttpRequest) {
            return new XMLHttpRequest();
        } else {
            alert("Your browser does not support AJAX.");
            return null;
        }
    }
    
    /**
     * build html table based on selected "value"
     */
    function getHtmlTable(value, obj) {
        let result = '';
        if (value === 'users') {
            result += "<form style=\"margin-left:30px\" action=\"<?php echo BASE_PATH . '/admin/users/add' ?>\"><input type=\"submit\" value=\"Add new User\"></input> </form>";
            result += "<br><table class='index-table' border='1' style='width:100%'>";
            result += "<tr><th>Username</th> <th>Name</th> <th>Role</th> <th>Email</th> <th>Address</th> <th>Phone</th> <th>CreateAt</th> <th>UpdateAt</th> <th>Action</th></tr>";
            // table content
            obj.forEach(o => {
                result += "<tr>";
                for (let cf in config[value]) {
                    let field = config[value][cf];
                    result += o[field] ? "<td>" + o[field] + "</td>" : "<td></td>";
                }
                result += "<td>";
                let updateUrl = "<?php echo BASE_PATH . "/admin/users/update/"?>" + o.id;
                let deleteUrl = "<?php echo BASE_PATH . "/admin/users/delete/"?>" + o.id;
                result += "<a href=" + updateUrl + ">" + "<span class=\"material-icons md-24 md-blue\">edit</span>" + "</a>" +
                        "<a href=" + deleteUrl + " onclick=\"return confirm('Are you sure?')\">" + "<span class=\"material-icons md-24 md-red\">delete_forever</span>" + "</a>";
                result += "</td>";
                result += "</tr>";
            })
        } else if (value === 'products') {
            result += "<form style=\"margin-left:30px\" action=\"<?php echo BASE_PATH . '/admin/products/add' ?>\"><input type=\"submit\" value=\"Add new Product\"/> </form>";
            result += "<br><table class='index-table' border='1' style='width:100%'>";
            result += "<tr><th>Name</th><th>Quantity</th><th>Category</th><th>OS</th><th>Chipset</th><th>Ram</th><th>Display</th><th>Resolution</th><th>Camera</th><th>Memory</th><th>Pin</th><th>Description</th><th>Price</th><th>CreateAt</th> <th>UpdateAt</th><th>Image</th> <th>Action</th></tr>";
            // table content
            obj.forEach(o => {
                result += "<tr>";
                for (let cf in config[value]) {
                    let field = config[value][cf];
                    if (o[field]) {
                        if (field === 'description') {
                            result += "<td><div class='div-description'>" + o[field] + "</div></td>"
                        } else result += "<td>" + o[field] + "</td>";
                    } else result += "<td></td>";
                }
                // image
                let image_path = "<?php echo BASE_PATH . '/public/images/'?>" + o['image'];
                result += o['image'] ? "<td><img src='" + image_path + "'></td>" : "<td></td>";

                // action
                result += "<td>";
                let updateUrl = "<?php echo BASE_PATH . "/admin/products/update/"?>" + o.id;
                let deleteUrl = "<?php echo BASE_PATH . "/admin/products/delete/"?>" + o.id;
                result += "<a href=" + updateUrl + ">" + "<span class=\"material-icons md-24 md-blue\">edit</span>" + "</a>" +
                        "<a href=" + deleteUrl + " onclick=\"return confirm('Are you sure?')\">" + "<span class=\"material-icons md-24 md-red\">delete_forever</span>" + "</a>";
                result += "</td>";
                result += "</tr>";
            })
        } else if (value === 'categories') {
            result += "<form style=\"margin-left:30px\" action=\"<?php echo BASE_PATH . '/admin/categories/add' ?>\"><input type=\"submit\" value=\"Add new Category\"/> </form>";
            result += "<br><table class='index-table' border='1' style='width:100%'>";
            result += "<tr><th>Brand name</th> <th>CreateAt</th> <th>UpdateAt</th> <th>Action</th></tr>";
            // table content
            obj.forEach(o => {
                result += "<tr>";
                for (let cf in config[value]) {
                    let field = config[value][cf];
                    result += o[field] ? "<td>" + o[field] + "</td>" : "<td></td>";
                }
                result += "<td>";
                let updateUrl = "<?php echo BASE_PATH . "/admin/categories/update/"?>" + o.id;
                let deleteUrl = "<?php echo BASE_PATH . "/admin/categories/delete/"?>" + o.id;
                result += "<a href=" + updateUrl + ">" + "<span class=\"material-icons md-24 md-blue\">edit</span>" + "</a>" +
                        "<a href=" + deleteUrl + " onclick=\"return confirm('Are you sure?')\">" + "<span class=\"material-icons md-24 md-red\">delete_forever</span>" + "</a>";
                result += "</td>";
                result += "</tr>";
            })
        } else if (value === 'shipments') {
            result += "<form style=\"margin-left:30px\" action=\"<?php echo BASE_PATH . '/admin/shipments/add' ?>\"><input type=\"submit\" value=\"Add new Shipment method\"/> </form>";
            result += "<br><table class='index-table' border='1' style='width:100%'>";
            result += "<tr><th>Method name</th> <th>Fee</th> <th>Description</th> <th>CreateAt</th> <th>UpdateAt</th> <th>Action</th></tr>";
            // table content
            obj.forEach(o => {
                result += "<tr>";
                for (let cf in config[value]) {
                    let field = config[value][cf];
                    if (o[field]) {
                        if (field === 'description') {
                            result += "<td><div class='div-description'>" + o[field] + "</div></td>"
                        } else result += "<td>" + o[field] + "</td>";
                    } else result += "<td></td>";
                }
                result += "<td>";
                let updateUrl = "<?php echo BASE_PATH . "/admin/shipments/update/"?>" + o.id;
                let deleteUrl = "<?php echo BASE_PATH . "/admin/shipments/delete/"?>" + o.id;
                result += "<a href=" + updateUrl + ">" + "<span class=\"material-icons md-24 md-blue\">edit</span>" + "</a>" +
                        "<a href=" + deleteUrl + " onclick=\"return confirm('Are you sure?')\">" + "<span class=\"material-icons md-24 md-red\">delete_forever</span>" + "</a>";
                result += "</td>";
                result += "</tr>";
            })
        } else if (value === 'payments') {
            result += "<form style=\"margin-left:30px\" action=\"<?php echo BASE_PATH . '/admin/payments/add' ?>\"><input type=\"submit\" value=\"Add new Payment method\"/> </form>";
            result += "<br><table class='index-table' border='1' style='width:100%'>";
            result += "<tr><th>Method name</th> <th>Description</th> <th>CreateAt</th> <th>UpdateAt</th> <th>Action</th></tr>";
            // table content
            obj.forEach(o => {
                result += "<tr>";
                for (let cf in config[value]) {
                    let field = config[value][cf];
                    if (o[field]) {
                        if (field === 'description') {
                            result += "<td><div class='div-description'>" + o[field] + "</div></td>"
                        } else result += "<td>" + o[field] + "</td>";
                    } else result += "<td></td>";
                }
                result += "<td class='td-action'>";
                let updateUrl = "<?php echo BASE_PATH . "/admin/payments/update/"?>" + o.id;
                let deleteUrl = "<?php echo BASE_PATH . "/admin/payments/delete/"?>" + o.id;
                result += "<a href=" + updateUrl + ">" + "<span class=\"material-icons md-24 md-blue\">edit</span>" + "</a>" +
                        "<a href=" + deleteUrl + " onclick=\"return confirm('Are you sure?')\">" + "<span class=\"material-icons md-24 md-red\">delete_forever</span>" + "</a>";
                result += "</td>";
                result += "</tr>";
            })
        } else {
            return;
        }
        result += "</table>"
        return result;
    }
    
    /**
     * AJAX Call to get data
     */
    function processAction(value) {
        // call ajax
        let httpObject = getHTTPObject();
        let obj, result = '';
        if (value && httpObject != null) {
            let url = "<?php echo BASE_PATH . "/admin/processAction/" ?>" + value;
            httpObject.onreadystatechange = () => {
                if (httpObject.readyState === 4 && httpObject.status === 200) {
                    obj = httpObject.responseText; // debug purpose
                    console.log(obj);
                    obj = JSON.parse(httpObject.responseText);
                    
                    // create view table
                    result = getHtmlTable(value, obj);
                    document.getElementById("table").innerHTML = result;
                }
            }
            httpObject.open("GET", url, true);
            httpObject.send(null);
        }
    }
</script>

<form>
    <label style="margin-left: 30px">Choose an action</label>
    <label>
        <select name="action" onclick="processAction(this.value)">
            <option disabled selected value> -- select an option --</option>
            <option value="users">User management</option>
            <option value="products">Product management</option>
            <option value="categories">Category management</option>
            <option value="shipments">Shipment management</option>
            <option value="payments">Payment management</option>
        </select>
    </label>
</form>
<br>
<div id="table">
    <!-- TO APPEND ELEMENTS FROM AJAX -->
</div>
