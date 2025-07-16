<?php
session_start();


if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit; 
}

include 'config.php'; // فایل اتصال به پایگاه داده
$username = $_SESSION['login_user'];
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "خطا در دریافت اطلاعات کاربری.";
    exit; 
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>داشبورد مدیریت دانش آموزان</title>
    <link rel="stylesheet" href="./style/styles.css">
    <style>
      .btn-az{
 align-items: center;
 appearance: none;
 background-color: #FCFCFD;
 border-radius: 4px;
 border-width: 0;
 box-shadow: rgba(45, 35, 66, 0.2) 0 2px 4px,rgba(45, 35, 66, 0.15) 0 7px 13px -3px,#D6D6E7 0 -3px 0 inset;
 box-sizing: border-box;
 color: #36395A;
 cursor: pointer;
 display: inline-flex;
 height: 48px;
 justify-content: center;
 line-height: 1;
 list-style: none;
 overflow: hidden;
 padding-left: 16px;
 padding-right: 16px;
 position: relative;
 text-align: left;
 text-decoration: none;
 transition: box-shadow .15s,transform .15s;
 user-select: none;
 -webkit-user-select: none;
 touch-action: manipulation;
 white-space: nowrap;
 will-change: box-shadow,transform;
 font-size: 18px;
}

.btn-az:focus {
 box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
}

.btn-az:hover {
 box-shadow: rgba(45, 35, 66, 0.3) 0 4px 8px, rgba(45, 35, 66, 0.2) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
 transform: translateY(-4px);
}

.btn-az:active {
 box-shadow: #D6D6E7 0 3px 7px inset;
 transform: translateY(4px);
}
    </style>
    
</head>

<body>
    <div class="sidebar" id="sidebar">
        <p class="logo">مدیریت</p>
        <ul>
        <li><a href="./index.php"><span class="icon">&#128153;</span><span class="text">خانه</span></a></li>
        <li><a href="./barname.php"><span class="icon">&#128197;</span><span class="text">برنامه</span></a></li>
            <li><a href="./azmon.php"><span class="icon">&#128221;</span><span class="text">آزمون</span></a></li>
            <li><a href="./karname.php"><span class="icon">&#127891;</span><span class="text">کارنامه</span></a></li>
            <li><a href="logout.php"><span class="icon">&#128275;</span><span class="text">خروج</span></a></li>
        </ul>
    </div>

    <div class="content" id="content">
    <div class="head">
            <div class="menu-toggle" id="menu-toggle">&#9776;</div>
            <a href="profile.php" class="profile">
                <p><?php echo $username; ?></p>
                <div>
                    <!-- نمایش تصویر پروفایل کاربر -->
                    <img src="./img/<?php echo $user['profile_image']; ?>" alt="تصویر پروفایل">
                </div>
            </a>
        </div>
        <div class="main">
            <div class="container">
                <h1>آزمون‌های آنلاین</h1>
                <form id="examForm">
                    
                    <button type="submit" class="btn-az" onclick="az1();">آزمون اول</button>
                    <br><br>
                    <button type="submit" class="btn-az" onclick="az2();"> آزمون دوم</button>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">

document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('content').classList.toggle('open');
          
        });

        function az1(){
            window.open("./azmon.php");
        }
        function az2(){
            window.open("./azmon2.php");
        }
</script>

</body>

</html>




