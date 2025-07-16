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
    #checklist {
  --background: #fff;
  --text: #414856;
  --check: #4f29f0;
  --disabled: #c3c8de;
  --width: 100%;
  --height: 180px;
  --border-radius: 10px;
  background: var(--background);
  width: var(--width);
  height: var(--height);
  border-radius: var(--border-radius);
  position: relative;
  box-shadow: 0 10px 30px rgba(65, 72, 86, 0.05);
  padding: 30px 85px;
  display: grid;
  grid-template-columns: 30px auto;
  align-items:right ;
  justify-content: right;
}

#checklist label {
  color: var(--text);
  position: relative;
  cursor: pointer;
  display: grid;
  align-items: center;
  width: fit-content;
  transition: color 0.3s ease;
  margin-right: 20px;
}

#checklist label::before, #checklist label::after {
  content: "";
  position: absolute;
}

#checklist label::before {
  height: 2px;
  width: 8px;
  left: -27px;
  background: var(--check);
  border-radius: 2px;
  transition: background 0.3s ease;
}

#checklist label:after {
  height: 4px;
  width: 4px;
  top: 8px;
  left: -25px;
  border-radius: 50%;
}

#checklist input[type="checkbox"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  position: relative;
  height: 15px;
  width: 15px;
  outline: none;
  border: 0;
  margin: 0 15px 0 0;
  cursor: pointer;
  background: var(--background);
  display: grid;
  align-items: center;
  margin-right: 20px;
}

#checklist input[type="checkbox"]::before, #checklist input[type="checkbox"]::after {
  content: "";
  position: absolute;
  height: 2px;
  top: auto;
  background: var(--check);
  border-radius: 2px;
}

#checklist input[type="checkbox"]::before {
  width: 0px;
  right: 60%;
  transform-origin: right bottom;
}

#checklist input[type="checkbox"]::after {
  width: 0px;
  left: 40%;
  transform-origin: left bottom;
}

#checklist input[type="checkbox"]:checked::before {
  animation: check-01 0.4s ease forwards;
}

#checklist input[type="checkbox"]:checked::after {
  animation: check-02 0.4s ease forwards;
}

#checklist input[type="checkbox"]:checked + label {
  color: var(--disabled);
  animation: move 0.3s ease 0.1s forwards;
}

#checklist input[type="checkbox"]:checked + label::before {
  background: var(--disabled);
  animation: slice 0.4s ease forwards;
}

#checklist input[type="checkbox"]:checked + label::after {
  animation: firework 0.5s ease forwards 0.1s;
}

@keyframes move {
  50% {
    padding-left: 8px;
    padding-right: 0px;
  }

  100% {
    padding-right: 4px;
  }
}

@keyframes slice {
  60% {
    width: 100%;
    left: 4px;
  }

  100% {
    width: 100%;
    left: -2px;
    padding-left: 0;
  }
}

@keyframes check-01 {
  0% {
    width: 4px;
    top: auto;
    transform: rotate(0);
  }

  50% {
    width: 0px;
    top: auto;
    transform: rotate(0);
  }

  51% {
    width: 0px;
    top: 8px;
    transform: rotate(45deg);
  }

  100% {
    width: 5px;
    top: 8px;
    transform: rotate(45deg);
  }
}

@keyframes check-02 {
  0% {
    width: 4px;
    top: auto;
    transform: rotate(0);
  }

  50% {
    width: 0px;
    top: auto;
    transform: rotate(0);
  }

  51% {
    width: 0px;
    top: 8px;
    transform: rotate(-45deg);
  }

  100% {
    width: 10px;
    top: 8px;
    transform: rotate(-45deg);
  }
}

