<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <div class="box" style="float: right;">
        <h3>محافظة الجيزة</h3>
        <h3>ادراة بولاق الدكرور التعليمية</h3>
        <h2>مدرسة الصفا الخاصة</h2>
    </div>
    <div class="box" style="float: left;">
        <h3>المرحلة التعليمية: {{ $level_compact }}</h3>
        <h3>الصف الدراسي: {{ $level_section }}</h3>
        <h3>القسم: {{ $section }}</h3>
    </div>
    <div class="flex">
        <div class="box gray">
            <h2>كشف مناداة</h2>
        </div> 
    </div>
    <div class="box" style="float: right;">
        <br>
        <label for="seat_section">رقم اللجنة</label>
        <input type="text" name="seat_section">
        <button id="committee_submit">تأكيد</button>
        <br>
        <br>
        <br>
    </div>
    <div class="box" style="float: left;">
        <h3>ارقام الجلوس</h3>
        <label for="seat_section">من</label>
        <input type="text" class="seat_from" required>

        <label for="seat_section">إلى:</label>
        <input type="text" class="seat_to" required>
        
        <button id="seat_submit">تأكيد</button>
        <br><br>
    </div>
    <table>
        <thead>
            <tr>
                <th>م</th>
                <th>اسم التلميذ</th>
                <th>حالة القيد</th>
                <th>الديانة</th>
                <th>رقم الجلوس</th>
                <th>رقم اللجنة</th>
            </tr>
        </thead>
        <tbody>
            @php
                $index = 1 ;
            @endphp
            @foreach ($students as $student)
            <tr>
                    <td class="id" style="display: none;">{{ $student->id }}</td>
                    <td>{{ $index }}</td>
                    @php
                        $index += 1;
                    @endphp
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->residence_status }}</td>
                    <td>{{ $student->religion }}</td>
                    <td class="seatno">{{ $student->seatno }}</td>
                    <td class="committeeno">{{ $student->committeeno }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex">
        <h2>شئون الطلبة /</h2>
        <h2>مدير المدرسة /</h2>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../js/reports.js"></script>
</html>
