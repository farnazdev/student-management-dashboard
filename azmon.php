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
        .sumbit-btn{
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

.sumbit-btn:focus {
 box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
}

.sumbit-btn:hover {
 box-shadow: rgba(45, 35, 66, 0.3) 0 4px 8px, rgba(45, 35, 66, 0.2) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
 transform: translateY(-4px);
}

.sumbit-btn:active {
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
            <li><a href="./azmonch.php"><span class="icon">&#128221;</span><span class="text">آزمون</span></a></li>
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
                <h1>نظرسنجی</h1>
                <form id="examForm">
                    <div class="question">
                        <h3>سوال 1: به نظر شما بهترین تایم شروع برنامه‌نویسی  کدام است؟</h3>
                        <div class="options">
                            <input type="radio" id="q1a" name="q1" value="koodak">
                            <label for="q1a">کودکی</label><br>
                            <input type="radio" id="q1b" name="q1" value="nojavan">
                            <label for="q1b">نوجوانی</label><br>
                            <input type="radio" id="q1c" name="q1" value="javan">
                            <label for="q1c">جوانی</label><br>
                            <input type="radio" id="q1d" name="q1" value="allgen">
                            <label for="q1d">هر زمان</label>
                        </div>
                    </div>

                    <div class="question">
                        <h3>سوال 2: دوست دارید در کدام شغل مشغول به کار شوید ؟</h3>
                        <div class="options">
                            <input type="checkbox" id="q2a" name="q2" value="web">
                            <label for="q2a">برنامه نویس وب</label><br>
                            <input type="checkbox" id="q2b" name="q2" value="data">
                            <label for="q2b">تحلیلگر داده</label><br>
                            <input type="checkbox" id="q2c" name="q2" value="robat">
                            <label for="q2c">رباتیک</label><br>
                            <input type="checkbox" id="q2d" name="q2" value="ai">
                            <label for="q2d">هوش مصنوعی</label>
                        </div>
                    </div>
        
                    <div class="question">
                        <h3>سوال 3: به عملکرد خود چه درصدی می دهید؟</h3>
                        <input type="range" id="q3" name="q3" min="0" max="10">
                    </div>
        
                    <div class="question">
                        <h3>سوال 4: چه پیشنهادی برای بهتر شدن روند تدریس و غیره دارید ؟</h3>
                        <textarea id="q4" name="q4" rows="4" cols="50"></textarea>
                    </div>
        
                    <button type="submit" class="sumbit-btn">تایید</button>
                </form>
                <div id="result"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('content').classList.toggle('open');
        });

       
        document.getElementById('examForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(e.target);
            let resultText = '<h2>نظر شما با موفقیت ثبت شد . </h2>';

           

            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            if (checkboxes.length > 0) {
                checkboxes.forEach(checkbox => {
                   
                });
            }

            document.getElementById('result').innerHTML = resultText;
        });

    </script>
</body>

</html>



