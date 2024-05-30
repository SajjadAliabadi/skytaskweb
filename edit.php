<?php
include "db.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = "UPDATE users SET username='$username', fullname='$fullname', email='$email', phone='$phone' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "خطا در ویرایش کاربر: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ویرایش کاربر</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            direction: rtl;
            text-align: right;
            background: linear-gradient(120deg, #d4fc79, #96e6a1); /* گرادیانت پس‌زمینه */
            background-size: 400% 400%;
            animation: gradient 10s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .container {
            margin-top: 50px;
            background-color: rgba(255,255,255,0.9); /* پس‌زمینه‌ی کانتینر نیمه‌شفاف */
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .btn-primary {
            background-color: #007bff; /* رنگ دکمه ویرایش */
            border-color: #007bff; /* رنگ حاشیه دکمه ویرایش */
        }
        .btn-primary:hover {
            background-color: #0069d9; /* رنگ دکمه ویرایش هنگام هاور */
            border-color: #0062cc; /* رنگ حاشیه دکمه ویرایش هنگام هاور */
        }
        .btn-secondary {
            background-color: #6c757d; /* رنگ دکمه انصراف */
            border-color: #6c757d; /* رنگ حاشیه دکمه انصراف */
        }
        .btn-secondary:hover {
            background-color: #5a6268; /* رنگ دکمه انصراف هنگام هاور */
            border-color: #545b62; /* رنگ حاشیه دکمه انصراف هنگام هاور */
        }
        .form-group label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">ویرایش کاربر</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="form-group">
            <label for="username">نام کاربری</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" required>
        </div>
        <div class="form-group">
            <label for="fullname">نام و نام خانوادگی</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">ایمیل</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">شماره تلفن</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary mx-2">ویرایش</button>
            <a href="index.php" class="btn btn-secondary mx-2">انصراف</a>
        </div>
    </form>
</div>
</body>
</html>
<?php $conn->close(); ?>
