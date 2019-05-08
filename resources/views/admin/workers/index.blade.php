<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="theme-color" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Current day -->
    <meta name="current_day" content="{{ $current_day }}">
    <!-- Current Month -->
    <meta name="current_month" content="{{ $current_month }}">
    <!-- Current Year -->
    <meta name="current_year" content="{{ $current_year }}">
    <title>{{ config('app.name', 'Laravel') }} | Admin</title>
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

                <a href='school-times.html'>
                    <li><i class="far fa-calendar-alt"></i> المواعيد الدراسية</li>
                </a>
                <a href="{{ route('students.index') }}">
                    <li><i class="fas fa-user-graduate"></i> الطلاب</li>
                </a>
                <a href="{{ route('teachers.index') }}">
                    <li class="active"><i class="fas fa-user-tie"></i> المدرسين</li>
                </a>
                <a>
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
                    <li><i class="fas fa-user-edit"></i> الواجبات المنزلية</li>
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
                    <li><i class="fas icon-meeting"></i> الاجتماعات</li>
                </a>
                <a href="{{ route('reports') }}">
                    <li><i class="far fa-file-alt"></i> التقارير</li>
                </a>
                <a href='#'>
                    <li><i class="fas fa-folder-open"></i> الملفات</li>
                </a>

                <a href='fees.html'>
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
            <div class="chart">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
        </section>
        <section class="workers">
            <article class="first">
                <div>
                    <button class="expenses-button">المصروفات</button>
                </div>
                <div>
                    <button class="filter-button">فلترة النتائج<i class="fas fa-filter"></i></button>
                    <button class="add-button">اضافة عامل</button>
                </div>
            </article>
            <div class="filter">
                <label>البحث بـ: </label>
                <select>
                    <option value="1">الاسم</option>
                    <option value="2">الرقم القومي</option>
                    <option value="3">الوظيفة</option>
                </select>
                <input type="text" placeholder="بحث">
            </div>
            <div class="control">
                <h2>مصروفات العمال</h2>
                <form>
                    <div>
                        <label>خصم للكل: </label>
                        <input type="number" placeholder="القيمة" class='pay-cut'>
                    </div>
                    <div>
                        <label>مكافأة للكل: </label>
                        <input type="number" placeholder="القيمة" class='bonus'>
                    </div>
                    <div>
                        <label>علاوة للكل: </label>
                        <input type="number" placeholder="القيمة" class='yearly-bonus'>
                    </div>
                    <div style="width: 100%;margin-top: 20px">
                        <input type="submit" value="تطبيق" class="done">
                    </div>
                </form>
            </div>
            <div class="teachers-list">
                <div class="head">
                    <h4>#</h4>
                    <h4>الاسم</h4>
                    <h4>الوظيفة</h4>
                    <h4>الهاتف</h4>
                    <h4>مسح</h4>
                </div>
                <div class="body">
                    @foreach ($workers as $worker)
                        <div data-worker="{{ $worker->id }}" class="absence_days">
                            @foreach ($worker->absence as $absence)
                                <div data-absence="{{ $absence->date }}"></div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="someone">
                                <h4 class="num" data-worker="{{ $worker->id }}">{{ $worker->id }}</h4>
                                <h4 class='name'>{{ $worker->name }}</h4>
                                <h4 class='subject'>{{ $worker->job }}</h4>
                                <h4 class="phone">{{ $worker->phone }}</h4>
                                <i class="far fa-trash-alt delbutton"></i>
                                <h4><i class=""></i></h4>
                            </div>
                            <div class="info">
                                <form class="worker_image" data-worker="{{ $worker->id }}" method="post" action="{{ route('workers.update', ['id' => $worker->id]) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="img">
                                        <img src="{{ $worker->avatar }}" alt="Profile">
                                        <label ><input type="file" name="image_file" style='display: none'><i class="fas fa-upload"></i></label>
                                        <input class="upload" type="submit" value="رفع">
                                    </div>
                                
                                    <div class="details" data-worker="{{ $worker->id }}">
                                        <div data-attribute="name">
                                            <b class="filter-1">
                                                <h3>الاسم: </h3><span data-class="name">{{ $worker->name }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="national_id">
                                            <b class="filter-2">
                                                <h3>الرقم القومي: </h3><span>{{ $worker->national_id }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="phone">
                                            <b>
                                                <h3>الهاتف: </h3><span data-class="phone">{{ $worker->phone }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="email">
                                            <b>
                                                <h3>البريد الالكتروني: </h3><span>{{ $worker->email }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="birthdate">
                                            <b>
                                                <h3>تاريخ الميلاد: </h3><span>{{ $worker->birthdate }}</span>
                                            </b>
                                            <input type='date' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div>
                                            <b>
                                                <h3>العمر: </h3><span>{{ $worker->age }}</span>
                                            </b>
                                        </div>
                                        <div data-attribute="social_status">
                                            <b>
                                                <h3>الحالة الاجتماعية: </h3><span>{{ $worker->social_status }}</span>
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
                                        <div data-attribute="qualification">
                                            <b>
                                                <h3>المؤهل: </h3><span>{{ $worker->qualification }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="religion">
                                            <b>
                                                <h3>الديانة: </h3><span>{{ $worker->religion }}</span>
                                            </b>
                                            <select class='hidden-edit'>
                                                <option>مسلم</option>
                                                <option>مسيحي</option>
                                            </select>
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div data-attribute="job">
                                            <b class="filter-4">
                                                <h3>الوظيفة: </h3><span data-class="subject">{{ $worker->job }}</span>
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
                                                <h3>الشهر الحالي: </h3><span>{{ $worker->month_attendence }}%</span>
                                            </b>
                                        </div>
                                        <div>
                                            <b>
                                                <h3>الكلي: </h3><span>{{ $worker->total_attendence }}%</span>
                                            </b>

                                        </div>
                                        <div data-attribute="salary">
                                            <b>
                                                <h3>المرتب الاساسي: </h3><span class="salary-val">{{ $worker->salary }}</span>
                                            </b>
                                            <input type='text' class="hidden-edit">
                                            <i class="fas fa-pen"></i>
                                            <i class="fas fa-check-circle"></i>
                                        </div>                                      
                                        <div>
                                            <b>
                                                <h3>العلاوة: </h3><span class="yearly-bonus-val">{{ $worker->yearly_bonus }}</span>
                                            </b>
                                        </div>
                                        <div>
                                            <b>
                                                <h3>الماكافئات: </h3><span class="bonus-val">{{ $worker->monthExtras() }}</span>
                                            </b>
                                        </div>
                                        <div>
                                            <b>
                                                <h3>الخصومات: </h3><span class="pay-cut-val">{{ $worker->monthPenalties() }}</span>
                                            </b>
                                        </div>
                                        <div>
                                            <b>
                                                <h3>اجمالي الشهر: </h3><span class="total-val"></span>
                                            </b>
                                            <input type='text' class="hidden-edit">
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
            <form action="{{ route('workers.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="img">
                    <img src="{{ asset('/images/avatars/default.jpg') }}" alt="Profile">
                    <label for="files"><i class="fas fa-upload"></i></label>
                    <input id="files" type="file" name="avatar" style='display: none'>
                </div>
                <div class="add-details">
                    <div>
                        <label>الاسم: </label>
                        <input type='text' name="name">
                    </div>
                    <div>
                        <label>الرقم القومي: </label>
                        <input type='text' name="national_id">
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
                        <label>تاريخ الميلاد: </label>
                        <input type='date' name="birthdate">
                    </div>
                    <div>
                        <label>احالة الاجتماعية: </label>
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
                        <input type='text' name="qualification">
                    </div>
                    <div>
                        <label>الديانة: </label>
                        <select name="religion">
                            <option value="">-- اختار --</option>
                            <option value="مسلم">مسلم</option>
                            <option value="مسيحي">مسيحي</option>
                        </select>
                    </div>
                    <div>
                        <label>الوظيفة: </label>
                        <input type='text' name="job">
                    </div>

                    {{-- <div>
                        <label>الحضور: </label>
                        <input type='text'>
                    </div> --}}
                    <div>
                        <label>المرتب الاساسي: </label>
                        <input type='text' name="salary">
                    </div>
                    <div>
                        <label>العلاوة السنوية: </label>
                        <input type='text' name="yearly_bonus">
                    </div>
                    <div>
                        <label>المكافئات: </label>
                        <input type='text' name="extras">
                    </div>
                    <div>
                        <label>الخصومات: </label>
                        <input type='text' name="penalties">
                    </div>
                    {{-- <div>
                        <label>اجمالي الشهر: </label>
                        <input type='text'>
                    </div> --}}
                    <div>

                        <h3>العنوان</h3>
                        
                        <label>اسم الشارع: </label>
                        <input type='text' name="st_name">
                        
                        <label>رقم العمارة: </label>
                        <input type='text' name="building_num">

                        <label> المنطقة: </label>
                        <input type='text' name="region">

                        <label>المدينة: </label>
                        <input type='text' name="city">

                        <label>البلد: </label>
                        <input type='text' name="country">
                    </div>
                    <div>
                        <input type="submit" value="اضافة">
                    </div>
                </div>
            </form>
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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="../js/jquery.calendar.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/workers.js"></script>
    <script src="/js/toastr.min.js"></script>
    <script>
    @if (Session::has('success'))
        toastr.success(" {{ Session::get('success') }} ");
    @endif
    @if (Session::has('info'))
        toastr.info(" {{ Session::get('info') }} ");
    @endif
    </script>

 
</body>

</html>
