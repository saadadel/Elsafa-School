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
    <link rel="icon" href="../images/head-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Changa|Markazi+Text" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/jquery.calendar.min.css">
    <link rel="stylesheet" href="../css/teachers.css">
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
                <a>
                    <li class="active"><i class="fas fa-user-graduate"></i> الطلاب</li>
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
                <a href="{{ route('reports') }}">
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
                <a href="{{ route('promotions') }}">
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
        <section>
            <div class="chart">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
        </section>
        <section class="teachers">
            <article class="first">
                <div>
                    <button class="filter-button">فلترة النتائج<i class="fas fa-filter"></i></button>
                </div>
                <div>
                    <button class="add-button">اضافة طالب</button>
                </div>
            </article>
            <div class="filter">
                <label>البحث بـ: </label>
                <select>
                    <option value="1">الاسم</option>
                    <option value="2">الرقم القومي</option>
                    <option value="3">السنة الدراسية</option>
                    <option value="4">الفصل</option>
                </select>
                <input type="text" placeholder="بحث">
            </div>
            <div class="teachers-list">
                <div class="head">
                    <h4>#</h4>
                    <h4>الاسم</h4>
                    <h4>السنة الدراسية</h4>
                    <h4>الهاتف</h4>
                    <h4>مسح</h4>
                </div>
                <div class="body">
                    @foreach ($students as $student)
                        <div data-student="{{ $student->id }}" class="absence_days">
                            @foreach ($student->absence as $absence)
                                <div data-absence="{{ $absence->date }}"></div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="someone">
                                <h4 class="num" data-student="{{ $student->id }}">{{ $student->id }}</h4>
                                <h4 class='name'>{{ $student->name }}</h4>
                                <h4 class='subject'>{{ $student->level->name }} {{ $student->level->level }}</h4>
                                <h4 class="phone">{{ $student->phone }}</h4>
                                <h4><i class=""></i></h4>
                                <i class="far fa-trash-alt delbutton"></i>
                            </div>
                            <div class="info">
                                <form id="student_image" method="post" action="{{ route('students.update', ['id' => $student->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="img">
                                        <img src="{{ $student->avatar }}" alt="Profile">
                                        <label><input type="file" name="image_file" style='display: none'><i class="fas fa-upload"></i></label>
                                        <input class="upload" type="submit" value="رفع">
                                    </div>
                                    <div class="details" data-student="{{ $student->id }}">
                                        <div data-attribute="name">
                                            <b class="filter-1">
                                                <h3>الاسم: </h3><span data-class="name">{{ $student->name }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="gender">
                                            <b>
                                                <h3>الحالة الاجتماعية: </h3><span>{{ $student->gender }}</span>
                                            </b>
                                            <select class='hidden-edit'>
                                                <option>ذكر</option>
                                                <option>انثى</option>
                                            </select>
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="birthdate">
                                            <b>
                                                <h3>تاريخ الميلاد: </h3><span>{{ $student->birthdate }}</span>
                                            </b>
                                            <input type='date' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div>
                                            <b>
                                                <h3>العمر: </h3><span>{{ $student->age }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                        </div>
                                        <div data-attribute="nationality">
                                            <b>
                                                <h3>الجنسية: </h3><span>{{ $student->nationality }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="residence_status">
                                            <b>
                                                <h3>حالة الاقامة: </h3><span>{{ $student->residence_status }}</span>
                                            </b>
                                            <select class='hidden-edit'>
                                                <option>مقيم</option>
                                                <option>عائد</option>
                                                <option>وافد</option>
                                            </select>
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="national_id">
                                            <b class="filter-2">
                                                <h3>الرقم القومي: </h3><span>{{ $student->national_id }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="birthcertificate_enrollment_no">
                                            <b>
                                                <h3>رقم القيد بشهادة الميلاد: </h3><span>{{ $student->birthcertificate_enrollment_no }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="phone">
                                            <b>
                                                <h3>الهاتف: </h3><span data-class="phone">{{ $student->phone }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="email">
                                            <b>
                                                <h3>البريد الالكتروني: </h3><span>{{ $student->email }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="religion">
                                            <b>
                                                <h3>الديانة: </h3><span>{{ $student->religion }}</span>
                                            </b>
                                            <select class='hidden-edit'>
                                                <option>مسلم</option>
                                                <option>مسيحي</option>
                                            </select>
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        
                                        <div data-attribute="building_num">
                                            <b>
                                                <h3>رقم المنزل: </h3><span data-class='subject'>{{ $student->building_num }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="st_name">
                                            <b>
                                                <h3>اسم الشارع: </h3><span data-class='subject'>{{ $student->st_name }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="region">
                                            <b>
                                                <h3>المنطقة: </h3><span data-class='subject'>{{ $student->region }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="city">
                                            <b>
                                                <h3>المدينة: </h3><span data-class='subject'>{{ $student->city }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>

                                        <div data-attribute="the_health">
                                            <b>
                                                <h3>الصحة: </h3><span data-class='subject'>{{ $student->the_health }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="level">
                                            <b>
                                                <h3>المرحلة الدراسية: </h3><span data-class='subject'>{{ $student->level->level }}</span>
                                            </b>
                                            <select class="stage hidden-edit">
                                                <option>الروضة</option>
                                                <option>الإبتدائية</option>
                                                <option>الإعدادية</option>
                                                <option>الثانوية</option>
                                            </select>
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="level_name">
                                            <b>
                                                <h3>السنة: </h3><span data-class='subject'>{{ $student->level->name }}</span>
                                            </b>
                                            <select class="hidden-edit">
                                                <option>الصف الاول</option>
                                                <option>الصف الثاني</option>
                                                <option>الصف الثالث</option>
                                                <option>الصف الرابع</option>
                                                <option>الصف الخامس</option>
                                                <option>الصف السادس</option>
                                            </select>
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="classroom">
                                            <b class="filter-4">
                                                <h3>الفصل: </h3><span>{{ $student->classroom }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="section">
                                            <b>
                                                <h3>القسم: </h3><span>{{ $student->section }}</span>
                                            </b>
                                            <select class='hidden-edit'>
                                                <option>عربي</option>
                                                <option>English</option>
                                            </select>
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="enrollment_status">
                                            <b>
                                                <h3>حالة القيد: </h3><span>{{ $student->enrollment_status }}</span>
                                            </b>
                                            <select class='hidden-edit'>
                                                <option>مستجد</option>
                                                <option>وافد</option>
                                                <option>باق</option>
                                            </select>
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="school_enrollment_date">
                                            <b>
                                                <h3>تاريخ دخول المدرسة: </h3><span>{{ $student->school_enrollment_date }}</span>
                                            </b>
                                            <input type='date' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="academic_year">
                                            <b class="filter-3">
                                                <h3>السنة الدراسية: </h3><span>{{ $student->academic_year }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        
                                        <div data-attribute="monthly_evaluation">
                                            <b>
                                                <h3>التقييم الشهري: </h3>%<span>{{ $student->monthly_evaluation }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        
                                        
                                        <div>
                                            <b>
                                                <h3><a href="" class="attendance-btn">الحضور: </a></h3>
                                            </b>
                                        </div>
                                        <div>
                                            <b>
                                                <h3>الشهر الحالي: </h3><span>{{ $student->month_attendence }}%</span>
                                            </b>
                                        </div>
                                        <div>
                                            <b>
                                                <h3>الحضور الكلي: </h3><span>{{ $student->total_attendence }}%</span>
                                            </b>
                                        </div>
                                        
                                        <div data-attribute="parent_name">
                                            <b>
                                                <h3>ولي الامر: </h3><span>{{ $student->parent_name }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="parent_job">
                                            <b>
                                                <h3>الوظيفة: </h3><span>{{ $student->parent_job }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="parent_national_id">
                                            <b>
                                                <h3>الرقم القومي: </h3><span>{{ $student->parent_national_id }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="parent_phone">
                                            <b>
                                                <h3>الهاتف: </h3><span>{{ $student->parent_phone }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="parent_email">
                                            <b>
                                                <h3>البريد الالكتروني: </h3><span>{{ $student->parent_email }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="parent_social_status">
                                            <b>
                                                <h3>الحالة الاجتماعية: </h3><span>{{ $student->parent_social_status }}</span>
                                            </b>
                                            <select class='hidden-edit'>
                                                <option>متزوج</option>
                                                <option>اعزب</option>
                                                <option>ارمل</option>
                                                <option>مطلق</option>
                                            </select>
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="parent_qualification">
                                            <b>
                                                <h3>المؤهل: </h3><span>{{ $student->parent_qualification }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        
                                        <div data-attribute="fees">
                                            <b>
                                                <h3><a href="#" class="fees-btn">الرسوم: </a></h3><span>{{ $student->fees }}</span>
                                            </b>
                                            <select class='hidden-edit'>
                                                <option>تم الدفع</option>
                                                <option>اقساط</option>
                                                <option>لم يتم الدفع</option>
                                            </select>
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    <div class="modal add-teacher">
        <div>
            <i class="fas fa-times"></i>
            <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="img">
                    <img src="../images/user.png" alt="Profile">
                    <label><input name="avatar" type="file" style='display: none'><i class="fas fa-upload"></i></label>
                    
                </div>
                <div class="add-details">
                    <div>
                        <label>الاسم: </label>
                        <input type='text' name="name">
                    </div>
                    <div>
                        <label>النوع: </label>
                        <select name="gender">
                            <option value="">-- اختار --</option>
                            <option value="ذكر">ذكر</option>
                            <option value="انثى">انثى</option>
                        </select>
                    </div>
                    <div>
                        <label>تاريخ الميلاد: </label>
                        <input type='date' name="birthdate">
                    </div>
                    <div>
                        <label>الجنسية: </label>
                        <input type='text' name="nationality">
                    </div>
                    <div>
                        <label>حالة الإقامة: </label>
                        <select name="residence_status">
                            <option value="مقيم" selected>مقيم</option>
                            <option value="عائد">عائد</option>
                            <option value="وافد">وافد</option>
                        </select>
                    </div>
                    <div>
                        <label>الرقم القومي: </label>
                        <input type='text' name="national_id">
                    </div>
                    <div>
                        <label>رقم القيد بشهادة الميلاد: </label>
                        <input type='text' name="birthcertificate_enrollment_no">
                    </div>
                    <div>
                        <label>الهاتف: </label>
                        <input type='text' name="phone">
                    </div>
                    <div>
                        <label>البريد الالكتروني: </label>
                        <input type='text' name="email">
                    </div>
                    <div>
                        <label>الديانة: </label>
                        <select name="religion">
                            <option value="مسلم" selected>مسلم</option>
                            <option value="مسيحي">مسيحي</option>
                        </select>
                    </div>

                    <div>
                        <label>العنوان: </label>
                        <input type='text' name="building_num" placeholder="رقم المنزل">
                        <input type='text' name="st_name" placeholder="إسم الشارع">
                        <input type='text' name="region" placeholder="المنطقة">
                        <input type='text' name="city" placeholder="المدينة">
                    </div>
                    <div>
                        <label>الصحة: </label>
                        <input type='text' name="the_health" placeholder="مثال: بولاق الدكرور">
                    </div>
                    
                    <div>
                        <label>المرحلة: </label>
                        <select class="stage" name="level">
                            <option value="">-- اختار --</option>
                            <option value="1">الروضة</option>
                            <option value="2">الإبتدائية</option>
                            <option value="3">الإعدادية</option>
                            <option value="4">الثانوية</option>
                        </select>
                        <select class="hide-select select-1" name="level_name">
                            <option value="1">الصف الاول</option>
                            <option value="2">الصف الثاني</option>
                        </select>
                        <select class="hide-select select-2" name="level_name">
                            <option value="1">الصف الاول</option>
                            <option value="2">الصف الثاني</option>
                            <option value="3">الصف الثالث</option>
                            <option value="4">الصف الرابع</option>
                            <option value="5">الصف الخامس</option>
                            <option value="6">الصف السادس</option>
                        </select>
                        <select class="hide-select select-3" name="level_name">
                            <option value="1">الصف الاول</option>
                            <option value="2">الصف الثاني</option>
                            <option value="3">الصف الثالث</option>
                        </select>
                        <select class="hide-select select-4" name="level_name">
                            <option value="1">الصف الاول</option>
                            <option value="2">الصف الثاني</option>
                            <option value="3">الصف الثالث</option>
                        </select>
                    </div>
                    <div>
                        <label>القسم: </label>
                        <select name="section">
                            <option value="عربي" selected>عربي</option>
                            <option value="English">English</option>
                        </select>
                    </div>
                    <div>
                        <label>حالة القيد: </label>
                        <select name="enrollment_status">
                            <option value="مستجد" selected>مستجد</option>
                            <option value="منقول">منقول</option>
                            <option value="باق">باق</option>
                        </select>
                    </div>
                    <div>
                        <label>تاريخ دخول المدرسة: </label>
                        <input type='date' name="school_enrollment_date">
                    </div>
                    <div>
                        <label>السنة الدراسية: </label>
                        <input type='text' name="academic_year">
                    </div>
                    <div>
                        <label>الفصل: </label>
                        <input type='text' name="classroom">
                    </div>
                    <div>
                        <label>التقييم الشهري: </label>
                        <input type='text' name="monthly_evaluation">
                    </div>
                    <div>
                        <label>ولي الامر: </label>
                        <input type='text' name="parent_name">
                    </div>
                    <div>
                        <label>الوظيفة: </label>
                        <input type='text' name="parent_job">
                    </div>
                    <div>
                        <label>الرقم القومي: </label>
                        <input type='text' name="parent_national_id">
                    </div>
                    <div>
                        <label>الهاتف: </label>
                        <input type='text' name="parent_phone">
                    </div>
                    <div>
                        <label>البريد الالكتروني: </label>
                        <input type='text' naem="parent_email">
                    </div>
                    
                    <div>
                        <label>الحالة الاجتماعية: </label>
                        <select name="parent_social_status">
                            <option value="">-- اختار --</option>
                            <option value="أعزب">أعزب</option>
                            <option value="متزوج">متزوج</option>
                            <option value="مطلق">مطلق</option>
                            <option value="أرمل">أرمل</option>
                        </select>
                    </div>
                    <div>
                        <label>المؤهل: </label>
                        <input type='text' name="parent_qualification">
                    </div>
                    <div>
                        <label>الرسوم: </label>
                        <select name="fees">
                            <option value="تم الدفع">تم الدفع</option>
                            <option value="اقساط">اقساط</option>
                            <option value="لم يتم الدفع">لم يتم الدفع</option>
                        </select>
                    </div>
                    <div></div>
                    <div>
                        <input type="submit" value="اضافة">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="fees-modal">
        <article style="position: relative;height: 50%;right: -60px;top: -40px;">
            <i class="fas fa-times" style="color: #ffffff;text-shadow: 0 0 5px #000"></i>
        </article>
        <div>
            <h2>تفاصيل دفع الرسوم</h2>
            <table>
                <thead>
                    <tr>
                        <th>رقم الوصل</th>
                        <th>التاريخ</th>
                        <th>القيمة</th>
                        <th>طريقة الدفع</th>
                        <th>المتبقي</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <td>123445</td>
                        <td>10000</td>
                        <td>2000</td>
                        <td>3-3-2019</td>
                        <td>اقساط</td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
    <div class="attendance-modal">
        <article style="position: relative;height: 50%;right: -60px;top: -40px;">
            <i class="fas fa-times" style="color: #ffffff;text-shadow: 0 0 5px #000"></i>
        </article>
        <div class="set-calender"></div>
        <form id="absence_submit">
            <input type="submit" value='حسناّ'>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/jquery.calendar.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/students.js"></script>
    <script src="/js/toastr.min.js"></script>
    <script>
        @if (Session::has('success'))
            toastr.success(" {{ Session::get('success') }} ");
        @endif
        @if (Session::has('info'))
            toastr.info(" {{ Session::get('info') }} ");
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
