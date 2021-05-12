<?php
    include './common/connection.php';
    include './BizCatComposite.php';
    include './Category.php';
    
    function getData($conn, $categoryTitles) {
        if (count($categoryTitles) > 1) {
            $sql = "SELECT *
                        FROM business b, biz_category bc, category c
                        WHERE b.business_ID = bc.business_ID AND c.category_ID = bc. category_ID
                        AND c.title IN (" . "'" . implode("', '", $categoryTitles) . "'" . ")
                 ";
        } else {
            $sql = "SELECT *
                        FROM business b, biz_category bc, category c
                        WHERE b.business_ID = bc.business_ID AND c.category_ID = bc. category_ID
                        AND c.title = " . "'" . $categoryTitles . "'";
        }
        
        $result = $conn->query($sql);
        
        $bizcats = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bizcats[] = new BizCatComposite(
                        $row["business_ID"],
                        $row["name"],
                        $row["address"],
                        $row["city"],
                        $row["telephone"],
                        $row["URL"],
                        $row["category_ID"]
                );
            }
        } else {
            echo "0 results";
        }
        return $bizcats;
    }
    
    function displayData($bizcats) {
        echo "<br>";
        echo "<table>";
        foreach ($bizcats as $b) {
            echo "<tr><td>" . $b->getId() . "</td>
            <td>" . $b->getName() . "</td>
            <td>" . $b->getAddress() . " </td>
            <td>" . $b->getCity() . " </td>
            <td>" . $b->getTelephone() . " </td>
            <td>" . $b->getUrl() . " </td>
            <td>" . $b->getCategoryID() . " </td></tr>";
        }
        echo "</table>";
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Business Listing</title>
        <style>
            /*form, table {*/
            /*    float: left;*/
            /*}*/
            
            table, th, td {
                border: 1px solid black;
            }
            
            #inputText {
                width: 30%;
            }
            
            a {
                text-decoration: none;
            }
            
            table {
                border: 1px solid black;
            }
            
            table th {
                padding: 10px;
                background: #eee;
                border-left: 1px solid #ccc;
                border-top: 1px solid #ccc;
            }
            
            table td {
                padding: 10px;
                border-left: 1px solid #ccc;
                border-top: 1px solid #ccc;
            }
        </style>
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
            
            function doWork() {
                httpObject = getHTTPObject();
                let input = document.getElementById('inputText').value;
                if (input && httpObject != null) {
                    httpObject.open("GET", "Suggestion.php?inputText=" + input, true);
                    httpObject.send(null);
                    httpObject.onreadystatechange = setOutput;
                    console.log(httpObject.responseText)
                }
            }
            
            function setOutput() {
                if (httpObject.readyState === 4) {
                    document.getElementById('inputText').value = httpObject.responseText;
                }
            }
        </script>
    </head>
    <body>
        <h1>Search a business</h1>
        <form name="searchForm" action="Business.php" method="get">
            <input type="text" onkeyup="doWork()" name="inputText" id="inputText" placeholder="Search a business"/>
            <input type="submit" value="Search">
            <input type="reset" value="Reset">
        </form>
        <?php
            if(isset($_GET["inputText"])) {
                $categoryTitles = $_GET["inputText"];
                $bizcats = getData($conn, $categoryTitles);
                displayData($bizcats);
            }
        ?>
    </body>
</html>