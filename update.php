<?php
include 'connect.php';

$id = $_POST['id'];
$fullname = $_POST['fullname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$hometown = $_POST['hometown'];
$level = $_POST['level'];
$group = $_POST['group'];

$sql = "UPDATE table_Students SET fullname='$fullname', dob='$dob', gender='$gender', 
        hometown='$hometown', level='$level', `group`='$group' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Cập nhật thông tin thành công!";
} else {
    echo "Lỗi: " . $conn->error;
}
$conn->close();
header("Location: index.php");
?>
