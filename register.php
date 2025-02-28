<?php
include 'db.php';
include 'include/header.php';

if (isset($_GET['id'])) {
    $activity_id = $_GET['id'];
    $sql = "SELECT * FROM activities WHERE id = $activity_id";
    $result = $conn->query($sql);
    $activity = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $student_id = $_POST["student_id"];
    $class_id = $_POST["class_id"];
    $zalo_phone = $_POST["zalo_phone"];
    $activity_id = $_POST["activity_id"];

    // Kiểm tra số lượng đăng ký
    $sql = "SELECT max_slots, registered_slots FROM activities WHERE id = $activity_id";
    $result = $conn->query($sql);
    $activity = $result->fetch_assoc();

    if ($activity['registered_slots'] < $activity['max_slots']) {
        $sql = "INSERT INTO registrations (activity_id, full_name, student_id, class_id, zalo_phone) VALUES 
                ('$activity_id', '$full_name', '$student_id', '$class_id', '$zalo_phone')";
        if ($conn->query($sql) === TRUE) {
            $conn->query("UPDATE activities SET registered_slots = registered_slots + 1 WHERE id = $activity_id");
            echo "<p style='color: green; text-align: center; font-weight: bold;'>✅ Đăng ký thành công!</p>";
        } else {
            echo "<p style='color: red; text-align: center; font-weight: bold;'>❌ Lỗi: " . $conn->error . "</p>";
        }
    } else {
        echo "<p style='color: red; text-align: center; font-weight: bold;'>⚠️ Hoạt động này đã đủ số lượng!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký hoạt động</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <!-- Tiêu đề -->
    <div class="tieude" style="text-align: center; color: #333;"><h2>ĐĂNG KÝ HOẠT ĐỘNG</h2></div>

    <!-- Hiển thị thông tin hoạt động -->
    <div style="max-width: 400px; margin: 0 auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
        <h3 style="color: #007BFF; text-align: center;"><?php echo htmlspecialchars($activity['name']); ?></h3>
        <p><strong>📄 Mô tả:</strong> <?php echo nl2br(htmlspecialchars($activity['description'])); ?></p>
        <p><strong>📊 Số lượng đã đăng ký:</strong> <span style="color: #ff5722; font-weight: bold;">
            <?php echo $activity['registered_slots']; ?>/<?php echo $activity['max_slots']; ?>
        </span></p>
    </div>

    <!-- Form đăng ký -->
    <form method="post" 
          style="max-width: 400px; margin: 10px auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
        
        <input type="hidden" name="activity_id" value="<?php echo $activity_id; ?>">

        <label style="font-weight: bold;">Họ và tên:</label>
        <input type="text" name="full_name" required 
               style="width: 100%; padding: 10px; margin: 5px 0 10px; border: 1px solid #ccc; border-radius: 5px;">
        
        <label style="font-weight: bold;">Mã số sinh viên:</label>
        <input type="text" name="student_id" required 
               style="width: 100%; padding: 10px; margin: 5px 0 10px; border: 1px solid #ccc; border-radius: 5px;">
        
        <label style="font-weight: bold;">Mã lớp:</label>
        <input type="text" name="class_id" required 
               style="width: 100%; padding: 10px; margin: 5px 0 10px; border: 1px solid #ccc; border-radius: 5px;">
        
        <label style="font-weight: bold;">Số điện thoại Zalo:</label>
        <input type="text" name="zalo_phone" required 
               style="width: 100%; padding: 10px; margin: 5px 0 20px; border: 1px solid #ccc; border-radius: 5px;">

        <!-- Nút đăng ký -->
        <button type="submit" 
                style="width: 100%; padding: 10px; background: #28a745; color: white; font-size: 16px; font-weight: bold; border: none; border-radius: 5px; cursor: pointer;">
            ✅ Đăng ký
        </button>

        <!-- Nút trở lại -->
        <a href="index.php" 
           style="display: block; text-align: center; margin-top: 10px; padding: 10px; background: #007BFF; color: white; text-decoration: none; font-size: 16px; font-weight: bold; border-radius: 5px;">
           🔙 Trở lại
        </a>
    </form>

</body>
</html>
