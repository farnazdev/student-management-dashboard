<?php
session_start();


if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit; 
}


include 'config.php'; 
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
    <link rel="stylesheet" href="./assets/vendor/animate/animate.css">

<link rel="stylesheet" href="./assets/css/bootstrap.css">

<link rel="stylesheet" href="./assets/css/icons.css">

<link rel="stylesheet" href="./assets/vendor/owl-carousel/css/owl.carousel.css">

<link rel="stylesheet" href="./assets/css/theme.css">

<link rel="stylesheet" href="./assets/css/fonts.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <p class="logo">مدیریت</p>
        <ul>
        <li><a href="./barname.php"><span class="icon">&#128153;</span><span class="text">خانه</span></a></li>
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
                    <img src="./img/<?php echo $user['profile_image']; ?>" alt="تصویر پروفایل">
                </div>
            </a>
        </div>

        <div class="page-banner home-banner">
      <div class="container h-100">
        <div class="row align-items-center h-100">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1 class="mb-4">موفقیت های بزرگ براساس انتخابات عالی ساخته شده اند</h1>
            <p class="text-lg mb-5">قوی ترین موتور رشدی که تا به حال برای خود ساخته اید را روشن کنید</p>

            <a href="#" class="btn btn-outline border text-secondary">اطلاعات بیشتر</a>
            <a href="#" class="btn btn-primary btn-split ml-2">تماشای ویدئو <div class="fab"><span class="mai-play"></span></div></a>
          </div>
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place">
              <img src="./assets/img/bg_image_1.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
 

  <main>
    <div class="page-section features">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
            <div class="d-flex flex-row">
              <div class="img-fluid mr-3">
                <img src="./assets/img/icon_pattern.svg" alt="">
              </div>
              <div class="text-right">
                <h5>مشاوره تحصیلی</h5>
                <p>مشاوره تحصیلی رایگان توسط مجربان آموزش و پرورش</p>
              </div>
            </div>
          </div>
  
          <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
            <div class="d-flex flex-row">
              <div class="img-fluid mr-3">
                <img src="./assets/img/icon_pattern.svg" alt="">
              </div>
              <div class="text-right">
                <h5>برنامه ریزی مطالعاتی</h5>
                <p>برنامه ریزی دقیق مطالعاتی به همراه جدول لیست کار ها</p>
              </div>
            </div>
          </div>
  
          <div class="col-md-6 col-lg-4 py-3 wow fadeInUp">
            <div class="d-flex flex-row">
              <div class="img-fluid mr-3">
                <img src="./assets/img/icon_pattern.svg" alt="">
              </div>
              <div class="text-right">
                <h5>آزمون های دوره ای</h5>
                <p>آزمون های دوره ای استاندارد به منظور بررسی وضعیت دانش آموز</p>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
    <div class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place text-center">
              <img src="./assets/img/bg_image_2.png" alt="" class="flip">
            </div>
          </div>
          <div class="col-lg-6 py-3 wow fadeInLeft text-right">
            <h2 class="title-section">
              ما تیم <span class="marked">پویا</span> از افراد خلاق هستیم
            </h2>
            <div class="divider"></div>
            <p>در این مدرسه افراد مجرب و توانمند شما را در مسیر تحقق اهدافتان همراهی خواهند کرد تا در مسیر رشد به شکوفایی برسید. </p>
            <div class="img-place mb-3">
              <img src="./assets/img/testi_image.png" alt="">
            </div>
            <a href="#" class="btn btn-primary">جزئیات بیشتر</a>
            <a href="#" class="btn btn-outline border ml-2">داستان های موفقیت</a>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
    <div class="page-section counter-section">
      <div class="container">
        <div class="row align-items-center text-center">
          <div class="col-lg-4">
            <p>سرمایه گذاری کل</p>
            <h2><span class="number" data-number="816278"></span> تومان</h2>
          </div>
          <div class="col-lg-4">
            <p>درآمد سالانه</p>
            <h2><span class="number" data-number="216422"></span> تومان</h2>
          </div>
          <div class="col-lg-4">
            <p>سهمیه رشد</p>
            <h2><span class="number" data-number="73"></span>%</h2>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
    <div class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 py-3 wow fadeInRight text-right">
            <h2 class="title-section">
              ما <span class="marked">آماده</span> ارائه بهترین خدمات به شما هستیم
            </h2>
            <div class="divider"></div>
            <p class="mb-5">تیم پویا با بهره گیری از تجارب، دانش و سرمایه گذاری در تلاش است با ارائه بهترین خدمات به دانش آموزان نسلی دانا، پر کار و پر تلاش بپروراند.</p>
            <a href="#" class="btn btn-primary">جزئیات بیشتر</a>
            
          </div>
          <div class="col-lg-6 py-3 wow zoomIn">
            <div class="img-place text-center">
              <img src="./assets/img/bg_image_3.png" alt="">
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
    <div class="page-section">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <div class="subhead">چرا ما را انتخاب کنید</div>
          <h2 class="title-section"><span class="marked">راحتی</span> شما اولویت ما است</h2>
          <div class="divider mx-auto"></div>
        </div>
  
        <div class="row mt-5 text-center">
          <div class="col-lg-4 py-3 wow fadeInUp">
            <div class="display-3"><span class="mai-shapes"></span></div>
            <h5>عملکرد بالا</h5>
            <p>تقویت حداکثری عملکرد دانش آموزان</p>
          </div>
          <div class="col-lg-4 py-3 wow fadeInUp">
            <div class="display-3"><span class="mai-shapes"></span></div>
            <h5>محیط دوستانه</h5>
            <p>محیطی دوستانه و سرشار از آرامش</p>
          </div>
          <div class="col-lg-4 py-3 wow fadeInUp">
            <div class="display-3"><span class="mai-shapes"></span></div>
            <h5>برنامه ریزی دقیق</h5>
            <p>عدم وجود بی نظمی و جلوگیری از گیج کنندگی</p>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
    <div class="page-section border-top">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <h2 class="title-section">باشگاه دانش آموزان</h2>
          <div class="divider mx-auto"></div>
        </div>
  
        <div class="row justify-content-center">
          <div class="col-12 col-lg-auto py-3 wow fadeInRight">
            <div class="card-pricing">
              <div class="header">
                <div class="price-icon"><span class="mai-people"></span></div>
                <div class="price-title">اعضا</div>
              </div>
              <div class="body py-3">
                <div class="price-tag">
                  <span class="currency">تومان</span>
                  <h2 class="display-4">30</h2>
                  <span class="period">/ماهانه</span>
                </div>
                <div class="price-info">
                  <p>برنامه ریزی کلی برای تمامی دانش آموزان به همراه جدول لیست کار ها</p>
                </div>
              </div>
              <div class="footer">
                <a href="#" class="btn btn-outline rounded-pill" style="background-color: #343a40;">انتخاب طرح</a>
              </div>
            </div>
          </div>
  
          <div class="col-12 col-lg-auto py-3 wow fadeInUp">
            <div class="card-pricing active">
              <div class="header">
                <div class="price-labled">بهترین</div>
                <div class="price-icon"><span class="mai-business"></span></div>
                <div class="price-title">اختصاصی</div>
              </div>
              <div class="body py-3">
                <div class="price-tag">
                  <span class="currency">تومان</span>
                  <h2 class="display-4">60</h2>
                  <span class="period">/ماهانه</span>
                </div>
                <div class="price-info">
                  <p>برنامه ریزی انفرادی و ایجاد هماهنگی بین والدین و فرزندان</p>
                </div>
              </div>
              <div class="footer">
                <a href="#" class="btn btn-outline rounded-pill">انتخاب طرح</a>
              </div>
            </div>
          </div>
  
          <div class="col-12 col-lg-auto py-3 wow fadeInLeft">
            <div class="card-pricing">
              <div class="header">
                <div class="price-icon"><span class="mai-rocket-outline"></span></div>
                <div class="price-title">والدین</div>
              </div>
              <div class="body py-3">
                <div class="price-tag">
                  <span class="currency">تومان</span>
                  <h2 class="display-4">90</h2>
                  <span class="period">/ماهانه</span>
                </div>
                <div class="price-info">
                  <p>مشاوره و بررسی عملکرد والدین به همراه برگذاری کلاس های آموزشی</p>
                </div>
              </div>
              <div class="footer">
                <a href="#" class="btn btn-outline rounded-pill" style="background-color: #343a40;">انتخاب طرح</a>
              </div>
            </div>
          </div>
          
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
    <div class="page-section bg-light">
      <div class="container">
        
        <div class="owl-carousel wow fadeInUp text-right" id="testimonials">
          <div class="item">
            <div class="row align-items-center">
              <div class="col-md-6 py-3">
                <div class="testi-image">
                  <img src="./assets/img/person/person_1.jpg" alt="">
                </div>
              </div>
              <div class="col-md-6 py-3">
                <div class="testi-content">
                  <p>
                    وی مهندس کامپیوتر ایرانی-آلمانی می باشد. متولد سال 1375 در شهر تهران است. فعالیت وی در بخش توسعه نرم افزاری و برنامه نویسی می باشد. از حرفه ای ترین مشاوران سازمان آموزش و پرورش با 5 جایزه بین المللی.
                  </p>
                  <div class="entry-footer">
                    <strong>علی موحدی</strong> &mdash; <span class="text-grey">مدیر عامل گروه Slurin</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
          <div class="item">
            <div class="row align-items-center">
              <div class="col-md-6 py-3">
                <div class="testi-image">
                  <img src="./assets/img/person/person_2.jpg" alt="">
                </div>
              </div>
              <div class="col-md-6 py-3">
                <div class="testi-content">
                  <p>
                    وی مهندس کامپیوتر ایرانی می باشد. متولد سال 1370 در شهر یزد است. فعالیت وی در بخش هوش مصنوعی و  علم داده می باشد. از حرفه ای ترین مشاوران سازمان آموزش و پرورش با 5 جایزه بین المللی.
                  </p>
                  <div class="entry-footer">
                    <strong>نیما شاهی</strong> &mdash; <span class="text-grey">مدیر عامل Letro</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
    <div class="page-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp text-right">
            <h2 class="title-section">در تماس باشید</h2>
            <div class="divider"></div>
            <p>انتقادات و پیشنهادات شما باعث دلگرمی تیم پویا می شود.</p>
  
            <ul class="contact-list">
              <li>
                <div class="icon"><span class="mai-map"></span></div>
                <div class="content">ایران ، تهران ، کریم خان</div>
              </li>
              <li>
                <div class="icon"><span class="mai-mail"></span></div>
                <div class="content">info@pooyateam.com</div>
              </li>
              <li>
                <div class="icon"><span class="mai-phone-portrait"></span></div>
                <div class="content">021 1122 3344 55</div>
              </li>
            </ul>
          </div>
          <div class="col-lg-6 py-3 wow fadeInUp text-right">
            <div class="subhead">تماس با ما</div>
            <h2 class="title-section">یک خط برای ما رها کنید</h2>
            <div class="divider"></div>
            
            <form action="#">
              <div class="py-2">
                <input type="text" class="form-control" placeholder="نام کامل">
              </div>
              <div class="py-2">
                <input type="text" class="form-control" placeholder="ایمیل">
              </div>
              <div class="py-2">
                <textarea rows="6" class="form-control" placeholder="پیام شما..."></textarea>
              </div>
              <button type="submit" class="btn btn-primary rounded-pill mt-4">ارسال پیام</button>
            </form>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
    <div class="page-section border-top">
      <div class="container">
        <div class="text-center wow fadeInUp">
          <div class="subhead">وبلاگ ما</div>
          <h2 class="title-section">آخرین <span class="marked">اخبار</span> ما را بخوانید</h2>
          <div class="divider mx-auto"></div>
        </div>
        <div class="row my-5 card-blog-row">
          <div class="col-md-6 col-lg-3 py-3 wow fadeInUp text-right">
            <div class="card-blog">
              <div class="header">
                <div class="entry-footer">
                  <div class="post-author">علی موحدی</div>
                  <a href="#" class="post-date">23 بهمن 1399</a>
                </div>
              </div>
              <div class="body">
                <div class="post-title"><a href="blog-single.html">مدیریت بازرگانی چیست؟</a></div>
              </div>
              <div class="footer">
                <a href="blog-single.html">مطالعه بیشتر <span class="mai-chevron-back text-sm"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 py-3 wow fadeInUp text-right">
            <div class="card-blog">
              <div class="header">
                <div class="avatar">
                  <img src="./assets/img/person/person_1.jpg" alt="">
                </div>
                <div class="entry-footer">
                  <div class="post-author">نیما شاهی</div>
                  <a href="#" class="post-date">23 بهمن 1399</a>
                </div>
              </div>
              <div class="body">
                <div class="post-title">هوش مصنوعی چیست؟</div>
                <div class="post-excerpt">تعریف مفاهیم اولیه هوش مصنوعی و آشنایی با زبان مطلب ...</div>
              </div>
              <div class="footer">
                مطالعه بیشتر <span class="mai-chevron-back text-sm"></span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 py-3 wow fadeInUp text-right">
            <div class="card-blog">
              <div class="header">
                <div class="avatar">
                  <img src="./assets/img/person/person_2.jpg" alt="">
                </div>
                <div class="entry-footer">
                  <div class="post-author">علی موحدی</div>
                  <a href="#" class="post-date">23 بهمن 1399</a>
                </div>
              </div>
              <div class="body">
                <div class="post-title">مدیریت بازرگانی چیست؟</div>
                <div class="post-excerpt">تعریف بازرگانی و شرح وظایف مدیریت بازرگانی ...</div>
              </div>
              <div class="footer">
                مطالعه بیشتر <span class="mai-chevron-back text-sm"></span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 py-3 wow fadeInUp text-right">
            <div class="card-blog">
              <div class="header">
                <div class="avatar">
                  <img src="./assets/img/person/person_3.jpg" alt="">
                </div>
                <div class="entry-footer">
                  <div class="post-author">دیبا ناصری</div>
                  <a href="#" class="post-date">23 بهمن 1399</a>
                </div>
              </div>
              <div class="body">
                <div class="post-title">علم داده چیست؟</div>
                <div class="post-excerpt">تعریف علم داده و بررسی اصطلاحات و عملکرد ...</div>
              </div>
              <div class="footer">
                مطالعه بیشتر <span class="mai-chevron-back text-sm"></span>
              </div>
            </div>
          </div>
        </div>
  
        <div class="text-center">
          <p href="blog.html" class="btn btn-outline-primary rounded-pill">بیشتر پیدا کن</p>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->
  
    <div class="page-section client-section">
      <div class="container-fluid">
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
          <div class="item wow zoomIn">
            <img src="./assets/img/clients/airbnb.png" alt="">
          </div>
          <div class="item wow zoomIn">
            <img src="./assets/img/clients/google.png" alt="">
          </div>
          <div class="item wow zoomIn">
            <img src="./assets/img/clients/stripe.png" alt="">
          </div>
          <div class="item wow zoomIn">
            <img src="./assets/img/clients/paypal.png" alt="">
          </div>
          <div class="item wow zoomIn">
            <img src="./assets/img/clients/mailchimp.png" alt="">
          </div>
        </div>
      </div> <!-- .container-fluid -->
    </div> <!-- .page-section -->
  </main>

  <footer class="page-footer text-right">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-3 py-3">
          <h3>مدرسه <span class="text-primary">پویا.</span></h3>
          <p>در کنار تیم توانمند پویا به اوج شکوفایی خود برسید</p>

          <p>pooyateam@mail.com</p>
          <p>021 1122 3344 5566</p>
        </div>
        <div class="col-lg-3 py-3">
          <h5>لینک های سریع</h5>
          <ul class="footer-menu">
            <p> چگونه کار می کند</p>
            <p>امنیت</p>
            <p>قیمت گذاری</p>
            <p>منابع</p>
            <p>گزارش اشکال</p>
          </ul>
        </div>
        <div class="col-lg-3 py-3">
          <h5>درباره ما</h5>
          <ul class="footer-menu">
            <p>درباره ما</p>
            <p>مشاغل</p>
            <p>تیم ما</p>
            <p>گواهینامه ها</p>
            <p>اخبار و مطبوعات</p>
          </ul>
        </div>
        <div class="col-lg-3 py-3">
          <h5>خبرنامه</h5>
          <form action="#">
            <input type="text" class="form-control" placeholder="ایمیل شما...">
          </form>

          <div class="sosmed-button mt-4">
            <span class="mai-logo-facebook-f"></span>
            <span class="mai-logo-twitter"></span>
            <span class="mai-logo-google"></span>
            <span class="mai-logo-linkedin"></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6 py-2">
          <p id="copyright">کلیه حقوق محفوظ است</p>
        </div>
        <div class="col-sm-6 py-2 text-left">
          <div class="d-inline-block px-3">
            <p>حریم خصوصی</p>
          </div>
          <div class="d-inline-block px-3">
            <p>تماس با ما</p>
          </div>
        </div>
      </div>
    </div> <!-- .container -->
  </footer> <!-- .page-footer -->


  <script src="./assets/js/jquery-3.5.1.min.js"></script>

  <script src="./assets/js/bootstrap.bundle.min.js"></script>

  <script src="./assets/vendor/wow/wow.min.js"></script>

  <script src="./assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

  <script src="./assets/vendor/waypoints/jquery.waypoints.min.js"></script>

  <script src="./assets/vendor/animateNumber/jquery.animateNumber.min.js"></script>

  <script src="./assets/js/google-maps.js"></script>

  <script src="./assets/js/theme.js"></script>
<script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('content').classList.toggle('open');
        });
    </script>

</body>
</html>


