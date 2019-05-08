<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            direction: rtl
        }

        body {
            margin: 0;
            padding: 3% 6%
        }

        h1,
        h2,
        h3,
        h4 {
            margin: 10px auto;
            width: max-content
        }

        .width {
            width: 100%
        }

        .flex {
            width: 100%;
            text-align: center;
            display: inline-flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
        }

        .flex:last-of-type div {
            width: 33%
        }

        .box {
            border: 1px solid #000;
            box-shadow: 5px 5px 0 #000;
            margin: 5px 0
        }

        .gray {
            background: #ddd
        }

        .border-bottom {
            border-bottom: 2px solid #000
        }

        table {
            width: 100%;
            text-align: center;
            border-collapse: collapse;
            border: 2px solid #000;
            margin-top: 20px
        }

        table td,
        table th,
        span {
            padding: 5px;
            font-size: 18px
        }

        table td,
        table th {
            border: 2px solid #000;
        }
        
        table span {
            display: inline-block;
            width: 25%;
            border: 1px solid #000
        }

    </style>
</head>

<body>
    <div class="flex">
        <div>
            <h1 class='border-bottom'>مدرسة الصفا الخاصة</h1>
            <h1 class='border-bottom'>طلبة رسميين</h1>
        </div>
        <div>
            <div>
                <h1 class="border-bottom">قائمة فصل للعام الدراسي: {{ $academic_year }}</h1>
                <div class="box">
                    <div class='flex width'>
                        <span>المرحلة</span>
                        <span>{{ $level_compact }}</span>
                        <span>الفرقة :</span>
                        <span>{{ $level_section }}</span>
                        <span>الفصل :</span>
                        <span>{{ $classroom }}</span>
                    </div>
                    <div class="flex">
                        <h3 class="box">القسم: </h3>
                        <h3>{{ $section }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>م</th>
                <th>اسم التلميذ</th>
                <th>الديانة</th>
                <th>النوع</th>
                <th>حالة القيد</th>
                <th>تاريخ الميلاد</th>
                <th>
                    السن اول اكتوبر
                    <br>
                    <span>يوم</span>
                    <span>شهر</span>
                    <span>سنة</span>
                </th>
                <th>العنوان</th>
            </tr>
        </thead>
        <tbody>
            @php
                $index = 1;
            @endphp
            @foreach ($students as $student)
                <tr>
                    <td>{{ $index }}</td>
                    @php
                        $index += 1;
                    @endphp
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->religion }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->enrollment_status }}</td>
                    <td>{{ $student->birthdate }}</td>
                    <td><span>{{ $student->oct_age_days }}</span> <span>{{ $student->oct_age_months }}</span> <span>{{ $student->oct_age_years }}</span></td>
                    <td>{{ $student->building_num }} {{ $student->st_name }} - {{ $student->region }} - {{ $student->city }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex">
        <div>
            <h3>اعداد :</h3>
            <h3>مسئول شؤن الطلبة</h3>
        </div>
        <div>
            <h3>رائد الفصل :</h3>
            <h3>توقيع /</h3>
        </div>
        <div>
            <h3>اعتماد /</h3>
            <h3>وكيل المرحلة</h3>
        </div>
    </div>
</body>

</html>
