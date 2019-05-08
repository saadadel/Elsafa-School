<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Current day -->
    <meta name="current_day" content="{{ $current_day }}">
    <!-- Current Month -->
    <meta name="current_month" content="{{ $current_month }}">
    <!-- Current Year -->
    <meta name="current_year" content="{{ $current_year }}">
    <title>{{ config('app.name', 'Laravel') }} | Admin</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="theme-color" content="">
    <title>School Name | Admin</title>
    <link rel="icon" href="../images/head-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Changa|Markazi+Text" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/jquery.calendar.min.css">
    <link rel="stylesheet" href="../css/teachers.css">
    <link rel="stylesheet" href="../css/reports.css">
    <!-- Toastr Notification -->
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">

    {{-- Sweet Alert --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
                    <li><i class="fas fa-laptop"></i> لوحة التحكم</li>
                </a>
                <a href='messages.html'>
                    <li><i class="fas fa-comments"></i> الرسائل</li>
                </a>
                <a href='school-times.html'>
                    <li><i class="far fa-calendar-alt"></i> المواعيد الدراسية</li>
                </a>
                <a href="{{ route('students.index') }}">
                    <li><i class="fas fa-user-graduate"></i> الطلاب</li>
                </a>
                <a href="{{ route('teachers.index') }}">
                    <li><i class="fas fa-user-tie"></i> المدرسين</li>
                </a>
                <a href='workers.html'>
                    <li><i class="fas fa-users-cog"></i> العمال</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-user-check"></i> الحضور--طلاب--مدرسين</li>
                </a>

                <a href='#'>
                    <li><i class="fas fa-book"></i> الكتب الدراسية</li>
                </a>

                <a href='#'>
                    <li><i class="fas fa-user-edit"></i>الواجبات المنزلية</li>
                </a>

                <a href='#'>
                    <li><i class="far fa-check-square"></i> الدرجات</li>
                </a>

                <a href='#'>
                    <li><i class="fas fa-calendar-day"></i> المناسبات--رحلات--مسابقات</li>
                </a>

                <a href='#'>
                    <li><i class="fas icon-meeting"></i> الاجتماعات</li>
                </a>
                <a>
                    <li class="active"><i class="far fa-file-alt"></i> التقارير</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-folder-open"></i> الملفات</li>
                </a>

                <a href="{{ route('fees') }}">
                    <li><i class="fas fa-dollar-sign"></i> الرسوم</li>
                </a>
                <a href="{{ route('promotions') }}">
                    <li><i class="fas fa-level-up-alt"></i>الترقيات</li>
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
        <section>
            <div class="reports-filter">
                <form method="post" action="{{ route('reports.generate') }}" target="_blank">
                    @csrf
                    <div class="section" >
                        <label>الفئة:</label>
                        <select name="section">
                            <option value="">-- اختار --</option>
                            <option value="teachers">المدرسين</option>
                            <option value="workers">العمال</option>
                            <option value="students">الطلاب</option>
                        </select>
                    </div>
                    <div class="hidden type">
                        <label>نوع التقرير:</label>
                        <select  name="type">
                            <option value="">-- اختار --</option>
                            <option value="all">الكل</option>
                            <option value="schoolrec">السجل المدرسي</option>
                            <option value="payment_receipt">وصولات المصاريف</option>
                            <option value="residence">الإقامة</option>
                            <option value="religion">الديانة</option>
                            <option value="stats">إحصائيات إجمالية</option>
                            <option value="seatsno">ارقام الجلوس</option>
                            <option value="seats">تغيير ارقام الجلوس و اللجان</option>
                        </select>
                    </div>
                    <div class="hidden religion_select">
                        <label>الديانة:</label>
                        <select  name="religion_select">
                            <option value="">-- اختار --</option>
                            <option value="مسلم">مسلم</option>
                            <option value="مسيحي">مسيحي</option>
                        </select>
                    </div>
                    <div class="hidden residence_status">
                        <label>حالة الإقامة:</label>
                        <select  name="residence_status">
                            <option value="">-- اختار --</option>
                            <option value="مقيم">مقيم</option>
                            <option value="عائد">عائد</option>
                            <option value="وافد">وافد</option>
                        </select>
                    </div>
                    <div class="hidden school_section">
                        <label>القسم:</label>
                        <select  name="school_section">
                            <option value="">-- الكل --</option>
                            <option value="عربي">عربي</option>
                            <option value="English">English</option>
                        </select>
                    </div>
                    <div class="hidden level">
                        <label>المرحلة الدراسية:</label>
                        <select name="level">
                            <option value="">-- الكل --</option>
                            <option value="الروضة">الروضة</option>
                            <option value="الإبتدائية">الإبتدائية</option>
                            <option value="الإعدادية">الإعدادية</option>
                            <option value="4الثانوية">الثانوية</option>
                        </select>
                    </div>
                    <div class="hidden level_name">
                        <label>الصف:</label>
                        <select name="level_name">
                            <option value="">-- الكل --</option>
                            <option value="الصف الاول">الصف الاول</option>
                            <option value="الصف الثاني">الصف الثاني</option>
                            <option value="الصف الثالث">الصف الثالث</option>
                            <option value="الصف الرابع">الصف الرابع</option>
                            <option value="الصف الخامس">الصف الخامس</option>
                            <option value="الصف السادس">الصف السادس</option>
                        </select>
                    </div>
                    <div class="hidden classroom">
                        <label>الفصل: </label>
                        <input type="text" name="classroom">
                    </div>
                    <div class="hidden academic_year">
                        <label>السنة الدراسية:</label>
                        <input type="text" name="academic_year" placeholder="2017/2018">
                    </div>    
                    
                    <br><br>
                        <input class="reportbutton" type="submit" value="تقرير">
                </form>
            </div>
            
        </section>
        
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/jquery.calendar.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/reports.js"></script>
    <script src="/js/toastr.min.js"></script>
    <script>
        @if (Session::has('success'))
            toastr.success(" {{ Session::get('success') }} ");
        @endif
        @if (Session::has('info'))
            toastr.info(" {{ Session::get('info') }} ");
        @endif
        @if (Session::has('error'))
            toastr.error(" {{ Session::get('error') }} ");
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                console.log('{{ $error }}');
            @endforeach
            toastr.error('البيانات غير صحيحة', 'لم يتم إضافة الطالب');
        @endif

    </script>
</body>

</html>
