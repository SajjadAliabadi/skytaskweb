<?php
include 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users (username, fullname, email, phone) VALUES ('$username', '$fullname', '$email', '$phone')";;
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "خطا در ثبت کاربر: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>اضافه کردن کاربر</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            direction: rtl;
            text-align: right;
            background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%); /* گرادیانت پس‌زمینه */
            font-family: 'Byekan', sans-serif; /* فونت Byekan */
        }

        .container {
            margin-top: 50px;
            background-color: rgba(255,255,255,0.9); /* پس‌زمینه‌ی کانتینر نیمه‌شفاف */
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            padding: 20px;
        }

        .btn-primary {
            background-color: #007bff; /* رنگ دکمه ثبت */
            border-color: #007bff; /* رنگ حاشیه دکمه ثبت */
        }

        .btn-primary:hover {
            background-color: #0069d9; /* رنگ دکمه ثبت هنگام هاور */
            border-color: #0062cc; /* رنگ حاشیه دکمه ثبت هنگام هاور */
        }

        .btn-secondary {
            background-color: #6c757d; /* رنگ دکمه انصراف */
            border-color: #6c757d; /* رنگ حاشیه دکمه انصراف */
        }

        .btn-secondary:hover {
            background-color: #5a6268; /* رنگ دکمه انصراف هنگام هاور */
            border-color: #545b62; /* رنگ حاشیه دکمه انصراف هنگام هاور */
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* رنگ تیره‌تر */
            padding: 5px; /* کمتر کردن فاصله با محتوا */
            margin-bottom: -15px;
            color: #fff; /* رنگ متن */
            text-align: center;
            font-family: 'Byekan', sans-serif; /* فونت Byekan */
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">اضافه کردن کاربر</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="username">نام کاربری</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="fullname">نام و نام خانوادگی</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
        </div>
        <div class="form-group">
            <label for="email">ایمیل</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">شماره تلفن</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary mx-2">ثبت</button>
            <a href="index.php" class="btn btn-secondary mx-2">انصراف</a>
        </div>
    </form>
</div>

<!-- فوتر سرتاسری -->
<div class="footer">
    <p>Made with ♥ by sajjad</p>
</div>

</body>
</html>
<?php $conn->close(); ?>

