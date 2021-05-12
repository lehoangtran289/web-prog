<?php
    include './common/connection.php';
    include './BizCatComposite.php';
    include './Category.php';
    
    if (isset($_GET['inputText'])) {
        $input = $_GET['inputText'];
        $categories = array();
        $sql = "SELECT * FROM Category WHERE title LIKE '%" . $input . "%' LIMIT 1";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row["title"];
        } else {
            echo $input;
        }
    }
