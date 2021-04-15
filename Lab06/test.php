<?php
include 'connection.php';
$query = "SELECT * FROM category";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_array($result))
    {
        echo $row['category_ID'].' '.$row['title'];
    }
}
?>

