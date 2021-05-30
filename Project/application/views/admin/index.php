<form action=<?php echo BASE_PATH . '/admin/users' ?>>
    <input type="submit" value="User Management"/>
</form>

<script type="text/javascript">
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
    
    function processAction(value) {
        // call ajax
        httpObject = getHTTPObject();
        let obj;
        if (value && httpObject != null) {
            let url = "<?php echo BASE_PATH . "/admin/processAction/" ?>" + value;
            httpObject.onreadystatechange = () => {
                if (httpObject.readyState === 4 && httpObject.status === 200) {
                    // obj = httpObject.responseText;
                    obj = JSON.parse(httpObject.responseText);
                    console.log(obj);
                    
                    //TODO: create view table
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
        <select name="action" onchange="processAction(this.value)">
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

</div>
<br>