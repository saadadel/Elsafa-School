/* document */

$(document).ready(function ($) {

    "use strict";

    

    // Show Notifications Function

    function toggleFun(parent, child) {

        $(parent).click(function () {
            $(child).toggle();
        });
        
    }

    toggleFun(".user", ".user-menu");
    toggleFun(".notifications", ".notifications-menu");

    // End Show Notifications Function

    /**************************************/

    // Open & Close Menu Function

    $('.fa-bars').click(function () {
        $('header').toggleClass('width');
        $('.dashboard').toggleClass('width');
        $('nav').toggleClass('open');
    });

    // End Open & Close Menu Function

    /**************************************/

    // Numbering People Function

    $('section').each(function () {
        
        var $this = $(this);
        
        $(this).find('.row').each(function (i) {
            $(this).find('.num').text(i + 1);
        });

        /**************************************/

        // Options Buttons Function

        function buttons(button, element) {

            $this.find(element).slideUp(0);

            $this.find(button).click(function () {
                $this.find(element).slideToggle(400);
                $this.find(element).siblings('div:not(.teachers-list,.chart)').slideUp(400);
            });

        }

        buttons('.filter-button', '.filter');
        buttons('.expenses-button', '.control');
        //buttons('.promotions-button', '.promotions');

        // End Options Buttons Function

        /**************************************/
    });

    // End Numbering People Function

    /**************************************/

    // Salary Function

    function salary() {
        $('.teachers-list .row').each(function () {
            var salary = Number($(this).find('.salary-val').text()),
                yearlyBonus = Number($(this).find('.yearly-bonus-val').text()),
                bonus = Number($(this).find('.bonus-val').text()),
                payCut = Number($(this).find('.pay-cut-val').text()),
                total = $(this).find('.total-val');

            total.text((salary + yearlyBonus + bonus) - payCut);
        });
    }

    salary();

    // End Salary Function

    /**************************************/

    // Show & Edit Details Function

    $('.info').slideUp(0);

    $('.someone .name').click(function () {
        $(this).parent().siblings('.info').slideToggle(600);
        $(this).parent().parent().siblings().find('.info').slideUp(600);
    });

    $('.details .fa-pen').click(function () {
        var parent = $(this).parent(),
            input = parent.find('.hidden-edit'),
            check = parent.find('.fa-check-circle'),
            span = parent.find('span').text();
        // console.log(input);
        input.addClass('show').val(span).focus();
        check.addClass('show');
    });

    // Ajax requests to update data
    $('.details .fa-check-circle').click(function () {
        var parent_div = $(this).parent(),
            details_div = parent_div.parent(),
            teacher_id = details_div.data('teacher'),
            student_id = details_div.data('student'),
            worker_id = details_div.data('worker'),
            attribute = parent_div.data('attribute'),
            input = parent_div.find('.hidden-edit'),
            span = parent_div.find('span'),
            edited_class = $('.' + span.data('class'));

            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if(typeof teacher_id != 'undefined')
            {
                $.ajax({
                    url: "/teachers/" + teacher_id,
                    method: 'put',
                    
                    data: {
                      
                        attribute: attribute,
                        updated_data: input.val()
                    },
                    success: function(result){
                        span.text(input.val());
                        if (span.has('data-class')) {
                            $(details_div).parents('.row').find(edited_class).text(input.val());
                        }
                        
                    },
                    error: function(data){
                        var errors = data.responseJSON;
                        $.each(errors['errors'] , function(index, value) {
                            toastr.error(errors['errors'][index]);
                        });
                    }
                });
            }
            else if(typeof student_id != 'undefined')
            {
                console.log("STUDENTTTT: " + student_id);
                $.ajax({
                    url: "/students/" + student_id,
                    method: 'put',
                    
                    data: {
                      
                        attribute: attribute,
                        updated_data: input.val()
                    },
                    success: function(result){
                        span.text(input.val());
                        if (span.has('data-class')) {
                            $(details_div).parents('.row').find(edited_class).text(input.val());
                        }
                        
                    },
                    error: function(data){
                        var errors = data.responseJSON;
                        $.each(errors['errors'] , function(index, value) {
                            toastr.error(errors['errors'][index]);
                        });
                    }
                });
            }
            else if(typeof worker_id != 'undefined')
            {
                console.log("WOKERRR: " + worker_id);
                $.ajax({
                    url: "/workers/" + worker_id,
                    method: 'put',
                    
                    data: {
                      
                        attribute: attribute,
                        updated_data: input.val()
                    },
                    success: function(result){
                        span.text(input.val());
                        if (span.has('data-class')) {
                            $(details_div).parents('.row').find(edited_class).text(input.val());
                        }
                        
                    },
                    error: function(data){
                        var errors = data.responseJSON;
                        $.each(errors['errors'] , function(index, value) {
                            toastr.error(errors['errors'][index]);
                        });
                    }
                });
            }

        input.removeClass('show');
        $(this).removeClass('show');


        $(this).parents('.row').each(function () {
            var salary = Number($(this).find('.salary-val').text()),
                yearlyBonus = Number($(this).find('.yearly-bonus-val').text()),
                bonus = Number($(this).find('.bonus-val').text()),
                payCut = Number($(this).find('.pay-cut-val').text()),
                total = $(this).find('.total-val');

            total.text((salary + yearlyBonus + bonus) - payCut);
        });

    });

    // File Upload auto submit
    $('#files').change(function() {
        // console.log($(this).attr('class'));
        var parent = $(this).parent();
        // console.log(parent);
        // console.log(parent.data('teacher'));
        var teacher = parent.data('teacher');
        // console.log(teacher);
        var form = $('form').find("[data-teacher='${teacher}']");
        // console.log(form);
        $(form).submit();
    });
    

    // End Show & Edit Details Function

    /**************************************/



    // Show & Hide Modal Function

    function show(button, element) {

        $(button).click(function (event) {

            event.preventDefault();

            $(element).css({
                'visibility': 'visible',
                'opacity': 1,
                'padding-top': 0
            });
        });

        $(element + ' .fa-times').click(function () {
            $(this).parents(element).css({
                'visibility': 'hidden',
                'opacity': 0,
                'padding-top': 100
            });
        });

    }

    show('.add-button', '.add-teacher');
    show('.attendance-btn', '.attendance-modal');
    show('.fees-btn', '.fees-modal');

    $('.fees-btn').click(function (e) { 
        e.preventDefault();
        
        var id = $(this).parents('.details').data('student');
        var tbody = $('.fees-modal tbody');
        console.log(id);
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/students/fees/" + id,
            method: 'get',
            success:function(response){
                $.each(JSON.parse(response.fees), function (k, v) { 
                    tbody.append("<tr>");
                    $.each(this, function (indexInArray, valueOfElement) { 
                        tbody.append("<td>" + valueOfElement + "</td>");
                    });
                    tbody.append("<td>" + response.reminders[k] + "</td>");
                    tbody.append("</tr>");
                });
            }
        });
    });

    // End Show & Hide Modal Function

    /**************************************/

    // Filter Function

    var selected = '.filter-1';

    $('.filter').each(function () {

        var $this = $(this);

        $this.find('select').change(function () {
            if ($(this).val() === '1') {
                selected = '.filter-1';
            } else if ($(this).val() === '2') {
                selected = '.filter-2';
            } else if ($(this).val() === '3') {
                selected = '.filter-3';
            } else if ($(this).val() === '4') {
                selected = '.filter-4';
            }
        });

        $this.find("input[type='text']").keyup(function () {

            var input, filter, span;
            input = $this.find("input[type='text']");
            filter = input.val().toString().trim();

            $('.teachers-list .details').each(function (i) {
                span = $(this).find('div ' + selected + ' span').text().trim();

                if (span.indexOf(filter) > -1) {

                    $('.teachers-list .row:eq(' + i + ')').slideDown(400);

                } else {

                    $('.teachers-list .row:eq(' + i + ')').slideUp(400);

                }
            });
        });
    });

    // End Filter Function

    /**************************************/

    // Expenses Function

    $('.done').click(function () {

        $('.pay-cut-val').each(function () {
            if ($('.pay-cut').val() > 0) {
                $(this).text(Number($('.pay-cut').val()) + Number($(this).text()));
            }
        });

        $('.bonus-val').each(function () {
            if ($('.bonus').val() > 0) {
                $(this).text(Number($('.bonus').val()) + Number($(this).text()));
            }
        });

        $('.yearly-bonus-val').each(function () {
            if ($('.yearly-bonus').val() > 0) {
                $(this).text(Number($('.yearly-bonus').val()) + Number($(this).text()));
            }
        });

        salary();
    });

    // End Expenses Function 

    // JS Alert on delete
    $('.delbutton').click(function (){
        var teacher_id = $(this).siblings('.num').data('teacher');
        var student_id = $(this).siblings('.num').data('student');
        console.log(student_id);
        var row = $(this).parents('.row');
        if(typeof teacher_id != 'undefined')
        {
            swal
            ( 
                {   title: "!جميع بيانات هذا المدرس سوف يتم مسحها",   
                    text: "هل تريد إستكمال العملية؟",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "مسح",   
                    cancelButtonText: "إالغاء",   
                    closeOnConfirm: false,   
                    closeOnCancel: true 
                }, 
                // Delete Person Function
                function(isConfirm){   
                    if (isConfirm) 
                    {   
                        // delete from the view
                        row.slideUp(400);
    
                        // delete from the database
                        
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "/teachers/" + teacher_id,
                            method: 'delete'
                        });
    
                        swal("تم مسح الحساب!","", "success");
                    }  
                }
            );
        }
        else if(typeof student_id != 'undefined')
        {
            swal
            ( 
                {   title: "!جميع بيانات هذا الطالب سوف يتم مسحها",   
                    text: "هل تريد إستكمال العملية؟",   
                    type: "warning",   
                    showCancelButton: true,   
                    confirmButtonColor: "#DD6B55",   
                    confirmButtonText: "مسح",   
                    cancelButtonText: "إالغاء",   
                    closeOnConfirm: false,   
                    closeOnCancel: true 
                }, 
                // Delete Person Function
                function(isConfirm){   
                    if (isConfirm) 
                    {   
                        // delete from the view
                        row.slideUp(400);
    
                        // delete from the database
                        
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "/students/" + student_id,
                            method: 'delete'
                        });
    
                        swal("تم مسح الحساب!","", "success");
                    }  
                }
            );
        }


    });



    // Display the calendar to absence
    var absence_days = [],
        current_day = $('meta[name="current_day"]').attr('content'),
        current_month = $('meta[name="current_month"]').attr('content'), calendar_current_month,
        current_year = $('meta[name="current_year"]').attr('content'),
        display_error_once = false, remove_today_from_arr = false,
        absence_teacher_id,
        absence_student_id,
        absence_worker_id,
        teacher_absence_dates = [], student_absence_dates = [], worker_absence_dates = [];

    // remove green from next days on calednar
    function removeGreenColorOnNextDays()
    {
        $('.calendar .calendar-frame .current td').each(function(){
            if(parseInt(calendar_current_month) > parseInt(current_month))
            {
                $(this).addClass('next');
            }
            else if(parseInt($(this).text()) > parseInt(current_day) && parseInt(calendar_current_month) == parseInt(current_month))
            {
                $(this).addClass('next');
            }
        })  
    }
    
    $('.attendance-btn').click(function () { 
        absence_teacher_id = $(this).parents('.details').data('teacher');
        absence_student_id = $(this).parents('.details').data('student');
        absence_worker_id = $(this).parents('.details').data('worker');
        // console.log(absence_teacher_id + "     " + absence_student_id);
        if(typeof absence_teacher_id != 'undefined')
        {
            teacher_absence_dates = [];
            setTeacherAbsenceDays();
            // console.log("TEacher");
        }
        else if(typeof absence_student_id != 'undefined')
        {
            student_absence_dates = [];
            setStudentAbsenceDays();
            // console.log("STUDENT");
        }
        else if(typeof absence_worker_id != 'undefined')
        {
            worker_absence_dates = [];
            setWorkerAbsenceDays();
            // console.log("STUDENT");
        }
        markAbsenceDaysOnCalendar();
        removeGreenColorOnNextDays();
        $('.calendar .calendar-header span.button').click(function () {
            markAbsenceDaysOnCalendar();
            removeGreenColorOnNextDays();
        });


    });

    function setTeacherAbsenceDays()
    {
        $(".absence_days[data-teacher=" + absence_teacher_id + "]").children().each(function(){
            teacher_absence_dates.push($(this).data('absence'));
        });
        //console.log(teacher_absence_dates);
    }
    function setStudentAbsenceDays()
    {
        $(".absence_days[data-student=" + absence_student_id + "]").children().each(function(){
            student_absence_dates.push($(this).data('absence'));
        });
        //  console.log("student_absence_dates: " + student_absence_dates);
    }
    function setWorkerAbsenceDays()
    {
        $(".absence_days[data-worker=" + absence_worker_id + "]").children().each(function(){
            worker_absence_dates.push($(this).data('absence'));
        });
        //  console.log("student_absence_dates: " + student_absence_dates);
    }
    function markAbsenceDaysOnCalendar()
    {
        calendar_current_month = $('.calendar .calendar-header .header-label').text();
        var calendar_current_year = calendar_current_month.split(' ')[1];
        calendar_current_month = calendar_current_month.split(' ')[0];
        var absence_of_current_year = [];
        if(typeof absence_teacher_id != 'undefined')
        {
            teacher_absence_dates.forEach(element => {
                if(element.split('-')[0] == calendar_current_year)
                {
                    console.log(element.split('-')[0]);
                    absence_of_current_year.push(element);
                }
            });
        }
        else if(typeof absence_student_id != 'undefined')
        {
            student_absence_dates.forEach(element => {
                // console.log(element.split('-')[0] + "       " + calendar_current_year);
                if(element.split('-')[0] == calendar_current_year)
                {
                    // console.log(element.split('-')[0]);
                    absence_of_current_year.push(element);
                }
            });
        }
        else if(typeof absence_worker_id != 'undefined')
        {
            worker_absence_dates.forEach(element => {
                // console.log(element.split('-')[0] + "       " + calendar_current_year);
                if(element.split('-')[0] == calendar_current_year)
                {
                    // console.log(element.split('-')[0]);
                    absence_of_current_year.push(element);
                }
            });
        }
        
        if(calendar_current_month == 'يناير'){calendar_current_month = '01';}
        else if(calendar_current_month == 'فبراير'){calendar_current_month = '02';}
        else if(calendar_current_month == 'مارس'){calendar_current_month = '03';}
        else if(calendar_current_month == 'ابريل'){calendar_current_month = '04';}
        else if(calendar_current_month == 'مايو'){calendar_current_month = '05';}
        else if(calendar_current_month == 'يونيو'){calendar_current_month = '06';}
        else if(calendar_current_month == 'يوليو'){calendar_current_month = '07';}
        else if(calendar_current_month == 'اغسطس'){calendar_current_month = '08';}
        else if(calendar_current_month == 'سبتمبر'){calendar_current_month = '09';}
        else if(calendar_current_month == 'اكتوير'){calendar_current_month = '10';}
        else if(calendar_current_month == 'نوفمبر'){calendar_current_month = '11';}
        else if(calendar_current_month == 'ديسمبر'){calendar_current_month = '12';}

        // console.log("YEAR: " + absence_of_current_year);
        // console.log("month: " + calendar_current_month);

        // Remove all selected td for previouse displayed persons
        $(".calendar .calendar-frame .current td").filter(function(){
            console.log($(this).hasClass('selected') + "  " + $(this).text());
            if($(this).hasClass('selected'))
            {
                $(this).removeClass('selected');
            }
        });
        
        absence_of_current_year.forEach(element => {
            if(element.split('-')[1] == calendar_current_month)
            {
                //absence_of_current_year.push(element);
                var calendar_current_day_without_zero = element.split('-')[2];
                if(element.split('-')[2][0] == '0'){calendar_current_day_without_zero = element.split('-')[2][1];}
                // console.log(calendar_current_day_without_zero);
                $(".calendar .calendar-frame .current td").filter(function(){
                    if($(this).text() == calendar_current_day_without_zero)
                    {
                        $(this).addClass('selected');
                    }
                });
            }
        });

    }

    ;

    $(function () {
        $('.attendance-modal .set-calender').calendar({
            months: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'اغسطس', 'سبتمبر', 'اكتوير', 'نوفمبر', 'ديسمبر'],
            days: ['الاثنين', 'الثلاثاء', 'الاربعاء', 'الخميس', 'الجمعة', 'السبت', 'الاحد'],
            color: '#197ae2',
            onSelect:function (event) { 
                var date_arr = event.label.split('.');
                var day = date_arr[0],
                    month = date_arr[1],
                    year = date_arr[2];
                    
                    // console.log("CURRENT_MONTH: " + current_month);
                    // console.log("CURRENT_year: " + current_year);
                    
                    // console.log(parseInt(day));
                    // console.log(month);
                    // console.log(year);
                    
                if(month == current_month && day <= current_day)
                {
                    if(!absence_days.includes(day))
                    {
                        //console.log(day);
                        absence_days.push(day);
                        //console.log(absence_days);
                        if(!remove_today_from_arr)
                        {
                            absence_days.shift();
                            remove_today_from_arr = true;
                            console.log("HERE: " + absence_days);
                        }
                    }
                    else
                    {
                        absence_days.splice(absence_days.indexOf(day), 1);
                    }
                     console.log("THERE: " + absence_days);
                }
                else
                {
                    //console.log(day);
                    $('.calendar .calendar-frame .current td:contains(' + parseInt(day) + ')').removeClass('selected');
                    if(display_error_once == false)
                    {
                        toastr.error('يمكنك تغير بيانات الغياب لهذا الشهر و حتى هذا اليوم فقط');
                        display_error_once = true;
                    }
                    
                }
                if(parseInt(day) > parseInt(current_day))
                {
                    $('.calendar .calendar-frame .current td:contains(' + day + ')').removeClass('selected');
                }
                
             },
        });
    });

    // submit absence to teacher or student or worker
    $('#absence_submit').submit(function (e) { 
        e.preventDefault();
        
        // if(!$('.calendar .calendar-frame .current .today').hasClass('selected')) // Remove current day if not selected
        // {
        //     var today_index = absence_days.indexOf(current_day);
        //     if (today_index > -1) 
        //     {
        //         absence_days.splice(today_index, 1);
        //     }
        // }
        //  console.log(absence_days);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if(typeof absence_teacher_id != 'undefined')
        {
            $.ajax({
                method: "put",
                url: "/teachers/" + absence_teacher_id,
                data: {absence_days: absence_days},
                success: function (response) {
                    if(response.sucess)
                    {
                        location.reload();
                        toastr.success(response.sucess);
                    }
                    else
                    {
                        $('.attendance-modal').css({'visibility': 'hidden'});
                    }
                }
            });
        }
        else if(typeof absence_student_id != 'undefined')
        {
            $.ajax({
                method: "put",
                url: "/students/" + absence_student_id,
                data: {absence_days: absence_days},
                success: function (response) {
                    if(response.sucess)
                    {
                        location.reload();
                        toastr.success(response.sucess);
                    }
                    else
                    {
                        $('.attendance-modal').css({'visibility': 'hidden'});
                    }
                }
            });
        }
        else if(typeof absence_worker_id != 'undefined')
        {
            $.ajax({
                method: "put",
                url: "/workers/" + absence_worker_id,
                data: {absence_days: absence_days},
                success: function (response) {
                    if(response.sucess)
                    {
                        location.reload();
                        toastr.success(response.sucess);
                    } 
                    else
                    {
                        $('.attendance-modal').css({'visibility': 'hidden'});
                    }
                }
            });
        }
        
    });
    

    // Change user image
    $('.upload').click(function(e){
        e.preventDefault();
        var form = $(this).parents('form'), 
        input = $(this).siblings('label').children('input');
        console.log(input.val());
        if(input.val() != "")
        {
            form.submit();
        }
        
    });

});
