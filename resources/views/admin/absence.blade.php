<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="theme-color" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>School Name | Admin</title>
    <link rel="icon" href="../images/head-icon.png">
    <link href="https://fonts.googleapis.com/css?family=Changa|Markazi+Text" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/teachers.css">
    <link rel="stylesheet" href="../css/promotions.css">
</head>

<body>
    <header>
        <div class="start">
            <i class="fas fa-bars"></i>
            <h2>اسم المدرسة</h2>
        </div>
        <div class="end">
            <i class="fas fa-bell notifications"></i>
            <div class="user">
                <div class="image">
                    <img src="../images/user.png" alt="Profile">
                </div>
                <h3>المدير</h3>
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
                <img src="../images/user.png" alt="Profile">
                <label for="files"><i class="fas fa-upload"></i></label>
                <input id="files" type="file" style='display: none'>
            </div>
            <h3>المدير</h3>
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
                    <li class="active"><i class="fas fa-level-up-alt"></i>الترقيات</li>
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
            <div class="select-type">
                <div class="type">
                    <label>الفئة: </label>
                    <select>
                        <option>-- اختار --</option>
                        <option value='teachers'>مدرسين</option>
                        <option value='students'>طلاب</option>
                        <option value='workers'>عمال</option>
                    </select>
                </div>
                <div class='hidden select-students'>
                    <label>السنة الدراسية: </label>
                    <select>
                        <option value="الكل">الكل</option>
                        <option value='الصف الاول الروضة'>الصف الاول الروضة</option>
                        <option value='الصف الثاني الروضة'>الصف الثاني الروضة</option>
                        <option value='الصف الاول الابتدائي'>الصف الاول الابتدائي</option>
                        <option value='الصف الثاني الابتدائي'>الصف الثاني الابتدائي</option>
                        <option value='الصف الثالث الابتدائي'>الصف الثالث الابتدائي</option>
                        <option value='الصف الثالث الابتدائي'>الصف الرابع الابتدائي</option>
                        <option value='الصف الثالث الابتدائي'>الصف الخامس الابتدائي</option>
                        <option value='الصف الثالث الابتدائي'>الصف الثالث الابتدائي</option>
                        <option value='الصف الاول الاعدادي'>الصف الاول الاعدادي</option>
                        <option value='الصف الثاني الاعدادي'>الصف الثاني الاعدادي</option>
                        <option value='الصف الثالث الاعدادي'>الصف الثالث الاعدادي</option>
                        <option value='الصف الاول الثانوي'>الصف الاول الثانوي</option>
                        <option value='الصف الثاني الثانوي'>الصف الثاني الثانوي</option>
                        <option value='الصف الثالث الثانوي'>الصف الثالث الثانوي</option>
                    </select>
                </div>
                <div class='hidden select-teachers'>
                    <label>الدرجة الحالية:</label>
                    <select>
                        <option value="الكل">الكل</option>
                        <option value="معلم اول">معلم اول</option>
                        <option value="مدير">مدير</option>
                        <option value='مشرف'>مشرف</option>
                    </select>
                </div>
            </div>
        </section>
        <section class="teachers hidden">
            <div class="chart">
                <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
            </div>
            <article class="first">
                <div>
                    <button class="filter-button">فلترة النتائج<i class="fas fa-filter"></i></button>
                </div>
                <div>
                    <button class="promotions-button">ترقية</button>
                </div>
            </article>
            <div class="filter">
                <label>البحث بـ: </label>
                <select>
                    <option value="1">الاسم</option>
                    <option value="2">الرقم القومي</option>
                    <option value="3">المادة</option>
                    <option value="4">الدرجة الحالية</option>
                </select>
                <input type="text" placeholder="بحث">
            </div>

            <div class="teachers-list">
                <div class="head">
                    <h4>#</h4>
                    <h4>الاسم</h4>
                    <h4>المادة</h4>
                    <h4>الهاتف</h4>
                    <h4>ارسال رسالة</h4>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="someone">
                            <h4 class="num"></h4>
                            <h4 class='name'>احمد محمد احمد محمد</h4>
                            <h4 class='subject'>عربي</h4>
                            <h4 class="phone">01112345678</h4>
                            <h4><i class="fab fa-telegram"></i></h4>
                            <label class="container" style="position: absolute;left: 35px;top: 10px;">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="info">
                            <form>
                                <div class="img">
                                    <img src="../images/user.png" alt="Profile">
                                    <label for="files"><i class="fas fa-upload"></i></label>
                                    <input id="files" type="file" style='display: none'>
                                </div>
                                <div class="details">
                                    <div>
                                        <b class="filter-1">
                                            <h3>الاسم: </h3><span data-class="name">احمد محمد احمد محمد</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-2">
                                            <h3>الرقم القومي: </h3><span>22222222223333</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b>
                                            <h3>الهاتف: </h3><span data-class="phone">01112345678</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-4">
                                            <h3>الدرجة الحالية: </h3><span data-class="subject">معلم اول</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-3">
                                            <h3>المادة: </h3><span data-class="subject">عربي</span>
                                        </b>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="someone">
                            <h4 class="num"></h4>
                            <h4 class='name'>احمد محمد احمد محمد</h4>
                            <h4 class='subject'>عربي</h4>
                            <h4 class="phone">01112345678</h4>
                            <h4><i class="fab fa-telegram"></i></h4>
                            <label class="container" style="position: absolute;left: 35px;top: 10px;">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="info">
                            <form>
                                <div class="img">
                                    <img src="../images/user.png" alt="Profile">
                                    <label for="files"><i class="fas fa-upload"></i></label>
                                    <input id="files" type="file" style='display: none'>
                                </div>
                                <div class="details">
                                    <div>
                                        <b class="filter-1">
                                            <h3>الاسم: </h3><span data-class="name">احمد محمد احمد محمد</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-2">
                                            <h3>الرقم القومي: </h3><span>22222222223333</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b>
                                            <h3>الهاتف: </h3><span data-class="phone">01112345678</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-4">
                                            <h3>الدرجة الحالية: </h3><span data-class="subject">مدير</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-3">
                                            <h3>المادة: </h3><span data-class="subject">عربي</span>
                                        </b>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="someone">
                            <h4 class="num"></h4>
                            <h4 class='name'>احمد محمد احمد محمد</h4>
                            <h4 class='subject'>عربي</h4>
                            <h4 class="phone">01112345678</h4>
                            <h4><i class="fab fa-telegram"></i></h4>
                            <label class="container" style="position: absolute;left: 35px;top: 10px;">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="info">
                            <form>
                                <div class="img">
                                    <img src="../images/user.png" alt="Profile">
                                    <label for="files"><i class="fas fa-upload"></i></label>
                                    <input id="files" type="file" style='display: none'>
                                </div>
                                <div class="details">
                                    <div>
                                        <b class="filter-1">
                                            <h3>الاسم: </h3><span data-class="name">احمد محمد احمد محمد</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-2">
                                            <h3>الرقم القومي: </h3><span>22222222223333</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b>
                                            <h3>الهاتف: </h3><span data-class="phone">01112345678</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-4">
                                            <h3>الدرجة الحالية: </h3><span data-class="subject">مشرف</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-3">
                                            <h3>المادة: </h3><span data-class="subject">عربي</span>
                                        </b>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="someone">
                            <h4 class="num"></h4>
                            <h4 class='name'>احمد محمد احمد محمد</h4>
                            <h4 class='subject'>عربي</h4>
                            <h4 class="phone">01112345678</h4>
                            <h4><i class="fab fa-telegram"></i></h4>
                            <label class="container" style="position: absolute;left: 35px;top: 10px;">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="info">
                            <form>
                                <div class="img">
                                    <img src="../images/user.png" alt="Profile">
                                    <label for="files"><i class="fas fa-upload"></i></label>
                                    <input id="files" type="file" style='display: none'>
                                </div>
                                <div class="details">
                                    <div>
                                        <b class="filter-1">
                                            <h3>الاسم: </h3><span data-class="name">احمد محمد احمد محمد</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-2">
                                            <h3>الرقم القومي: </h3><span>22222222223333</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b>
                                            <h3>الهاتف: </h3><span data-class="phone">01112345678</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-4">
                                            <h3>الدرجة الحالية: </h3><span data-class="subject">مدير</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-3">
                                            <h3>المادة: </h3><span data-class="subject">عربي</span>
                                        </b>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="someone">
                            <h4 class="num"></h4>
                            <h4 class='name'>احمد محمد احمد محمد</h4>
                            <h4 class='subject'>عربي</h4>
                            <h4 class="phone">01112345678</h4>
                            <h4><i class="fab fa-telegram"></i></h4>
                            <label class="container" style="position: absolute;left: 35px;top: 10px;">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="info">
                            <form>
                                <div class="img">
                                    <img src="../images/user.png" alt="Profile">
                                    <label for="files"><i class="fas fa-upload"></i></label>
                                    <input id="files" type="file" style='display: none'>
                                </div>
                                <div class="details">
                                    <div>
                                        <b class="filter-1">
                                            <h3>الاسم: </h3><span data-class="name">احمد محمد احمد محمد</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-2">
                                            <h3>الرقم القومي: </h3><span>22222222223333</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b>
                                            <h3>الهاتف: </h3><span data-class="phone">01112345678</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-4">
                                            <h3>الدرجة الحالية: </h3><span data-class="subject">مشرف</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-3">
                                            <h3>المادة: </h3><span data-class="subject">عربي</span>
                                        </b>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="someone">
                            <h4 class="num"></h4>
                            <h4 class='name'>احمد محمد احمد محمد</h4>
                            <h4 class='subject'>عربي</h4>
                            <h4 class="phone">01112345678</h4>
                            <h4><i class="fab fa-telegram"></i></h4>
                            <label class="container" style="position: absolute;left: 35px;top: 10px;">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="info">
                            <form>
                                <div class="img">
                                    <img src="../images/user.png" alt="Profile">
                                    <label for="files"><i class="fas fa-upload"></i></label>
                                    <input id="files" type="file" style='display: none'>
                                </div>
                                <div class="details">
                                    <div>
                                        <b class="filter-1">
                                            <h3>الاسم: </h3><span data-class="name">احمد محمد احمد محمد</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-2">
                                            <h3>الرقم القومي: </h3><span>22222222223333</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b>
                                            <h3>الهاتف: </h3><span data-class="phone">01112345678</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-4">
                                            <h3>الدرجة الحالية: </h3><span data-class="subject">مدير</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-3">
                                            <h3>المادة: </h3><span data-class="subject">عربي</span>
                                        </b>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="someone">
                            <h4 class="num"></h4>
                            <h4 class='name'>احمد محمد احمد محمد</h4>
                            <h4 class='subject'>عربي</h4>
                            <h4 class="phone">01112345678</h4>
                            <h4><i class="fab fa-telegram"></i></h4>
                            <label class="container" style="position: absolute;left: 35px;top: 10px;">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="info">
                            <form>
                                <div class="img">
                                    <img src="../images/user.png" alt="Profile">
                                    <label for="files"><i class="fas fa-upload"></i></label>
                                    <input id="files" type="file" style='display: none'>
                                </div>
                                <div class="details">
                                    <div>
                                        <b class="filter-1">
                                            <h3>الاسم: </h3><span data-class="name">احمد محمد احمد محمد</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-2">
                                            <h3>الرقم القومي: </h3><span>22222222223333</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b>
                                            <h3>الهاتف: </h3><span data-class="phone">01112345678</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-4">
                                            <h3>الدرجة الحالية: </h3><span data-class="subject">مشرف</span>
                                        </b>
                                    </div>
                                    <div>
                                        <b class="filter-3">
                                            <h3>المادة: </h3><span data-class="subject">عربي</span>
                                        </b>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="students hidden">
            <div class="chart">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
            <article class="first">
                <div>
                    <button class="filter-button">فلترة النتائج<i class="fas fa-filter"></i></button>
                </div>
                <div>
                    <button class="promotions-button">ترقية</button>
                </div>
            </article>
            <article class="first" style="justify-content: flex-end;">
                <label class="container">
                    اختيار الكل
                    <input type="checkbox" class="select-all">
                    <span class="checkmark"></span>
                </label>
                
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
                    <h4>المرحلة الدراسية</h4>
                    <h4>الهاتف</h4>
                    <h4>ارسال رسالة</h4>
                </div>
                <div class="body">
                    @foreach ($students as $student)
                        <div class="row" data-student="{{ $student->id }}">
                            <div class="someone">
                                <h4 class="num"></h4>
                                <h4 class='name'>{{ $student->name }}</h4>
                                <h4 class='subject'>{{ $student->stage_year }} {{ $student->stage }}</h4>
                                <h4 class="phone">{{ $student->phone }}</h4>
                                <h4><i class="fab fa-telegram"></i></h4>
                                <label class="container" style="position: absolute;left: 35px;top: 10px;">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="info">
                                <form>
                                    <div class="img">
                                        <img src="../images/user.png" alt="Profile">
                                        <label for="files"><i class="fas fa-upload"></i></label>
                                        <input id="files" type="file" style='display: none'>
                                    </div>
                                    <div class="details">
                                        <div>
                                            <b class="filter-1">
                                                <h3>الاسم: </h3><span data-class="name">{{ $student->name }}</span>
                                            </b>
                                        </div>
                                        <div>
                                            <b class="filter-2">
                                                <h3>الرقم القومي: </h3><span>{{ $student->national_id }}</span>
                                            </b>
                                        </div>
                                        <div>
                                            <b>
                                                <h3>الهاتف: </h3><span data-class="phone">{{ $student->phone }}</span>
                                            </b>
                                        </div>
                                        <div>
                                            <b class="filter-3">
                                                <h3 data-school-year=''>السنة الدراسية: </h3><span data-class='subject'>{{ $student->stage_year }} {{ $student->stage }}</span>
                                            </b>
                                            <input type='text'>
                                        </div>
                                        <div>
                                            <b class="filter-4">
                                                <h3>الفصل: </h3><span>{{ $student->classroom }}</span>
                                            </b>
                                            <input type='text'>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/promotions.js"></script>
    <script src="../js/jquery.calendar.js"></script>
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
