<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Xóa tất cả đăng ký của hoạt động này trước
    $sql_delete_registrations = "DELETE FROM registrations WHERE activity_id = ?";
    $stmt1 = $conn->prepare($sql_delete_registrations);
    $stmt1->bind_param("i", $id);
    $stmt1->execute();
    $stmt1->close();

    // Sau đó xóa hoạt động
    $sql_delete_activity = "DELETE FROM activities WHERE id = ?";
    $stmt2 = $conn->prepare($sql_delete_activity);
    $stmt2->bind_param("i", $id);

    if ($stmt2->execute()) {
        echo "<script>alert('Xóa hoạt động thành công!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Lỗi khi xóa hoạt động!'); window.location.href='index.php';</script>";
    }

    $stmt2->close();
}
$conn->close();
?>
