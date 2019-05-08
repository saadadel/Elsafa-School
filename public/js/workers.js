/* global $ , document */

$(document).ready(function () {

    "use strict";

    var first_title = 'عامل نظافة',
        first = [$('.workers div .filter-3 span:contains(' + first_title + ')')],
        second_title = 'حارس مدرسة',
        second = [1],
        third_title = 'فني صيانة',
        third = [];

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,

        title: {
            text: "أعداد العمال تبعاّ للوظيفة"
        },
        axisX: {
            interval: 1
        },
        axisY2: {
            interlacedColor: "rgba(79, 129, 188, 0.13)",
            gridColor: "#4F81BC"
        },
        data: [{
            type: "bar",
            name: "companies",
            axisYType: "secondary",
            color: "#4F81BC",
            dataPoints: [
                {
                    y: 0,
                    label: first_title
                },
                {
                    y: 1,
                    label: second_title
                },
                {
                    y: 0,
                    label: third_title
                }
            ]
        }]
    });
    chart.render();

    /**************************************/

    // Attendance Calender Function

    $(function () {
        $('.attendance-modal .set-calender').calendar({
            months: ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'اغسطس', 'سبتمبر', 'اكتوير', 'نوفمبر', 'ديسمبر'],
            days: ['الاثنين', 'الثلاثاء', 'الاربعاء', 'الخميس', 'الجمعة', 'السبت', 'الاحد'],
            color: '#197ae2'
        });
    });

    $(function input() {
        setTimeout(function () {

            var month = $('.header-label').text().replace(/\s/g, ''),
                replaced = '';

            if (month.indexOf('يناير') >= 0) {
                replaced = month.replace('يناير', '1-');
            }

            if (month.indexOf('فبراير') >= 0) {
                replaced = month.replace('فبراير', '2-');
            }

            if (month.indexOf('مارس') >= 0) {
                replaced = month.replace('مارس', '3-');
            }

            if (month.indexOf('ابريل') >= 0) {
                replaced = month.replace('ابريل', '4-');
            }

            if (month.indexOf('مايو') >= 0) {
                replaced = month.replace('مايو', '5-');
            }

            if (month.indexOf('يونيو') >= 0) {
                replaced = month.replace('يونيو', '6-');
            }

            if (month.indexOf('يوليو') >= 0) {
                replaced = month.replace('يوليو', '7-');
            }

            if (month.indexOf('اغسطس') >= 0) {
                replaced = month.replace('اغسطس', '8-');
            }

            if (month.indexOf('سبتمبر') >= 0) {
                replaced = month.replace('سبتمبر', '9-');
            }

            if (month.indexOf('اكتوبر') >= 0) {
                replaced = month.replace('اكتوبر', '10-');
            }

            if (month.indexOf('نوفمبر') >= 0) {
                replaced = month.replace('نوفمبر', '11-');
            }

            if (month.indexOf('ديسمبر') >= 0) {
                replaced = month.replace('ديسمبر', '12-');
            }

            $('.attendance-modal form input[type = "text"]').remove();

            $('.calendar td:not(.disabled)').each(function (i) {
                $('.attendance-modal form').append('<input class="hidden" type="text" value="' + (i + 2) + '-' + replaced + '">');
            });

            $('.calendar td:not(.disabled)').each(function (i) {

                var td = $(this).text() + '-' + replaced,
                    input = $('.attendance-modal form input:eq(' + i + ')').val();

                $(".attendance-modal form input[type='submit']").click(function () {
                    if (!$(this).hasClass('selected') && td == input) {
                        // Your Code
                    }
                });
            });

            $('.today').nextAll('td').addClass('next');
            $('.today').parent().nextAll().find('td').addClass('next');

            $('.calendar-header').click(function () {
                input();
            });

        }, 300);
    });

    // End Attendance Calender Function

    /**************************************/

});
