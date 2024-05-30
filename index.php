<?php
include_once 'db.php';
$sql = "SELECT * FROM users"; //دریات لیست کاربران
$result = $conn->query($sql);
?>
<DOCTYPE html>
    <html lang="fa">
    <head>
    <meta charset="utf-8">
    <title>مدیریت کاربران-تسک اسکای روم</title> <!--متن موحود در تب مرورگر-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            direction: rtl;
            text-align: right;
            background: linear-gradient(120deg, #d4fc79, #96e6a1); /* گرادیانت پس‌زمینه */
            background-size: 400% 400%;
            animation: gradient 1s ease-in alternate;
        }
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
        .btn-success {
            background-color: #28a745; /* رنگ دکمه اضافه کردن */
            border-color: #28a745; /* رنگ حاشیه دکمه اضافه کردن */
        }
        .btn-success:hover {
            background-color: #218838; /* رنگ دکمه اضافه کردن هنگام هاور */
            border-color: #1e7e34; /* رنگ حاشیه دکمه اضافه کردن هنگام هاور */
        }
        .btn-primary {
            background-color: #007bff; /* رنگ دکمه ویرایش */
            border-color: #007bff; /* رنگ حاشیه دکمه ویرایش */
        }
        .btn-primary:hover {
            background-color: #0069d9; /* رنگ دکمه ویرایش هنگام هاور */
            border-color: #0062cc; /* رنگ حاشیه دکمه ویرایش هنگام هاور */
        }
        .btn-danger {
            background-color: #dc3545; /* رنگ دکمه حذف */
            border-color: #dc3545; /* رنگ حاشیه دکمه حذف */
        }
        .btn-danger:hover {
            background-color: #c82333; /* رنگ دکمه حذف هنگام هاور */
            border-color: #bd2130; /* رنگ حاشیه دکمه حذف هنگام هاور */
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* رنگ تیره‌تر */
            padding: 3px; /* کمتر کردن فاصله با محتوا */
            margin-bottom: -15px ;
            color: #fff; /* رنگ متن */
            text-align: center;
        }
    </style>
    </head>
    <body>
    <div class="container">
        <h2 class="text-center">مدیریت کاربران</h2>
        <a href="add.php" class="btn btn-success mb-3">اضافه کردن کاربر جدید</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>شناسه</th>
                <th>نام کاربری</th>
                <th>نام و نام خانوادگی</th>
                <th>ایمیل</th>
                <th>شماره تلفن</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">ویرایش</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- فوتر سرتاسری -->
    <div class="footer">
        <p>Task For Skyroom</p>
    </div>

    </body>
    </html>
    <?php $conn->close(); ?>
