<?php include 'connect.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM table_Students WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin sinh viên</title>
</head>
<body>
    <h2>Sửa thông tin sinh viên</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Họ và tên:</label>
        <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required><br>
        <label>Ngày sinh:</label>
        <input type="date" name="dob" value="<?php echo $row['dob']; ?>" required><br>
        <label>Giới tính:</label>
        <input type="radio" name="gender" value="1" <?php if ($row['gender'] == 1) echo 'checked'; ?>> Nam
        <input type="radio" name="gender" value="0" <?php if ($row['gender'] == 0) echo 'checked'; ?>> Nữ<br>
        <label>Quê quán:</label>
        <input type="text" name="hometown" value="<?php echo $row['hometown']; ?>"><br>
        <label>Trình độ:</label>
        <select name="level" required>
            <option value="0" <?php if ($row['level'] == 0) echo 'selected'; ?>>Tiến sĩ</option>
            <option value="1" <?php if ($row['level'] == 1) echo 'selected'; ?>>Thạc sĩ</option>
            <option value="2" <?php if ($row['level'] == 2) echo 'selected'; ?>>Kỹ sư</option>
            <option value="3" <?php if ($row['level'] == 3) echo 'selected'; ?>>Khác</option>
        </select><br>
        <label>Nhóm:</label>
        <input type="number" name="group" value="<?php echo $row['group']; ?>" required><br>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>
