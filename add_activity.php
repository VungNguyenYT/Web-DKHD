<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $max_slots = $_POST["max_slots"];

    $sql = "INSERT INTO activities (name, description, max_slots, registered_slots) VALUES ('$name', '$description', '$max_slots', 0)";
    if ($conn->query($sql) === TRUE) {
        echo "Thêm hoạt động thành công!";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm hoạt động</title>
</head>
<body>
    <h2>Thêm hoạt động</h2>
    <form method="post">
        <label>Tên hoạt động:</label>
        <input type="text" name="name" required>
        <br>
        <label>Mô tả:</label>
        <textarea name="description" required></textarea>
        <br>
        <label>Số lượng tối đa:</label>
        <input type="number" name="max_slots" required>
        <br>
        <button type="submit">Thêm</button>
    </form>
</body>
</html>
