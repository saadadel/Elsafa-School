/* global $ , document */

$(document).ready(function () {

    "use strict";
        
    $('.stage').on('change', function () {
        console.log($('.select-' + $(this).val()));
        $('.select-' + $(this).val()).show().siblings('.hide-select').hide();
    });

    var chart = new CanvasJS.Chart("chartContainer", {
        exportEnabled: true,
        animationEnabled: true,
        title: {
            text: "نسب طلاب المدرسة"
        },
        legend: {
            cursor: "pointer",
            itemclick: explodePie
        },
        data: [{
            type: "pie",
            showInLegend: true,
            toolTipContent: "{name}: <strong>{y}%</strong>",
            indexLabel: "{name} - {y}%",
            dataPoints: [
                {
                    y: 26,
                    name: "طلاب الصف الاول ثانوي",
                    exploded: true
                },
                {
                    y: 20,
                    name: "طلاب الصف الثاني ثانوي"
                },
                {
                    y: 5,
                    name: "طلاب الصف الثالث ثانوي"
                },
                {
                    y: 3,
                    name: "طلاب الصف الاول اعدادي"
                },
                {
                    y: 29,
                    name: "طلاب الصف الثاني اعدادي"
                },
                {
                    y: 17,
                    name: "طلاب الصف الثالث اعدادي"
                }
		  ]
	   }]
    });
    chart.render();


    function explodePie(e) {
        if (typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
        } else {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
        }
        e.chart.render();
    }

});
