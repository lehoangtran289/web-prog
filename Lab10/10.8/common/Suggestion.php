<?php
    include './common/connection.php';
    include './model/BizCatComposite.php';
    include './model/Category.php';
    
    if (isset($_GET['inputText'])) {
        $input = $_GET['inputText'];
        $categories = array();
        $sql = "SELECT * FROM Category WHERE title LIKE '%" . $input . "%'";
        $result = $conn->query($sql);
        
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[] = array('title' => $row["title"]);
            }
            echo json_encode($categories);
        }
    }
