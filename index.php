<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="decor.css">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <h2>Danh sách sinh viên</h2>
    
    <!-- Form tìm kiếm -->
    <form method="GET" action="index.php">
        <input type="text" name="search" placeholder="Tìm kiếm theo tên hoặc quê quán" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" />
        <button type="submit">Tìm kiếm</button>
    </form>

    <a href="add.php">Thêm sinh viên</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Giới tính</th>
                <th>Quê quán</th>
                <th>Trình độ</th>
                <th>Nhóm</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Xử lý tìm kiếm
            $search = isset($_GET['search']) ? $_GET['search'] : ''; // Lấy giá trị từ form tìm kiếm

            // Cập nhật câu lệnh SQL để tìm kiếm theo tên hoặc quê quán
            $sql = "SELECT * FROM table_Students WHERE fullname LIKE ? OR hometown LIKE ?";
            $stmt = $conn->prepare($sql);
            $searchTerm = "%" . $search . "%"; // Thêm ký tự % để tìm kiếm chuỗi con
            $stmt->bind_param("ss", $searchTerm, $searchTerm);
            $stmt->execute();
            $result = $stmt->get_result();

            // Hiển thị dữ liệu
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['fullname']}</td>
                        <td>{$row['dob']}</td>
                        <td>" . ($row['gender'] == 1 ? 'Nam' : 'Nữ') . "</td>
                        <td>{$row['hometown']}</td>
                        <td>" . (
                            $row['level'] == 0 ? 'Tiến sĩ' :
                            ($row['level'] == 1 ? 'Thạc sĩ' :
                            ($row['level'] == 2 ? 'Kỹ sư' : 'Khác'))
                        ) . "</td>
                        <td>Nhóm {$row['group']}</td>
                        <td>
                            <a href='edit.php?id={$row['id']}'>Sửa</a>
                            <a href='delete.php?id={$row['id']}'>Xóa</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
