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
            margin: 10px
        }

        .flex {
            width: 100%;
            text-align: center;
            display: inline-flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
        }

        .flex>div {
            width: 33%;
            margin-top: 10px
        }

        .box {
            border: 1px solid #000;
            box-shadow: 3px 3px 0 #000;
            margin: 5px 0
        }

        .gray {
            background: #ddd
        }

        table {
            width: 100%;
            text-align: center;
            border-collapse: collapse;
            border: 2px solid #000
        }

        table td,
        table th,
        span {
            border: 2px solid #000;
            padding: 5px;
            font-size: 18px
        }

    </style>
</head>

<body>
    <div class="flex">
        @foreach ($students as $student)
            <div>
                <table>
                    <tr>
                        <th>
                            <h3>محافظة الجيزه</h3>
                            <h3>ادارة بولاق الدكرور التعليمية</h3>
                            <h3>مدرسة الصفا الخاصة</h3>
                        </th>
                        <th>
                            <h3>{{ $student->academic_year }}</h3>
                            <span>القسم: </span>&shy;
                            <span>{{ $student->section }}</span>
                        </th>
                    </tr>
                    <tr>
                        <td>الاسم :</td>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <td>المرحلة :</td>
                        <td>{{ $student->level->level }}</td>
                    </tr>
                    <tr>
                        <td>الصف :</td>
                        <td>{{ $student->level->name }}</td>
                    </tr>
                    <tr>
                        <td>رقم الجلوس :</td>
                        <td>{{ $student->seatno }}</td>
                    </tr>
                    <tr>
                        <td>رقم اللجنة :</td>
                        <td>{{ $student->committeeno }}</td>
                    </tr>
                </table>
            </div>
        @endforeach
        
    </div>
</body>

</html>
