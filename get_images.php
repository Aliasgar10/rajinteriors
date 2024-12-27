<?php
include 'connection/db_connect.php';
$sql = "SELECT file_name FROM uploads WHERE category_id=28";
$result = $conn->query($sql);

$images = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = $row;
    }
}
echo json_encode($images);
?>
