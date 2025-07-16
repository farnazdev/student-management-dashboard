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
    <style type="text/css">
        body{
    font-size:16px;
    background-color: aliceblue;
}
.quiz-container{
    width: 80%;
    margin: 0 auto;
}
h1{
    margin-top:20px;

    text-align: center;
}
.question{
    width: 45%;
    margin-bottom: 20px;
    background: #fff;
    padding: 20px;

}
.question:nth-child(odd){
    margin-right: 5%;
}
.question p{
    font-weight: bold;
}
.answer label:not(:first-child){
    border-top: 1px solid #e0e0e0;
}
label{
    padding: 10px 0;
    display:inline-block;
    margin-bottom: 10px;
}
input[type="radio"]{
    margin-left: 10px;
}
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

.d-flex{
    display: flex;
}
.result{
    font-weight: bold;
    font-size: 22px;
    margin-top: 20px;
    padding: 10px;
    background: #f2f2f2;
    border-radius: 5px;
    text-align: center;
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
        <div class="quiz-container">
            <h1>آزمون تاریخ چند گزینه ای</h1>
            <br>
            <hr>
            <form action="" id="quiz-form">
                <div class="d-flex">
                <div class="question">
                    <p>1. معجم البلدان اثر کدام مورخ است ؟ </p> 
                    <br>
                     <p>2.سبک تاریخ های منظوم از چه دوره ای آغاز شد ؟ </p>
                     <br>
                     <p>3. معجم البلدان اثر کدام مورخ است ؟ </p> 
                    <br>
                     <p>4.سبک تاریخ های منظوم از چه دوره ای آغاز شد ؟ </p>
                     <br>
                    
                </div>
                <div class="question">
                    <div class="answer">
                        <label><input type="radio" name="q1" value="a">مقدسی</label>
                        <label><input type="radio" name="q1" value="b">ابن حوقل</label>
                        <label><input type="radio" name="q1" value="c">دینوری</label>
                        <label><input type="radio" name="q1" value="d">ابن بلخی</label>
                    </div>
                    <div class="answer">
                        <label><input type="radio" name="q2" value="a">هوشنگ</label>
                        <label><input type="radio" name="q2" value="b">کیومرث</label>
                        <label><input type="radio" name="q2" value="c">رستم</label>
                        <label><input type="radio" name="q2" value="d">ایرج</label>
                    </div>
                    <div class="answer">
                        <label><input type="radio" name="q3" value="a">مقدسی</label>
                        <label><input type="radio" name="q3" value="b">ابن حوقل</label>
                        <label><input type="radio" name="q3" value="c">دینوری</label>
                        <label><input type="radio" name="q3" value="d">ابن بلخی</label>
                    </div>
                    <div class="answer">
                        <label><input type="radio" name="q4" value="a">هوشنگ</label>
                        <label><input type="radio" name="q4" value="b">کیومرث</label>
                        <label><input type="radio" name="q4" value="c">رستم</label>
                        <label><input type="radio" name="q4" value="d">ایرج</label>
                    </div>

                </div>
            </div>
                <button type="submit" class="sumbit-btn" onclick="">تایید</button>
            </form>
            <div class="result" id="result" ></div>
        </div>
    </div>
    <script type="text/javascript">

document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('content').classList.toggle('open');


          
        });

        

        const quizform=document.getElementById('quiz-form');
        const resultdiv=document.getElementById('result');
        const correctanswers=['a','b','a','b'];

        quizform.addEventListener('submit', e=>{

            
            e.preventDefault();

            let score=0;
            const useranswers=[quizform.q1.value,quizform.q2.value,quizform.q3.value,quizform.q4.value];
            useranswers.forEach((answer,index) => {
                if(answer === correctanswers[index]){
                    score += 1;
                }


              

                
            });
            resultdiv.innerHTML= `امتیاز شما :   ${score}/${correctanswers.length}`;
        });
    </script>
</body>

</html>



