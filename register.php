<?php
include 'db.php';

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
            echo "Đăng ký thành công!";
        } else {
            echo "Lỗi: " . $conn->error;
        }
    } else {
        echo "Hoạt động này đã đủ số lượng!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký hoạt động</title>
</head>
<body>
    <h2>Đăng ký: <?php echo $activity['name']; ?></h2>
    <form method="post">
        <input type="hidden" name="activity_id" value="<?php echo $activity_id; ?>">
        <label>Họ và tên:</label>
        <input type="text" name="full_name" required>
        <br>
        <label>Mã số sinh viên:</label>
        <input type="text" name="student_id" required>
        <br>
        <label>Mã lớp:</label>
        <input type="text" name="class_id" required>
        <br>
        <label>Số điện thoại Zalo:</label>
        <input type="text" name="zalo_phone" required>
        <br>
        <button type="submit">Đăng ký</button>
    </form>
</body>
</html>
