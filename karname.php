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
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <style>
   .containera{
    width:90%;
    justify-content: center;
    margin: 3.8rem auto;
    padding: 20px;
    text-align: center;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.progress-container{
    margin: auto;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 1px solid #cfcfcf;
}

h2{
    margin: 10px;
    padding-bottom: 10px;
    text-transform: uppercase;
}

.progress .mask, .progress .fill{
    width: 150px;
    height: 150px;
    position: absolute;
    border-radius: 50%;
}

.progress .mask{
    clip: rect(0px,150px,150px,75px);
}
.inside-circle{
    width: 122px;
    height: 122px;
    position: absolute;
    font-size: 2rem;
    background: #fff;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 14px 13px;
    color:#000;
}

.mask .fill{
    clip: rect( 0px, 75px, 150px, 0px);
    background: #903bdf;
}
.mask.full,
.progress .fill{
    animation: fill ease-in-out 3s;
    transform: rotate(150deg);
}

@keyframes fill{
    0%{
        transform: rotate(0deg);
    }
}

.inside-circle span{
    font-size: 2rem;
    margin-left: 0.2rem;
}

.line{
    margin-top: 2rem;
    border: 1px solid rgb(216, 216, 216);
}
.progress-report{
    display: flex;
    justify-content: center;
    align-items: center;
}
.progress-report h3{
    font-size: 1.5rem;
  padding: 1rem;
}
.progress-report span{
    font-size: 1rem;
    color:rgb(98, 98, 98);
}

.progress-report .line{
    height: 5rem;

}
.progress {
    line-height: 20px;
    color: white;
    border-radius: 10px;
    position: absolute;
}






section{
            display: flex;
            flex-wrap: wrap;
        }
        .container1{
            width: 80%;
            height:600px;
            justify-content: center;
    margin: 3.8rem auto;
    padding: 20px;

    border-radius: 10px;
    background: #fff;
    box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
        }
        .heading{
            text-align: center;
            text-decoration: underline;
            text-underline-offset: 10px;
            text-decoration-thickness: 5px;
            margin-bottom: 50px;
        }
        .bar{
            font-size: 23px;
        }

        .technical-bars .bar{
            margin: 40px 0 ;
        }
        .technical-bars .bar:first-child{
            margin-top: 0 ;
        }
        .technical-bars .bar:last-child{
            margin-bottom: 0 ;
        }
        .technical-bars .bar .info{
            margin-bottom: 5px ;
        }
        .technical-bars .bar .info span{
            font-size: 17px;
            font-weight: 500;
            animation: showtext 0.5s 1s linear forwards;
        }
        .technical-bars .bar .progress-line{
           position: relative;
           border-radius: 10px;
           width: 100%;
           height: 5px;
           background-color: black;
           animation: animate 1s cubic-bezier(1, 0, 0.5,1) forwards;
           transform: scaleX(0);
           transform-origin: left;
        }
        @keyframes animate{
          100%{
             transform: scaleX(1);
           }
        }

        .technical-bars .bar .progress-line.math span{
          height: 100%;
          background-color: #0ade3b;
          
          position: absolute;
          border-radius: 10px;
          animation: animate 1s 1s cubic-bezier(1, 0, 0.5,1) forwards;
          transform-origin: left;
        }
        .technical-bars .bar .progress-line.biology span{
          height: 100%;
          background-color: #c92c2a;
          
          position: absolute;
          border-radius: 10px;
          animation: animate 1s 1s cubic-bezier(1, 0, 0.5,1) forwards;
          transform-origin: left;
        }
        .technical-bars .bar .progress-line.chemi span{
          height: 100%;
          background-color: #f78519;
          
          position: absolute;
          border-radius: 10px;
          animation: animate 1s 1s cubic-bezier(1, 0, 0.5,1) forwards;
          transform-origin: left;
        }
        .technical-bars .bar .progress-line.fizik span{
          height: 100%;
          background-color: #f5d81b;
          
          position: absolute;
          border-radius: 10px;
          animation: animate 1s 1s cubic-bezier(1, 0, 0.5,1) forwards;
          transform-origin: left;
        }

        .progress-line.math span{
            width: 90%;
        }
        .progress-line.chemi span{
            width: 50%;
        }
        .progress-line.biology span{
            width: 30%;
        }
        .progress-line.fizik span{
            width: 60%;
        }
        .progress-line span::after{

            position: absolute;
            padding: 1px 8px;
            background-color: black;
            color: #fff;
            font-size: 12px;
            border-radius: 3px;
            top: -28px;
            right: -20px;
            animation: showText 0.5s 1.5s linear forwards;
            opacity: 0;
        }

        .progress-line.math span::after{
            content: "90%";
        }
        .progress-line.chemi span::after{
            content: "50%";
        }
        .progress-line.biology span::after{
            content: "30%";
        }
        .progress-line.fizik span::after{
            content: "60%";
        }

        .progress-line span::before{
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            border: 7px solid transparent;
            border-bottom-width: 0px;
            border-right-width: 0px;
            border-top-color: black;
            top: -10px;
            right: 0;
            animation: showText 0.5s 1.5s linear forwards;
            opacity: 0;
        }

        @keyframes showText{
          100%{
            opacity: 1;
           }
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
            <div class="container" >
                <h2 style="text-align:center">کارنامه تحصیلی</h2>
                <div class="report-card">
                    <table class="headercard" style="text-align:center">
                        <tr>
                            <td>نام دانش آموز: <?php echo $username; ?></td>
                            <td>کدملی: 549875-254</td>
                            <td>پایه:12</td>
                            <td>کلاس: الف</td>
                        </tr>
                    </table>
                    

                   
        




                    <div class="details" style="text-align:center">
                        <h3>نمرات آزمون‌ها</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>نام آزمون</th>
                                    <th>نمره</th>
                                    <th>رتبه</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>ریاضی</td>
                                    <td>19</td>
                                    <td>عالی</td>
                                </tr>
                                <tr>
                                    <td>شیمی</td>
                                    <td>15</td>
                                    <td>متوسط</td>
                                </tr>
                                <tr>
                                    <td>زیست</td>
                                    <td>13</td>
                                    <td>قابل قبول</td>
                                </tr>
                                <tr>
                                    <td>فیزیک</td>
                                    <td>16</td>
                                    <td>خوب</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>



            <div class="container1" id="skills" style="width:90%" dir="ltr"> 
               <div class="technical-bars">
        
                <div class="bar" >
                    <i style="color: rgb(223, 21, 21)" >
                    <i class='bx bx-math'></i></i>
                    <div class="info">
                        <span>ریاضی</span>
                    </div>
                    <div class="progress-line math">
                        <span></span>
                    </div>
                </div>
                <div class="bar">
                    <i style="color: rgb(211, 134, 10)">
                    <i class='bx bx-test-tube'></i></i>
                    <div class="info">
                        <span>شیمی</span>
                    </div>
                    <div class="progress-line chemi">
                    
                        <span></span>
                    </div>
                </div>
                <div class="bar">
                    <i style="color: rgb(16, 125, 25)">
                    <i class='bx bx-brain'></i></i>
                    <div class="info">
                        <span>زیست</span>
                    </div>
                    <div class="progress-line biology">
                        <span></span>
                    </div>
                </div>
                <div class="bar">
                    <i style="color: rgb(233, 230, 28)">
                    <i class='bx bxs-zap'></i></i>
                    <div class="info">
                        <span>فیزیک</span>
                    </div>
                    <div class="progress-line fizik" >
                        <span></span>
                    </div>
                 
                </div>
            </div>
        </div>


            <div class="containera">
        <h2>نمره کل</h2>
        <div class="progress-container">
            <div class="progress">
                <div class="mask full">
                    <div class="fill"></div>
                </div>
                <div class="mask half">
                    <div class="fill"></div>
                </div>
                <div class="inside-circle">60 <span>%</span></div>
            </div>
        </div>
        <div class="line"></div>
        <div class="progress-report">
            <h3>76% <br> <span>هفته گذشته</span></h3>
            <div class="line"></div>
            <h3>80% <br> <span>ماه جاری</span></h3>
        </div>
        <div class="contact"></div>
    </div>
            
    </div>
       
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('content').classList.toggle('open');
        });

      

    </script>
</body>

</html>
