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
            justify-content: center;
            align-items: flex-start;
        }

        .box {
            border: 1px solid #000;
            box-shadow: 4px 4px 0 #000;
            margin: 15px auto;
            padding: .5% 3%
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
            border: 2px solid #000;
            border-collapse: collapse;
            margin: 50px 0
        }

        table td,
        table th {
            padding: 5px;
            font-size: 18px;
            border: 2px solid #000
        }

    </style>
</head>

<body>
    <div class="box" style="width: max-content">
        <h3>محافظة الجيزة</h3>
        <h3>ادراة بولاق الدكرور التعليمية</h3>
        <h2>مدرسة الصفا الخاصة</h2>
    </div>
    <div class="flex">
        <h1 class="border-bottom">{{ $school_section }}</h1>
        <div class="box">
            <h2>بيانات الطلبة {{ $residence_status }}</h2>
        </div>
        <div style="width: 28.5%"></div>
    </div>
    <table>
        <thead>
            <tr>
                <th>م</th>
                <th>اسم التلميذ</th>
                <th>الجنسية</th>
                <th>الديانة</th>
                <th>تاريخ الميلاد</th>
                <th>النوع</th>
                <th>التليفون</th>
                <th>المرحلة</th>
                <th>الصف</th>
                <th>الفصل</th>
                <th>حالة القيد</th>
            </tr>
        </thead>
        <tbody>
            @php
                $index = 1 ;
            @endphp
            @foreach ($students as $student)
                <tr>
                    <td>{{ $index }}</td>
                    @php
                        $index += 1;
                    @endphp
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->nationality }}</td>
                    <td>{{ $student->religion }}</td>
                    <td>{{ $student->birthdate }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->level->level }}</td>
                    <td>{{ $student->level->name }}</td>
                    <td>{{ $student->classroom }}</td>
                    <td>{{ $student->enrollment_status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex">
        <h4>عدد التلاميذ (<span>{{ sizeof($students) }}</span>) تلميذاّ</h4>
        <h2>شئون الطلبة /</h2>
        <h2>مدير المدرسة /</h2>
    </div>
</body>

</html>
