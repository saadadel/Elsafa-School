$(document).ready(function () {

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

    $('.settings .done').on('click', function () {

        $('.timetable tbody').empty();

        var start = Number($('select.start').val()),
            end = Number($('select.end').val()),
            classDuration = Number($('select.class-duration').val());

        // timeTable(Day Start, Day End, Classe Duration);
        timeTable(start, end, classDuration);

    });

    var i;

    for (i = 1; i <= 24; i = i + 0.25) {
        $('select.start').append('<option value="' + i + '" >' + i + '</option>');
    }

    replaceTXT('select.start option');

    $('select.start').on('change', function () {
        $('select.end').empty();

        var i,
            val = Number($('select.start').val());

        for (i = val; i <= 24; i = i + 0.25) {
            $('select.end').append('<option value="' + i + '" >' + i + '</option>');
        }

        replaceTXT('select.end option');
    });

    $('.timetable table td:not(.clock)').on('click', function () {
        var class_details = prompt('ماذا تريد ان تكتب هنا؟');
        $(this).text(class_details);
    });
})
