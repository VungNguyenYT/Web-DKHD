<?php
include 'db.php';
include 'include/header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $max_slots = $_POST["max_slots"];

    $sql = "INSERT INTO activities (name, description, max_slots, registered_slots) VALUES ('$name', '$description', '$max_slots', 0)";
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green; text-align: center; font-weight: bold;'>✅ Thêm hoạt động thành công!</p>";
    } else {
        echo "<p style='color: red; text-align: center; font-weight: bold;'>❌ Lỗi: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm hoạt động</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <!-- Tiêu đề -->
    <h2 style="text-align: center; color: #333;">➕ Thêm hoạt động</h2>

    <!-- Form thêm hoạt động -->
    <form method="post" 
          style="max-width: 400px; margin: 0 auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
        
        <label style="font-weight: bold;">Tên hoạt động:</label>
        <input type="text" name="name" required 
               style="width: 100%; padding: 10px; margin: 5px 0 10px; border: 1px solid #ccc; border-radius: 5px;">
        
        <label style="font-weight: bold;">Mô tả:</label>
        <textarea name="description" required 
                  style="width: 100%; padding: 10px; margin: 5px 0 10px; border: 1px solid #ccc; border-radius: 5px; height: 100px;"></textarea>
        
        <label style="font-weight: bold;">Số lượng tối đa:</label>
        <input type="number" name="max_slots" required 
               style="width: 100%; padding: 10px; margin: 5px 0 20px; border: 1px solid #ccc; border-radius: 5px;">

        <!-- Nút thêm -->
        <button type="submit" 
                style="width: 100%; padding: 10px; background: #28a745; color: white; font-size: 16px; font-weight: bold; border: none; border-radius: 5px; cursor: pointer;">
            ✅ Thêm hoạt động
        </button>

        <!-- Nút trở lại -->
        <a href="index.php" 
           style="display: block; text-align: center; margin-top: 10px; padding: 10px; background: #007BFF; color: white; text-decoration: none; font-size: 16px; font-weight: bold; border-radius: 5px;">
           🔙 Trở lại
        </a>
    </form>

</body>
</html>
