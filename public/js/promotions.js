$(document).ready(function () {

    'use strict';

    $('.hidden').fadeOut(200);

    $('section.hidden').each(function () {
        var $this = $(this);

        $('.type select').change(function () {
            console.log($this.attr('class'));
            if ($(this).val() == $this.attr('class').split(' ')[0]) {
                $('.select-' + $this.attr('class').split(' ')[0] + ',.' + $this.attr('class').split(' ')[0]).fadeIn(600);
                $('.hidden' + ':not(.select-' + $this.attr('class').split(' ')[0] + ',.' + $this.attr('class').split(' ')[0] + ')').fadeOut(0);
            }
        });

        $this.find('.select-all').click(function (e) {
            var checked = e.currentTarget.checked;
            $this.find(".row input[type='checkbox']").prop('checked', checked);
        });

        var lastChecked = null;

        $this.find(".row input[type='checkbox']").click(function (e) {

            if (!lastChecked) {
                lastChecked = $(this);
                return;
            }

        });

        $('.select-students select').change(function () {

            var input, filter, span;
            input = $this.find("input[type='text']");
            filter = $(this).val();

            $('.students .teachers-list .details').each(function (i) {
                span = $(this).find('div .filter-3 span').text().trim();

                if (filter == 'الكل') {

                    $('.students .teachers-list .row').slideDown(400);

                } else if (span == filter) {

                    $('.students .teachers-list .row:eq(' + i + ')').slideDown(400);

                } else {

                    $('.students .teachers-list .row:eq(' + i + ')').slideUp(400);

                }
            });
        });

        $('.select-teachers select').change(function () {

            var input, filter, span;
            input = $this.find("input[type='text']");
            filter = $(this).val();

            $('.teachers .teachers-list .details').each(function (i) {
                span = $(this).find('div .filter-4 span').text().trim();

                if (filter == 'الكل') {

                    $('.teachers .teachers-list .row').slideDown(400);

                } else if (span == filter) {

                    $('.teachers .teachers-list .row:eq(' + i + ')').slideDown(400);

                } else {

                    $('.teachers .teachers-list .row:eq(' + i + ')').slideUp(400);

                }
            });
        });

        
        
    });
    $('.students .promotions-button').click(function () {
        //var promotions_value = $('.students .promotions .select-promotions').val();
        var pro_type = $(this).attr('id');
        alert(pro_type);
        var students_ids = [];
        $(".students .row input[type='checkbox']").each(function () {
            if ($(this).prop('checked') && $(this).parents('.row').css('display') == 'block') {
                var id = $(this).parents('.row').data('student');
                //console.log("studentsIDS: " + students_ids);
                students_ids.push(id)
                //$(this).parents('.row').find('div .filter-3 span').text(promotions_value);
                //$(this).parents('.row').find('.subject').text(promotions_value);
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "promotions/studentsup",
            method: "put",
            data: {students_ids: students_ids, pro_type: pro_type},
            success: function (response) {
                location.reload();
            }
        });
    });

    $('.teachers .promotions-button').click(function () {
        alert("TEACHERS PRESSED");
        var promotions_value = $('.teachers .promotions .select-promotions').val();

        $(".teachers .row input[type='checkbox']").each(function () {
            if ($(this).prop('checked') && $(this).parents('.row').css('display') == 'block') {
                $(this).parents('.row').find('div .filter-4 span').text(promotions_value);
            }
        });

    });


    var chart = new CanvasJS.Chart("chartContainer", {
        exportEnabled: true,
        animationEnabled: true,
        title: {
            text: "نسبة النجاح الي الرسوب لكل السنين الدراسية"
        },
        axisY: {
            title: "النجاح",
            titleFontColor: "#4F81BC",
            lineColor: "#4F81BC",
            labelFontColor: "#4F81BC",
            tickColor: "#4F81BC"
        },
        axisY2: {
            title: "الرسوب",
            titleFontColor: "#C0504E",
            lineColor: "#C0504E",
            labelFontColor: "#C0504E",
            tickColor: "#C0504E"
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor: "pointer",
            itemclick: toggleDataSeries
        },
        data: [{
                type: "column",
                name: "نجاح",
                showInLegend: true,
                yValueFormatString: "#,##0.# طالب",
                dataPoints: [
                    {
                        label: "الصف الاول الثانوي",
                        y: 20
                },
                    {
                        label: "الصف الثاني الثانوي",
                        y: 30
                },
                    {
                        label: "الصف الثالث الثانوي",
                        y: 40
                },
                    {
                        label: "الصف الاول الاعدادي",
                        y: 50
                },
                    {
                        label: "الصف الاول الاعدادي",
                        y: 60
                }
            ]
        },
            {
                type: "column",
                name: "رسوب",
                showInLegend: true,
                yValueFormatString: "#,##0.# طالب",
                dataPoints: [
                    {
                        label: "الصف الاول الثانوي",
                        y: 11
                    },
                    {
                        label: "الصف الثاني الثانوي",
                        y: 12
                    },
                    {
                        label: "الصف الثالث الثانوي",
                        y: 13
                    },
                    {
                        label: "الصف الاول الاعدادي",
                        y: 14
                    },
                    {
                        label: "الصف الثاني الاعدادي",
                        y: 15
                    }
                ]
            }]
    });
    chart.render();

    function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        e.chart.render();
    }

    $(function teachersChart() {
        var first_title = 'معلم اول',
            first = $('.teachers div .filter-4 span:contains(' + first_title + ')'),
            second_title = 'مدير',
            second = $('.teachers div .filter-4 span:contains(' + second_title + ')'),
            third_title = 'مشرف',
            third = $('.teachers div .filter-4 span:contains(' + third_title + ')');

        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,

            title: {
                text: "أعداد المدرسين تبعاّ للدرجة الحالية"
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
                        y: first.length,
                        label: first_title
                    },
                    {
                        y: second.length,
                        label: second_title
                    },
                    {
                        y: third.length,
                        label: third_title
                    }
                ]
            }]
        });
        chart2.render();
    });

});
