<?php
include 'config.php';
session_start();
if(!isset($_SESSION['login_user'])){
    header("location: login.php");
    die();
}

$username = $_SESSION['login_user'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'];

    // Handling profile image upload
    if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "./img/";
        $filename = basename($_FILES['profile_image']['name']);
        $target_path = $target_dir . $filename;
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_path);
        $profile_image = $filename;
    } else {
        $profile_image = $user['profile_image'];
    }

    $sql = "UPDATE users SET username = '$new_username', email = '$email', password = '$password', profile_image = '$profile_image' WHERE username = '$username'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['login_user'] = $new_username;
        $user['username'] = $new_username; // Update username in session data
        echo "تغییرات با موفقیت ثبت شد.";
    } else {
        echo "خطا در ثبت تغییرات: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>حساب کاربری</title>
    <link rel="stylesheet" href="./style/styles.css">
</head>
<body>
    <div class="sidebar" id="sidebar">
        <p class="logo">مدیریت</p>
        <ul>
        <li><a href="./index.php"><span class="icon">&#128153;</span><span class="text">خانه</span></a></li>
            <li><a href="./barname.php"><span class="icon">&#128197;</span><span class="text">برنامه</span></a></li>
            <li><a href="./azmonch.php"><span class="icon">&#128221;</span><span class="text">آزمون</span></a></li>
            <li><a href="./karname.php"><span class="icon">&#127891;</span><span class="text">کارنامه</span></a></li>
            <li><a href="logout.php"><span class="icon">&#128275;</span><span class="text">خروج</span></a></li>
        </ul>
    </div>

    <div class="content" id="content">
        <div class="head">
            <div class="menu-toggle" id="menu-toggle">&#9776;</div>
            <a href="" class="profile">
                <p><?php echo $user['username']; ?></p>
                <div>
                    <img src="./img/<?php echo $user['profile_image']; ?>" alt="">
                </div>
            </a>
        </div>
        <div class="main">
            <h2>حساب کاربری</h2>
            <p>صفحه اصلی / مدیریت حساب کاربری</p>

            <div class="main-prof">
                <div class="r-prof">
                    <img src="./img/<?php echo $user['profile_image']; ?>" class="img-prof" alt="">
                    <p><?php echo $user['username']; ?></p>
                    <ul>
                        <li class="li-r-prof">
                            <p>نام مدرسه</p>
                            <P><?php echo $user['school_name']; ?></P>
                        </li>
                        <li class="li-r-prof">
                            <p>تعداد آزمون داده شده</p>
                            <P><?php echo $user['exams_taken']; ?></P>
                        </li>
                    </ul>
                    <a href="" class="btn-prof">مشاهده جزئیات</a>
                </div>

                <div class="l-prof">
                    <h4>تنظیمات عمومی</h4>
                    <form method="POST" enctype="multipart/form-data">
                        <div>
                            <label>نام کاربری</label>
                            <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
                        </div>
                        <div>
                            <label>ایمیل</label>
                            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
                        </div>
                        <div>
                            <label>رمز عبور</label>
                            <input type="password" name="password" placeholder="رمز عبور جدید (در صورت تغییر)">
                        </div>
                        <div>
                            <label>تصویر پروفایل</label>
                            <input type="file" name="profile_image" accept="image/*">
                        </div>

                        <div class="divbtn">
                            <input type="submit" value="ثبت تغییرات">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('content').classList.toggle('open');
        });
    </script>
</body>
</html>
