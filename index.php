<?php
include 'db.php';
include 'include/header.php';

$sql = "SELECT * FROM activities";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Web-DKHD - Đăng ký hoạt động</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 20px; padding: 20px; background-color: #f4f4f4;">

    <h1 style="text-align: center; color: #333;">Danh sách hoạt động</h1>

    <ul style="list-style: none; padding: 0;">
        <?php while ($row = $result->fetch_assoc()): ?>
            <li style="background: #fff; padding: 15px; margin-bottom: 10px; border-radius: 8px; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">
                <h3 style="margin: 0; color: #007BFF;"><?php echo $row['name']; ?></h3>
                <p style="color: #555;"><?php echo $row['description']; ?></p>
                <p style="color: <?php echo ($row['registered_slots'] < $row['max_slots']) ? 'green' : 'red'; ?>;">
                    Đã đăng ký: <strong><?php echo $row['registered_slots'] . '/' . $row['max_slots']; ?></strong>
                </p>   

                <!-- Nút đăng ký -->
                <?php if ($row['registered_slots'] < $row['max_slots']): ?>
                    <a href="register.php?id=<?php echo $row['id']; ?>" 
                       style="display: inline-block; padding: 8px 15px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">
                       Đăng ký ngay
                    </a>
                <?php else: ?>
                    <p style="color: red; font-weight: bold;">Đã đầy</p>
                <?php endif; ?>

                <!-- Nút chỉnh sửa -->
                <a href="edit_activity.php?id=<?php echo $row['id']; ?>"
                   style="display: inline-block; padding: 8px 15px; background: #ffc107; color: white; text-decoration: none; border-radius: 5px; margin-left: 10px;">
                   ✏️ Chỉnh sửa
                </a>

                <!-- Nút xóa -->
                <a href="delete_activity.php?id=<?php echo $row['id']; ?>"
                   onclick="return confirm('Bạn có chắc chắn muốn xóa hoạt động này?');"
                   style="display: inline-block; padding: 8px 15px; background: #dc3545; color: white; text-decoration: none; border-radius: 5px; margin-left: 10px;">
                   ❌ Xóa
                </a>
            </li>
        <?php endwhile; ?>
    </ul>

    <div class="button" style="display: flex; justify-content: center; gap: 10px; margin-top: 20px;">
        <a href="add_activity.php" 
           style="padding: 10px 20px; background: #007BFF; color: white; text-decoration: none; border-radius: 5px;">
           ➕ Thêm hoạt động
        </a>

        <a href="register.php" 
           style="padding: 10px 20px; background: #28a745; color: white; text-decoration: none; border-radius: 5px;">
           📝 Đăng ký hoạt động
        </a>
    </div>

</body>
</html>
