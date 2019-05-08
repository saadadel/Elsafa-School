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
        }
        
        .box h2 {
            display: inline-block;
            padding: 5px;
        }
        
        .border-rt {
            border-right: 2px solid #000
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
        <div class="box gray">
            <h2>الديانة</h2>
            <h2 class="border-rt">{{ $religion }}</h2>
        </div> 
    </div>
    <table>
        <thead>
            <tr>
                <th>م</th>
                <th>اسم التلميذ</th>
                <th>تاريخ الميلاد</th>
                <th>النوع</th>
                <th>المرحلة</th>
                <th>الصف</th>
                <th>الفصل</th>
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
                    <td>{{ $student->birthdate }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->level->level }}</td>
                    <td>{{ $student->level->name }}</td>
                    <td>{{ $student->classroom }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex">
        <h2>شئون الطلبة /</h2>
        <h2>مدير المدرسة /</h2>
    </div>
</body>

</html>
