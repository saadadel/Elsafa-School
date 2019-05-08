$(document).ready(function () {
    'use strict';

    $('.hidden').fadeOut(200);

    $('.section select').change(function () { 
        var choice = $(this).val();
        if(choice == 'students')
        {
            $(this).parents('.section').siblings('.type').removeClass('hidden');

        }
    });


    function hideAll(object)
    {
        $(object).parents('.type').siblings('.school_section').addClass('hidden');
        $(object).parents('.type').siblings('.school_section').children('select').val('');

        $(object).parents('.type').siblings('.level').addClass('hidden');
        $(object).parents('.type').siblings('.level').children('select').val('');

        $(object).parents('.type').siblings('.religion_select').addClass('hidden');
        $(object).parents('.type').siblings('.religion_select').children('select').val('');

        $(object).parents('.type').siblings('.residence_status').addClass('hidden');
        $(object).parents('.type').siblings('.residence_status').children('select').val('');

        $(object).parents('.type').siblings('.level_name').addClass('hidden');
        $(object).parents('.type').siblings('.level_name').children('select').val('');

        $(object).parents('.type').siblings('.classroom').addClass('hidden');
        $(object).parents('.type').siblings('.classroom').children('select').val('');

        $(object).parents('.type').siblings('.academic_year').addClass('hidden');
        $(object).parents('.type').siblings('.academic_year').children('select').val('');
    }

    $('.type select').change(function () { 
        var choice = $(this).val();
        hideAll(this);

        if(choice == 'schoolrec' || choice == 'stats' || choice == 'payment_receipt' || choice == 'seats' || choice == 'seatsno')
        {
            $(this).parents('.type').siblings('.school_section').removeClass('hidden');
            $(this).parents('.type').siblings('.level').removeClass('hidden');
        }
        else if(choice == 'residence')
        {
            $(this).parents('.type').siblings('.residence_status').removeClass('hidden');
        }
        else if(choice == 'religion')
        {
            $(this).parents('.type').siblings('.religion_select').removeClass('hidden');
        }
    });

    $('.level select').change(function () { 
        console.log($(this).parents('.level').siblings('.type').children('select').val());
        $(this).parents('.level').siblings('.level_name').removeClass('hidden');
        if($(this).parents('.level').siblings('.type').children('select').val() == 'schoolrec')
        {
            $(this).parents('.level').siblings('.classroom').removeClass('hidden');
            $(this).parents('.level').siblings('.academic_year').removeClass('hidden');
        }
            
    });

    $('#committee_submit').click(function (e) { 
        e.preventDefault();
        var students_ids = [], committeeno = $(this).siblings('input').val();

        $.each($('.id'), function (indexInArray, valueOfElement) { 
             students_ids.push($(valueOfElement).text());
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/reports/committee",
            method: "POST",
            data: {students_ids: students_ids, committeeno: committeeno},
            success: function (response) {
                $.each($('.committeeno'), function (indexInArray, valueOfElement) { 
                    $(valueOfElement).text(committeeno);
                });
            }
        });
    });

    $('#seat_submit').click(function (e) { 
        e.preventDefault();
        var students_ids = [], 
            seat_from = $('.seat_from').val(),
            seat_to = $('.seat_to').val();

        $.each($('.id'), function (indexInArray, valueOfElement) { 
             students_ids.push($(valueOfElement).text());
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/reports/seat",
            method: "POST",
            data: {
                students_ids: students_ids,
                seat_from: seat_from,
                seat_to: seat_to,
            },
            success: function (response) {
                seat_from = parseInt(seat_from);
                seat_to = parseInt(seat_to);
                $.each($('.seatno'), function (indexInArray, valueOfElement) { 
                    $(valueOfElement).text(seat_from);
                    seat_from += 1;
                    // console.log(seat_from);
                    if(seat_from > seat_to)
                    {
                        return false;
                    }
                });
            }
        });
    });
});
