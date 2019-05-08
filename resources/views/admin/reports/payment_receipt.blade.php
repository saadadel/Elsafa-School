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

        h2,h3 {
            width: max-content;
            margin: 15px auto
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

        .col-2>div {
            width: 49.5%;
            margin: 10px 0;
            padding: 1%
        }

        .col-3>div {
            width: 33%
        }

        .border {
            border: 2px solid #000
        }

        .border .flex div {
            width: 48%;
        }
        
        .end h2 {
            margin: 15px
        }

        .box {
            border: 1px solid #000;
            box-shadow: 4px 4px 0 #000;
        }

        .border-rt {
            border-right: 2px solid #000
        }

        .gray {
            background: #ddd
        }

        .border-btm {
            border-bottom: 2px solid #000
        }

    </style>
</head>

<body>
    <div class="flex col-2">
        @foreach ($students as $student)
            <div class="border">
                <div class="flex">
                    <div class="box">
                        <h3>{{ $student->level->level }}</h3>
                        {{-- <h3>تعليم اساسي</h3> --}}
                    </div>
                    <div>
                        <h3 class='border-btm'>ALSAFA PRIVATE SCHOOLS</h3>
                        <h2 class='border-btm'>مدرسة الصفا الخاصة</h2>
                    </div>
                </div>
                <div class="flex">
                    <div>
                        <h2>السيد ولي امر التلميذ /</h2>
                        <h2>تحية طيبة وبعد،،،</h2>
                    </div>
                    <div>
                        <h2>{{ $student->name }}</h2>
                        <h2>الفرقة : <span>{{ $student->level->name }}</span></h2>
                    </div>
                </div>
                <div class="border">
                    <h3>تخطركم ادارة المدرسة بضرورة سداد الباقي المستحق من المصروفات المدرسية وجملته:</h3>
                    <h1><span>{{ $student->fees_reminder }}</span> جنيهاّ</h1>
                    <h3 class='border-btm'>({{ $student->fees_reminder_ar }})</h3>
                    <div class="flex">
                        <h2>في موعد اقصاه يوم:</h2>
                        <h2 class="max_date_text"></h2>
                        <div style="margin-top:15px;">
                            <input type="text" class="max_date_input" placeholder="الموعد المحدد">
                            <button class="max_date_button">موافق</button>
                        </div>
                        
                    </div>
                </div>
                <div class="flex end">
                    <h4> تحريراّ في </h4>
                    <h4 class="created_at_text"></h4>
                    <div style="margin-top:15px; margin-left:60px;">
                        <input type="text" name="" class="created_at_input" placeholder="تاريخ التحرير">
                        <button class="created_at_button">موافق</button>
                    </div>
                   
                    <h2>وهذا للعلم ، مع قبول التحية ،،،</h2>
                    <h2>ادارة المدرسة</h2>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $('.created_at_button').click(function(){
            var text = $(this).siblings('.created_at_input').val();
            $(this).parent().siblings('.created_at_text').text(text );

            $(this).parent().children().hide();
        });

        $('.max_date_button').click(function(){
            var text = $(this).siblings('.max_date_input').val();
            $(this).parent().siblings('.max_date_text').text(text);

            $(this).parent().children().hide();
        });
    </script>

</body>

</html>
