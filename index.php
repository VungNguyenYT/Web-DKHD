<?php
include 'db.php';

$sql = "SELECT * FROM activities";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Web-DKHD - Đăng ký hoạt động</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Danh sách hoạt động</h1>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <h3><?php echo $row['name']; ?></h3>
                <p><?php echo $row['description']; ?></p>
                <!-- Kiểm tra số lượng đăng ký nếu lớn hơn thì sẽ không đăng ký được -->
                <p>Đã đăng ký: <?php echo $row['registered_slots'] . '/' . $row['max_slots']; ?></p>   
                <?php if ($row['registered_slots'] < $row['max_slots']): ?>
                    <a href="register.php?id=<?php echo $row['id']; ?>">Đăng ký ngay</a>
                <?php else: ?>
                    <p>Đã đầy</p>
                <?php endif; ?>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
