<script type="text/javascript">
    let config = {
        users: ['username', 'name', 'role', 'email', 'address', 'phone', 'created_at', 'updated_at'],
        products: [],
        categories: [],
        shipment: [],
        payments: []
    };

    // Get the HTTP Object
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
    
    function getHtmlTable(value, obj) {
        let res = '';
        res += "<form action=\"<?php echo BASE_PATH . '/admin/users/add' ?>\"><input type=\"submit\" value=\"Add new User\"/> </form>";
        res += "<table border='1' style='width:100%'>";
        if (value === 'users') {
            // table header
            res += "<tr><th>Username</th> <th>Name</th> <th>Role</th> <th>Email</th> <th>Address</th> <th>Phone</th> <th>CreateAt</th> <th>UpdateAt</th> <th>Action</th></tr>";
            // table content
            obj.forEach(o => {
                res += "<tr>";
                for (let cf in config[value]) {
                    let field = config[value][cf];
                    res += o[field] ? "<td>" + o[field] + "</td>" : "<td></td>";
                }
                res += "<td>";
                let updateUrl = "<?php echo BASE_PATH . "/admin/users/update/"?>" + o.id;
                let deleteUrl = "<?php echo BASE_PATH . "/admin/users/delete/"?>" + o.id;
                res += "<a href=" + updateUrl + ">Update</a> " +
                        "<a href=" + deleteUrl + " onclick=\"return confirm('Are you sure?')\">Delete</a>";
                res += "</td>";
                res += "</tr>";
            })
        } else if (value === 'products') {
        
        } else if (value === 'categories') {
    
        } else if (value === 'shipments') {
    
        } else if (value === 'payments') {
    
        } else {
            return;
        }
        res += "</table>"
        return res;
    }
    
    function processAction(value) {
        // call ajax
        httpObject = getHTTPObject();
        let obj, res = '';
        if (value && httpObject != null) {
            let url = "<?php echo BASE_PATH . "/admin/processAction/" ?>" + value;
            httpObject.onreadystatechange = () => {
                if (httpObject.readyState === 4 && httpObject.status === 200) {
                    // obj = httpObject.responseText; // debug purpose
                    obj = JSON.parse(httpObject.responseText);
                    
                    // create view table
                    res = getHtmlTable(value, obj);
                    document.getElementById("table").innerHTML = res;
                }
            }
            httpObject.open("GET", url, true);
            httpObject.send(null);
        }
    }
</script>

<form>
    <label>Choose an action</label>
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
<br>