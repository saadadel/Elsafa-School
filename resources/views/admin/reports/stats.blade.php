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
            margin: 5px 0;
            padding:.5% 1%
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
            margin: 50px 0
        }

        table td,
        table th,
        span {
            padding: 5px;
            font-size: 18px;
            border: none !important
        }

        table th {
            background: #ddd
        }

    </style>
</head>

<body>
    <div class="flex">
        <div class="box" style="width: max-content">
            <h3>محافظة الجيزة</h3>
            <h3>ادراة بولاق الدكرور التعليمية</h3>
            <h2>مدرسة الصفا الخاصة</h2>
        </div>
        <div class="width">
            <div>
                <h1>احصائيات اجمالية</h1>
                <div class="flex border-bottom" style="width: 300px">
                    <h3>القسم :</h3>
                    <h3>{{$school_section}}</h3>
                </div>
            </div>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th class="box">السنة الدراسية</th>
                <th class="box">مسلمون</th>
                <th class="box">مسلمات</th>
                <th class="box">مسيحيون</th>
                <th class="box">مسيحيات</th>
                <th class="box">وافدون</th>
                <th class="box">وافدات</th>
                <th class="box">عائدون</th>
                <th class="box">عائدات</th>
                <th class="box">جملة ذكور</th>
                <th class="box">جملة الاناث</th>
                <th class="box">جملة الذكور والاناث</th>
                <th class="box">عدد الفصول</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stats as $key => $value)
                @if(explode(' ', $key)[0] == 'إجمالي')
                    <tr>
                        <th class="box">{{$key}}</th>
                        <th class="box">{{$value['moslm_male']}}</th>
                        <th class="box">{{$value['moslm_female']}}</th>
                        <th class="box">{{$value['christian_male']}}</th>
                        <th class="box">{{$value['christian_female']}}</th>
                        <th class="box">{{$value['wafd_male']}}</th>
                        <th class="box">{{$value['wafd_female']}}</th>
                        <th class="box">{{$value['3aed_male']}}</th>
                        <th class="box">{{$value['3aed_female']}}</th>
                        <th class="box">{{ $value['males'] }}</th>
                        <th class="box">{{ $value['females'] }}</th>
                        <th class="box">{{ $value['males'] + $value['females'] }}</th>
                        <th class="box">{{$value['classrooms']}}</th>
                    </tr>
                @else
                    <tr>
                        <td class='box'>{{$key}}</td>
                        <td class='box'>{{$value['moslm_male']}}</td>
                        <td class='box'>{{$value['moslm_female']}}</td>
                        <td class='box'>{{$value['christian_male']}}</td>
                        <td class='box'>{{$value['christian_female']}}</td>
                        <td class='box'>{{$value['wafd_male']}}</td>
                        <td class='box'>{{$value['wafd_female']}}</td>
                        <td class='box'>{{$value['3aed_male']}}</td>
                        <td class='box'>{{$value['3aed_female']}}</td>
                        <td class='box'>{{$value['males']}}</td>
                        <td class='box'>{{$value['females']}}</td>
                        <td class='box'>{{ $value['males']+$value['females'] }}</td>
                        <td class='box'>{{$value['classrooms']}}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <div class="flex">
        <h3>شئون الطلبة</h3>
        <h3>وكيل المرحلة /</h3>
    </div>
</body>

</html>
