$(document).ready(function(){

    // Change url ids when page is scrolling
    var currentHash = "#"
    $(document).scroll(function () {
        $('.anchor').each(function () {
            var top = window.pageYOffset;
            var distance = top - $(this).offset().top;
            var hash = $(this).attr('id');
            // 30 is an arbitrary padding choice, 
            // if you want a precise check then use distance===0
            if (distance < 30 && distance > -30 && currentHash != hash) {
                window.location.hash = (hash);
                currentHash = hash;
            }
        });
    });

    if($('.reviews_slider').length > 0) {
        $('.reviews_slider').slick({
            slidesToShow: 2,
            slidesToScroll: 2,
            autoplay: true,
            autoplaySpeed: 2000,
            infinite: true,
            speed: 1800,
            arrows: false,
            dots: true,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
            ],
        });
    };

    if($('.galery_area').length > 0) {
        $('.galery_area').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            infinite: true,
            speed: 1800,
            arrows: false,
            dots: true,
            variableWidth: true,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                    }
                },
            ],
        });
    };
    if($('.aboutgame_slider').length > 0) {
        $('.aboutgame_slider').slick({
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
            // responsive: [
            //     {
            //         breakpoint: 1024,
            //         settings: {
            //             arrows: false,
            //         }
            //     },
            // ],
        });
    };
    $(document).on('click', '.mobbutton, .menuclose', function(e){
        console.log('work')
        e.preventDefault();
        let menuarea = $('.menuwrap');
        menuarea.toggleClass('active');
    });

    let first_play = true;
    $(document).on('click', '.main_video-poster', function(e){
        let video = $(this).find('video').get(0);
        if (first_play) {
            video.play();
            first_play = false;
        }
    });

    $(document).on('click', '.questions_title', function(e){
        e.preventDefault();
        let curent_element = $(this).parent('.questions_item');
        if(!curent_element.hasClass('active')) {
            curent_element.addClass('active');
        } else {
            curent_element.removeClass('active');
        }
    });
    $(document).on('click', '.modalopen', function(e){
        e.preventDefault();
        console.log('work')
        let imgurl = $(this).data('url'),
            modalfon = $('.modal_fon'),
            modalimg = $('.modal_img'),
            modalcontent = $('.modal_content');
        if($(this).hasClass('video-play')) {
            modalcontent.html('<video src="' + imgurl + '" controls autoplay></video>');
        } else {
            modalcontent.html('<img src="' + imgurl + '" alt="Image">');
        }
        modalfon.fadeIn();
        modalimg.addClass('active');
    });
    $(document).on('click', '.modal_close, .modal_fon', function(e){
        e.preventDefault();
        let modalfon = $('.modal_fon'),
            modalimg = $('.modal_img'),
            modalvideo = $('.modal_content video');
        modalfon.fadeOut();
        modalimg.removeClass('active');
        if(modalvideo.length>0) {
            modalvideo.trigger('pause');
        }
    });
    $(document).on('click', 'a[href^="#"]', function (e) {
		e.preventDefault();
		let id  = $(this).attr('href'),
			top = $(id).offset().top;
            menu = $('.slidemenu.active'),
            time = 0;
        if (menu.length > 0 ) {
            menu.removeClass('active');
            time = 300;
        }
        setTimeout(function(){
            $('body,html').animate({scrollTop: top}, 800);
        }, time)
	});

    let delay = 1200;
    let timer;
    function delayedFunction() {
        $('.gamefilter').submit();
    }
    function update_filter() {
        clearTimeout(timer);
        timer = setTimeout(delayedFunction, delay); 
    }
    var px = parseInt($('#px').val()),
        pn = parseInt($('#pn').val()),
        ps = false;
    var personsgame = new rSlider({
        target: '#personsgame',
        values: [1, 2, 3, 4, 5, 6, 7, 8],
        range: true,
        tooltip: false,
        scale: true,
        labels: true,
        set: [pn, px],
        onChange: function (val) {
            vals = val.split(',');
            $('#pn').val(vals[0]);
            $('#px').val(vals[1]);
            if(ps) {
                update_filter();
            }
            ps = true; 
        }
    });
    var tx = parseInt($('#tx').val()),
        tn = parseInt($('#tn').val()),
        ts = false;
    var timegame = new rSlider({
        target: '#timegame',
        values: [15, 30, 45, 60],
        range: true,
        tooltip: false,
        scale: true,
        labels: true,
        set: [tn, tx],
        onChange: function (val) {
            vals = val.split(',');
            $('#tn').val(vals[0]);
            $('#tx').val(vals[1]);
            if(ts) {
                update_filter();
            }
            ts = true;
        }
    });
    $(document).on('click', '.gamefilter_select', function(e){
        e.preventDefault();
        $(this).toggleClass('active');
    });
    $('.gamefilter').on('change', function() {
        update_filter();
    });
      
    $(document).on('click', '.gamefilter_select li', function(e){
        e.preventDefault();
        let item_value = $(this).data('value'),
            item_name = $(this).html(),
            item_main = $(this).parents('.gamefilter_select'),
            item_title = item_main.find('p'),
            item_input = item_main.find('input');
        item_title.html(item_name);
        item_input.val(item_value);
        update_filter();
    });

    $('#locationsearch').on('change send keyup', function(e){
        e.preventDefault();
        var text = $('.locationinput').val().toLowerCase();
        $('.locations_item a').each(function() {
            var linkText = $(this).text().toLowerCase();
            if (linkText.includes(text)) {
              $(this).removeClass('hidden');
            } else {
              $(this).addClass('hidden');
            }
        });
        $('.locations_item').each(function() {
            var allChildrenHidden = true;
            $(this).find('a').each(function() {
                if (!$(this).hasClass("hidden")) {
                    allChildrenHidden = false;
                    return false; 
                }
            });
           
            if (allChildrenHidden) {
                $(this).addClass("hidden");
            } else {
                $(this).removeClass("hidden");
            }
        });
        $('.locations_area').each(function() {
            var allChildrenHidden = true;
            $(this).find('.locations_item').each(function() {
                if (!$(this).hasClass("hidden")) {
                    allChildrenHidden = false;
                    return false; 
                }
            });
            if (allChildrenHidden) {
                $(this).addClass("hidden");
            } else {
                $(this).removeClass("hidden");
            }
        });
    });
    
})