<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
</head>
<body>
    <h2>Thêm sinh viên</h2>
    <form action="save.php" method="post">
        <label>Họ và tên:</label>
        <input type="text" name="fullname" required><br>
        <label>Ngày sinh:</label>
        <input type="date" name="dob" required><br>
        <label>Giới tính:</label>
        <input type="radio" name="gender" value="1" required> Nam
        <input type="radio" name="gender" value="0" required> Nữ<br>
        <label>Quê quán:</label>
        <input type="text" name="hometown"><br>
        <label>Trình độ:</label>
        <select name="level" required>
            <option value="0">Tiến sĩ</option>
            <option value="1">Thạc sĩ</option>
            <option value="2">Kỹ sư</option>
            <option value="3">Khác</option>
        </select><br>
        <label>Nhóm:</label>
        <input type="number" name="group" required><br>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
