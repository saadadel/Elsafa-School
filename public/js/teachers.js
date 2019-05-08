












/* global $ , document */

$(document).ready(function () {

    "use strict";

    var chart = new CanvasJS.Chart("chartContainer", {
        exportEnabled: true,
        animationEnabled: true,
        title: {
            text: "نسب مدرسين المدرسة"
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
                    name: "مدرسين عربي",
                    exploded: true
                },
                {
                    y: 20,
                    name: "مدرسين كيمياء"
                },
                {
                    y: 5,
                    name: "مدرسين فيزياء"
                },
                {
                    y: 3,
                    name: "مدرسين رياضيات"
                },
                {
                    y: 7,
                    name: "مدرسين احياء"
                },
                {
                    y: 17,
                    name: "مدرسين فلسفة"
                },
                {
                    y: 22,
                    name: "مدرسين تارخ"
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

    // End Teachers Chart

    /**************************************/



});
