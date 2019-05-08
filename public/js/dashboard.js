$(document).ready(function () {

    'use strict';

    function replaceTXT(el) {
        $(el).each(function () {
            var text = $(this).text();

            if (text.indexOf(".5") >= 0) {
                $(this).text(text.replace('.5', ':30'));
            }

            if (text.indexOf(".25") >= 0) {
                $(this).text(text.replace('.25', ':15'));
            }

            if (text.indexOf(".75") >= 0) {
                $(this).text(text.replace('.75', ':45'));
            }

        });
    }

    function timeTable(start, end, lessonDuration) {
        var i;

        for (i = start; end >= i; i = i + lessonDuration) {
            $('.brief tbody').append('<tr><td class="clock">' + i + '</td><td></td><td></td><td></td><td></td><td></td></tr>');
        }

        replaceTXT('.brief tbody td');
        replaceTXT('.brief tbody p');

        $('.brief tbody tr').last().remove();

    }
    
    timeTable(1, 16, 1);

});