@keyframes firework {
  0% {
    opacity: 1;
    box-shadow: 0 0 0 -2px #4f29f0, 0 0 0 -2px #4f29f0, 0 0 0 -2px #4f29f0, 0 0 0 -2px #4f29f0, 0 0 0 -2px #4f29f0, 0 0 0 -2px #4f29f0;
  }

  30% {
    opacity: 1;
  }

  100% {
    opacity: 0;
    box-shadow: 0 -15px 0 0px #4f29f0, 14px -8px 0 0px #4f29f0, 14px 8px 0 0px #4f29f0, 0 15px 0 0px #4f29f0, -14px 8px 0 0px #4f29f0, -14px -8px 0 0px #4f29f0;
  }
}
</style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <p class="logo">مدیریت</p>
        <ul>
        <li><a href="./index.php"><span class="icon">&#128153;</span><span class="text">خانه</span></a></li>
            <li><a href="./barname.php"><span class="icon">&#128197;</span><span class="text">برنامه‌ها</span></a></li>
            <li><a href="./azmonch.php"><span class="icon">&#128221;</span><span class="text">آزمون‌ها</span></a></li>
            <li><a href="./karname2.php"><span class="icon">&#127891;</span><span class="text">کارنامه‌ها</span></a></li>
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
            <div class="study_schedule">
                    <h2 style="text-align:center">برنامه های مطالعاتی</h2>
                <div id="checklist" >
                    <input checked="" value="1" name="r" type="checkbox" id="01">
                    <label for="01">مطالعه شیمی</label>
                    <input value="2" name="r" type="checkbox" id="02">
                    <label for="02">مرور نکات زبان </label>
                    <input value="3" name="r" type="checkbox" id="03">
                    <label for="03">تمرین سوالات ریاضی </label>
                    <input value="4" name="r" type="checkbox" id="04">
                    <label for="04">تست عربی و دینی و فارسی </label>
                    <input value="5" name="r" type="checkbox" id="05">
                    <label for="05">مرور زیست برای امتحان  </label>
                </div>
                </div>

                <br>


              <h2 style="text-align:center">برنامه هفتگی </h2>
                <div class="schedule-table">
                    <table class="table bg-white">
                        <thead>
                            <tr style=" background: #891fd5;">
                                <th>زمان</th>
                                <th>ساعت 10 الی 12 </th>
                                <th>ساعت 12 الی 14 </th>
                                <th>ساعت 16 الی 19 </th>
                                <th>ساعت 20 الی 22 </th>
                                <th class="last">ساعت 23 الی 23:30 </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="day">شنبه</td>
                                <td class="active">
                                    <h4> زبان</h4>
                                </td>
                                
                                <td class="active">
                                    <h4>شیمی</h4>
                                   
                                </td>
                                <td class="active">
                                    <h4>ریاضی</h4>
                                    
                                  
                                </td>
                                <td class="active">
                                    <h4>فیزیک</h4>
                                   
                                </td>
                                <td class="active">
                                    <h4>تجارت</h4>
                                   
                                </td>
                                
                            </tr>
                            <tr>
                            <td class="day">یکشنبه</td>
                                <td class="active">
                                    <h4>زبان</h4>
                                <td class="active">
                                    <h4>فیزیک</h4>
                                   
                                </td>
                                <td class="active">
                                    <h4>شبکه</h4>
                                   
                                </td>
                                <td class="active">
                                    <h4>استراحت</h4>
                                <td class="active">
                                    <h4>شیمی</h4>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td class="day">دوشنبه</td>
                                <td class="active">
                                    <h4>برنامه نویسی</h4>
                                    
                                </td>
                                <td class="active">
                                    <h4>اندیشه</h4>
                                    <td class="active">
                                    <h4>استراحت</h4>
                                <td class="active">
                                    <h4>وب</h4>
                                   
                                </td>
                                <td class="active">
                                    <h4>استراحت</h4>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="day">سه شنبه</td>
                                <td class="active">
                                    <h4>دینی</h4>
                                  
                                  
                                </td>
                                <td class="active">
                                    <h4>زبان</h4>
                                <td class="active">
                                    <h4>ریاضی</h4>
                                   
                                </td>
                                <td class="active">
                                    <h4>مدار منطقی</h4>
                                <td class="active">
                                    <h4>فارسی</h4>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td class="day">چهارشنبه</td>
                                <td class="active">
                                    <h4>استراحت
                                    </h4>
                                   
                                   
                                </td>
                                <td class="active">
                                    <h4>وب</h4>
                                   
                                   
                                </td>
                                <td class="active">
                                    <h4>استراحت</h4>
                                <td class="active">
                                    <h4> فیزیک</h4>
                                   
                                </td>
                                <td class="active">
                                    <h4>شیمی</h4>
                            </tr>
                            <tr>
                                <td class="day">پنج شنبه</td>
                                <td class="active">
                                    <h4>عربی</h4>
                                    
                                </td>
                                <td class="active">
                                    <h4>مدیریت خانواده</h4></td>
                                <td class="active">
                                    <h4> شبکه</h4></td>
                                 
                                </td>
                                <td class="active">
                                    <h4>استراحت</h4></td>
                                <td class="active">
                                    <h4>شیمی</h4>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td class="day">جمعه</td>
                                
                                <td class="active">
                                    <h4>پایگاه داده</h4>
                                 
                                   
                                </td>
                                <td class="active">
                                    <h4>ساختمان داده</h4>
                                  
                                    
                                </td>
                                <td class="active">
                                    <h4>استراحت</h4></td>
                                    <td class="active">
                                    <h4>استراحت</h4></td>
                                    <td class="active">
                                    <h4>استراحت</h4></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('content').classList.toggle('open');
        });

        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    if (this.checked) {
                        this.parentNode.style.backgroundColor = '#c8e6c9';
                    } else {
                        this.parentNode.style.backgroundColor = '#e9e9e9';
                    }
                });
            });
        });

    </script>
</body>

</html>