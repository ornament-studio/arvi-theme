(function($) {
$(document).ready(function() {
	var inputPlayersCount = '#input_1_17'
	var inputDate = '#input_1_9'
	var inputGameId = '#input_1_6'
    var inputTime = '#input_1_22'
    var inputTimeSlots = '.booking-time_slots'
    var inputTotalSum = '#input_1_13'
    var playersMaxCount = 8
    var gamePrices = {}
    var totalSum = 0

	var aboutGameSlider = (selector) => {
        $(selector).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            infinite: true,
            speed: 1800,
            fade: true,
            arrows: true,
            prevArrow: 
            `<span class="slider_prew slider_arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <rect width="32" height="32" rx="8" fill="#DDFF7C"/>
                    <path d="M18.9802 25.1066L19.0864 25.2118L19.1919 25.1059L20.9062 23.3866L21.0125 23.28L20.9056 23.1741L13.6631 16L20.9056 8.82591L21.0125 8.72L20.9062 8.61343L19.1919 6.89409L19.0864 6.78821L18.9802 6.89343L9.89444 15.8934L9.78686 16L9.89444 16.1066L18.9802 25.1066Z" fill="#1C1C3B" stroke="#DDFF7C" stroke-width="0.3"/>
                </svg>
            </span>`,
            nextArrow: 
            `<span class="slider_next slider_arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <rect width="32" height="32" rx="8" transform="matrix(-1 0 0 1 32 0)" fill="#DDFF7C"/>
                    <path d="M13.0198 25.1066L12.9136 25.2118L12.8081 25.1059L11.0938 23.3866L10.9875 23.28L11.0944 23.1741L18.3369 16L11.0944 8.82591L10.9875 8.72L11.0938 8.61343L12.8081 6.89409L12.9136 6.78821L13.0198 6.89343L22.1056 15.8934L22.2131 16L22.1056 16.1066L13.0198 25.1066Z" fill="#1C1C3B" stroke="#DDFF7C" stroke-width="0.3"/>
                </svg>
            </span>`,
        })
    }

	// Setting up Datepicker object
	var enableDatepicker = (selector, options) => {
        $(selector).datepicker({
            inline: true,
            altField: inputDate,
            changeMonth: true,
            changeYear: true,
            prevText: '',
            nextText: '',
            minDate: 'today',
            firstDay: 1,
            showOtherMonths: true,
            onSelect: (date) => {
                getTimeSlots();
            },
            ...options
        });
    }

    // Track any AJAX requests and turn on Spinner
    $(document).ajaxSend(() => {
        $('#overlay').fadeIn(300);　
    })

    var turnOffSpinner = () => {
    	setTimeout(() => {
            $('#overlay').fadeOut(300);
        }, 500);
    }

    // Function for retrieving Time slots for selected date in Datepicker
    var getTimeSlots = () => {
        var gameId = $(inputGameId).val();
        $.ajax({
            url: booking_js_data.ajaxurl,
            type: 'POST',
            data: {
                action: 'booking_get_time_slots',
                game_id: gameId,
                date: $(inputDate).val(),
                current_id: booking_js_data.current_id,
                players: $(inputPlayersCount).val(),
                _wpnonce: booking_js_data.ajax_nonce
            },
            success: (res) => {
                console.log('booking_get_time_slots - success');
                $(inputTimeSlots).html(res);
                if ($(inputTime).val() != 0) {
                    $('.time_slot-label').each((i, obj) => {
                        if ($(obj).text() == $(inputTime).val()) {
                            $('#' + $(obj).attr('for')).attr('checked', 'checked');
                        }
                    });
                }
            }
        }).done(() => {
            turnOffSpinner()
        })
    }

    // AJAX request for getting specific game
    $(document).on('click', '#gamelist_item', function(e) {
        var gameId = $(this).data('gameId');
        e.preventDefault();
        $.ajax({
            url: booking_js_data.ajaxurl,
            type: 'POST',
            data: {
                action: 'booking_open_game',
                gameId: gameId,
                current_id: booking_js_data.current_id,
                _wpnonce: booking_js_data.ajax_nonce
            },
            success: (res) => {
                // console.log(res);
                $('#bookblock .booking-items').addClass('hidden');
                $('#bookblock .booking-item').html(res.data.game_item_tmp);
                $('#bookblock .booking-time_slots').html(res.data.time_slots_tmp);
                $(inputTimeSlots).html(res.data.time_slots_tmp);
                $(inputGameId).val(gameId);
                $('#bookblock .back_btn').removeClass('hidden');
                if ($('.aboutgame_slider').length > 0) {
                    aboutGameSlider('.aboutgame_slider');
                }
                $('#bookblock .booking-wrapper').removeClass('hidden');

                playersMaxCount = res.data.max_players;
                gamePrices = res.data.prices;
                generatePlayersCountFieldDescription($('.booking-form_players-field-description'), gamePrices);
                totalSum = getPriceByPlayer(1, gamePrices);
                $(inputTotalSum).val(totalSum);
            }
        }).done(() => {
            turnOffSpinner()
        })
    });

    // Generate description for Players field
    var generatePlayersCountFieldDescription = (selector, prices) => {
        $.each(prices, (key, val) => {
            if (val['show'])
                selector.append($('<p>$' + val['price'] + ' for ' + val['players'] + ' player(s)</p>'));
        });
    };

    // AJAX request for getting all games
    $(document).on('click', '#gamelist_back_btn', function(e) {
        e.preventDefault();
        $.ajax({
            url: booking_js_data.ajaxurl,
            type: 'POST',
            data: {
                action: 'booking_all_games',
                _wpnonce: booking_js_data.ajax_nonce
            },
            success: (res) => {
                $('#bookblock .booking-wrapper').addClass('hidden');
                $('#bookblock .booking-items').removeClass('hidden');
                // $('#bookblock .container').html(res);
                $('#bookblock .back_btn').addClass('hidden');
            }
        }).done(() => {
            turnOffSpinner()
        })
    })

    // Turn on Datepicker after downloading page 
    enableDatepicker('.booking-form_calendar')

    // Track changes in booking form and turn on datepicker again if GF plagin disable it
    document.arrive(".booking-form_calendar", function(newElem) {
        if ($(this).is(':empty') && $('#gform_page_1_1').is(":visible")) {
            enableDatepicker($(this), {defaultDate: $(inputDate).val()});
            getTimeSlots();
        }
    })

    // Track Players field description block and if it content is empty regenerate content
    document.arrive('.booking-form_players-field-description', function(newElem) {
        if ($(this).text().trim().length == 0 && $('#gform_page_1_1').is(":visible") && !$.isEmptyObject(gamePrices)) {
            generatePlayersCountFieldDescription($(this), gamePrices);
        }
    })

    function getPriceByPlayer(players, prices) {
        var price = 0;
        $.each(prices, (key, value) => {
            if (value['players'] == players) {
                price = value['price'] * players
            }
        })
        return '$' + price + '.00';
    }

    function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt($(inputPlayersCount).val(), 10);

        if (!isNaN(currentVal) && currentVal < playersMaxCount) {
            parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
            $(inputPlayersCount).val(currentVal + 1);
            totalSum = getPriceByPlayer(currentVal + 1, gamePrices)
            $(inputTotalSum).val(totalSum);
            getTimeSlots();
        } else {
            // parent.find('input[name=' + fieldName + ']').val(1);
        }
    }

    function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt($(inputPlayersCount).val(), 10);

        if (!isNaN(currentVal) && currentVal > 1) {
            parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
            $(inputPlayersCount).val(currentVal - 1);
            totalSum = getPriceByPlayer(currentVal - 1, gamePrices)
            $(inputTotalSum).val(totalSum);
            getTimeSlots();
        } else {
            // parent.find('input[name=' + fieldName + ']').val(1);
        }
    }

    $('.booking-form_players-field').on('click', '.button-plus', function(e) {
        incrementValue(e);
    });

    $('.booking-form_players-field').on('click', '.button-minus', function(e) {
        decrementValue(e);
    });

    // Track changes in Players field and rebind events
    document.arrive(".booking-form_players-field", function(newElem) {
        console.log('bind action on players field')
        $('#quantity-field').val($(inputPlayersCount).val());
        $('.booking-form_players-field').on('click', '.button-plus', function(e) {
            incrementValue(e);
        });

        $('.booking-form_players-field').on('click', '.button-minus', function(e) {
            decrementValue(e);
        });
    });

    // Save Time Slot to hidden field
    $(document).on('click', '.time_slot-label', function(e) {
        console.log('Save Time Slot to hidden field');
        var timeSlotValue = $('#' + $(this).attr('for')).val();
        $(inputTime).val(timeSlotValue).change();
    });
    });
})
})(jQuery)