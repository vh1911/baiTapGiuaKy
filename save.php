<?php
include 'connect.php';

$fullname = $_POST['fullname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$hometown = $_POST['hometown'];
$level = $_POST['level'];
$group = $_POST['group'];

$sql = "INSERT INTO table_Students (fullname, dob, gender, hometown, level, `group`)
        VALUES ('$fullname', '$dob', '$gender', '$hometown', '$level', '$group')";

if ($conn->query($sql) === TRUE) {
    echo "Thêm sinh viên thành công!";
} else {
    echo "Lỗi: " . $conn->error;
}
$conn->close();
header("Location: index.php");
?>
