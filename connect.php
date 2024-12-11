<?php

$server = '127.0.0.1';
$user = 'root';
$pass = '';
$database = 'QLSV_TruongDucVietHoang';

$conn = new mysqLi($server, $user, $pass, $database);

if ($conn) {
    mysqLi_query($conn, "SET NAMES 'utf8'");
    echo ' ';
} else {
    echo 'Kết nối thất bại';
}

?>