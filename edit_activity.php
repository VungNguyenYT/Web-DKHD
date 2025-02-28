<?php
include 'db.php';

if (isset($_GET['id'])) {
    $activity_id = $_GET['id'];
    $sql = "SELECT * FROM activities WHERE id = $activity_id";
    $result = $conn->query($sql);
    $activity = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activity_id = $_POST["id"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $max_slots = $_POST["max_slots"];

    $sql = "UPDATE activities SET name='$name', description='$description', max_slots='$max_slots' WHERE id=$activity_id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cập nhật thành công!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Lỗi: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa hoạt động</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh;">

    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 2px 2px 10px rgba(0,0,0,0.1); width: 400px;">
        <h2 style="text-align: center; color: #333;">✏️ Chỉnh sửa hoạt động</h2>
        
        <form method="post" style="display: flex; flex-direction: column;">
            <input type="hidden" name="id" value="<?php echo $activity['id']; ?>">

            <label style="margin-bottom: 5px; font-weight: bold;">Tên hoạt động:</label>
            <input type="text" name="name" value="<?php echo $activity['name']; ?>" required 
                   style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px;">

            <label style="margin-bottom: 5px; font-weight: bold;">Mô tả:</label>
            <textarea name="description" required 
                      style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px; height: 80px;"><?php echo $activity['description']; ?></textarea>

            <label style="margin-bottom: 5px; font-weight: bold;">Số lượng tối đa:</label>
            <input type="number" name="max_slots" value="<?php echo $activity['max_slots']; ?>" required 
                   style="padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 20px;">

            <button type="submit" 
                    style="background: #007BFF; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; font-size: 16px;">
                💾 Lưu thay đổi
            </button>

            <a href="index.php" 
               style="display: block; text-align: center; margin-top: 10px; color: #007BFF; text-decoration: none; font-size: 14px;">
               ⬅️ Trở về danh sách
            </a>
        </form>
    </div>

</body>
</html>
