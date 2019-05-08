<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="theme-color" content="">
    <title>School Name | Admin</title>
    <link rel="icon" href="../images/head-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Changa|Markazi+Text" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <header>
        <div class="start">
            <i class="fas fa-bars"></i>
            <h2>مدرسة الصفا الخاصة</h2>
        </div>
        <div class="end">
            <i class="fas fa-bell notifications"></i>
            <div class="user">
                <div class="image">
                    <img src="/images/avatars/1554815271_download.jpg" alt="Profile">
                </div>
                <h3>محمود الهربيطي</h3>
                <i class="fas fa-angle-down"></i>
            </div>
        </div>
        <ul class="notifications-menu">
            <a href=''>
                <li>اشعار جديد</li>
            </a>
            <a href=''>
                <li>اشعار جديد</li>
            </a>
        </ul>
        <ul class="user-menu">
            <a href='#'>
                <li>
                    <i class="fas fa-cog"></i>
                    الاعدادات
                </li>
            </a>
            <a href='#'>
                <li>
                    <i class="fas fa-door-open"></i>
                    تسجيل الخروج
                </li>
            </a>
        </ul>
    </header>
    <nav>
        <div class="top">
            <div>
                <img src="/images/avatars/1554815271_download.jpg" alt="Profile">
                <label for="files"><i class="fas fa-upload"></i></label>
                <input id="files" type="file" style='display: none'>
            </div>
            <h3>محمود الهربيطي</h3>
        </div>
        <div class="menu">
            <ul>
                <a href='index.html'>
                    <li class="active"><i class="fas fa-laptop"></i> لوحة التحكم</li>
                </a>
                <a href='messages.html'>
                    <li><i class="fas fa-comments"></i> الرسائل</li>
                </a>
                <a href='school-times.html'>
                    <li><i class="far fa-calendar-alt"></i> المواعيد الدراسية</li>
                </a>
                <a href='students.html'>
                    <li><i class="fas fa-user-graduate"></i> الطلاب</li>
                </a>
                <a href='{{ route('teachers.index') }}'>
                    <li><i class="fas fa-user-tie"></i> المدرسين</li>
                </a>
                <a href='workers.html'>
                    <li><i class="fas fa-users-cog"></i> العمال</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-user-check"></i> الحضور--طلاب--مدرسين</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-chalkboard-teacher"></i>الحصص</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-book"></i> الكتب الدراسية</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-boxes"></i> المخزون</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-user-edit"></i> الواجبات المنزلية</li>
                </a>
                <a href='#'>
                    <li><i class="far fa-edit"></i> الامتحانات</li>
                </a>
                <a href='#'>
                    <li><i class="far fa-check-square"></i> الدرجات</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-notes-medical"></i> التاريخ الطبي</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-calendar-day"></i> المناسبات--رحلات--مسابقات</li>
                </a>
                <a href='#'>
                    <li><i class="far fa-images"></i> مركز الصور</li>
                </a>
                <a href='#'>
                    <li><i class="fas icon-meeting"></i> الاجتماعات</li>
                </a>
                <a href='reports.html'>
                    <li><i class="far fa-file-alt"></i> التقارير</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-folder-open"></i> الملفات</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-clipboard-list"></i> لوحة الملاحظات</li>
                </a>
                <a href='fees.html'>
                    <li><i class="fas fa-dollar-sign"></i> الرسوم</li>
                </a>
                <a href='promotions.html'>
                    <li><i class="fas fa-level-up-alt"></i>الترقيات</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-sync-alt"></i> الموارد البشرية</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-id-card"></i> طلبات التوظيف</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-bus"></i> المواصلات المدرسية</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-bullhorn"></i> ابلاغ</li>
                </a>
            </ul>
        </div>
    </nav>
    <div class="dashboard">
        <section class="shortcuts">
            <div>
                <a href="students.html">
                    <i class="fas fa-user-graduate"></i>
                    <span>150</span>
                    <h3>الطلاب</h3>
                </a>
            </div>
            <div>
                <a href="teachers.html">
                    <i class="fas fa-user-tie"></i>
                    <span>110</span>
                    <h3>المدرسين</h3>
                </a>
            </div>
            <div>
                <a href="">
                    <i class="fas fa-user-check"></i>
                    <span>33</span>
                    <h3>الحضور</h3>
                </a>
            </div>
            <div>
                <a href="">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>18</span>
                    <h3>الحصص</h3>
                </a>
            </div>
        </section>
        <section class="brief">
            <div class="timetable">
                <a href="school-times.html"><i class="fas fa-cog"></i></a>
                <h2>المواعيد الدراسية</h2>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاحد</th>
                            <th>الاثنين</th>
                            <th>الثلاثاء</th>
                            <th>الاربعاء</th>
                            <th>الخميس</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/dashboard.js"></script>
</body>

</html>
