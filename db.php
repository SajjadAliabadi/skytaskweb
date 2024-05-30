<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

// ایجاد اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {

    error_log("Connection failed: " . $conn->connect_error); //ذخیره لاگ ارور در سرور
    die("اتصال به پایگاه داده شکست خورد. لطفاً بعداً تلاش کنید.");    //نمایش پیام خطا به کاربر و خروج از برنامه
}
?>
