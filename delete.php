<?php
include 'db.php';
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "خطا در حذف کاربر: " . $conn->error;
    }
}
$conn->close();