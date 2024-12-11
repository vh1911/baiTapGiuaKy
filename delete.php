<?php
include 'connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM table_Students WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Xóa thành công!";
} else {
    echo "Lỗi: " . $conn->error;
}
$conn->close();
header("Location: index.php");
?>
