/* =================================
------------------------------------
    Divisima | eCommerce Template
    Version: 1.0
 ------------------------------------
 ====================================*/


'use strict';


$(window).on('load', function () {
    /*------------------
        Preloder
    --------------------*/
    $(".loader").fadeOut();
    $("#preloder").delay(400).fadeOut("slow");

});

(function ($) {
    /*------------------
        Navigation
    --------------------*/
    $('.main-menu').slicknav({
        prependTo: '.main-navbar .container',
        closedSymbol: '<i class="flaticon-right-arrow"></i>',
        openedSymbol: '<i class="flaticon-down-arrow"></i>'
    });


    /*------------------
        ScrollBar
    --------------------*/
    $(".cart-table-warp, .product-thumbs").niceScroll({
        cursorborder: "",
        cursorcolor: "#afafaf",
        boxzoom: false
    });


    /*------------------
        Category menu
    --------------------*/
    $('.category-menu > li').hover(function (e) {
        $(this).addClass('active');
        e.preventDefault();
    });
    $('.category-menu').mouseleave(function (e) {
        $('.category-menu li').removeClass('active');
        e.preventDefault();
    });


    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });



    /*------------------
        Hero Slider
    --------------------*/
    var hero_s = $(".hero-slider");
    hero_s.owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        onInitialized: function () {
            var a = this.items().length;
            $("#snh-1").html("<span>1</span><span>" + a + "</span>");
        }
    }).on("changed.owl.carousel", function (a) {
        var b = --a.item.index, a = a.item.count;
        $("#snh-1").html("<span> " + (1 > b ? b + a : b > a ? b - a : b) + "</span><span>" + a + "</span>");

    });

    hero_s.append('<div class="slider-nav-warp"><div class="slider-nav"></div></div>');
    $(".hero-slider .owl-nav, .hero-slider .owl-dots").appendTo('.slider-nav');



    /*------------------
        Brands Slider
    --------------------*/
    $('.product-slider').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        margin: 30,
        autoplay: true,
        navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 2,
            },
            768: {
                items: 3,
            },
            1200: {
                items: 4,
            }
        }
    });


    /*------------------
        Popular Services
    --------------------*/
    $('.popular-services-slider').owlCarousel({
        loop: true,
        dots: false,
        margin: 40,
        autoplay: true,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            991: {
                items: 3
            }
        }
    });


    /*------------------
        Accordions
    --------------------*/
    $('.panel-link').on('click', function (e) {
        $('.panel-link').removeClass('active');
        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
        e.preventDefault();
    });


    /*-------------------
        Range Slider
    --------------------- */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data('min'),
        maxPrice = rangeSlider.data('max');
    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        slide: function (event, ui) {
            minamount.val('$' + ui.values[0]);
            maxamount.val('$' + ui.values[1]);
        }
    });
    minamount.val('$' + rangeSlider.slider("values", 0));
    maxamount.val('$' + rangeSlider.slider("values", 1));


    /*-------------------
        Quantity change
    --------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });



    /*------------------
        Single Product
    --------------------*/
    $('.product-thumbs-track > .pt').on('click', function () {
        $('.product-thumbs-track .pt').removeClass('active');
        $(this).addClass('active');
        var imgurl = $(this).data('imgbigurl');
        var bigImg = $('.product-big-img').attr('src');
        if (imgurl != bigImg) {
            $('.product-big-img').attr({ src: imgurl });
            $('.zoomImg').attr({ src: imgurl });
        }
    });


    $('.product-pic-zoom').zoom();

    /*------------------
        AJAX
    --------------------*/
    // add cart
    $('.add-card').click(function () {
        var id = $(this).data('id');
        var _token = $('input[name=_token]').val();
        var url = $('input[name=this_url]').val() + '/add-cart-ajax';
        swal("Bạn có muốn thêm sản phẩm vào giỏ hàng?", {
            buttons: {
                cancel: "Không",
                ok: {
                    text: "Có",
                    value: "ok",
                }
            },
        })
            .then((value) => {
                switch (value) {
                    case "ok":
                        $.ajax({
                            url: url,
                            method: "POST",
                            data: {
                                id: id,
                                _token: _token
                            },
                            dataType: "html",
                            success: function (data) {
                                swal({
                                    text: "Đã thêm vào giỏ hàng",
                                    icon: "success",
                                });
                                document.getElementById('slsp').innerHTML =
                                    data;
                            }
                        });
                        break;
                }
            });
    });
    // end add cart

    //
    $('.choose').change(function (e) {
        var action = $(this).attr('id');
        var city_id = $(this).val();
        var _token = $('input[name=_token]').val();
        var url = $('input[name=this_url]').val() + '/select';
        var result = '';
        if (action == 'city') {
            result = 'district';
        } else {
            result = 'wards';
        }
        $.ajax({
            type: "post",
            url: url,
            data: {
                action: action,
                city_id: city_id,
                _token: _token
            },
            success: function (data) {
                $('#' + result).html(data);
            }
        });
    });
    //
    // comment
    $('.btn-cmt').click(function () {
        var product_id = $(this).data('product_id');
        var content = $('textarea#cmt').val();
        var _token = $('input[name=_token]').val();
        var url = $('input[name=this_url]').val() + '/add-comment';
        $.ajax({
            type: "post",
            url: url,
            data: {
                product_id: product_id,
                content: content,
                _token: _token
            },
            success: function (data) {
                $('.blog__details__comment').append(data);
                var content = $('textarea#cmt').val('');
            }
        });
    });

    $('.btn-reply').click(function () {
        var cmt_id = $(this).data('cmt_id');
        var product_id = $('input[name=product_id]').val();
        var _token = $('input[name=_token]').val();
        var content = $('#reply' + cmt_id).val();
        var url = $('input[name=this_url]').val() + '/reply-comment';
        $.ajax({
            type: "post",
            url: url,
            data: {
                cmt_id: cmt_id,
                product_id: product_id,
                content: content,
                _token: _token
            },
            success: function (data) {
                $('#reply' + cmt_id).val('');
                $('#reply-comment' + cmt_id).append(data);
            }
        });

    });
    // end comment

    // search
    $('input[name=search]').keyup(function (e) {
        var _token = $('input[name=_token]').val();
        var search = $(this).val().trim();
        var url = $('input[name=this_url]').val() + '/search';
        if (search != '') {
            $.ajax({
                type: "post",
                url: url,
                data: {
                    search: search,
                    _token: _token
                },
                success: function (data) {
                    $('#search-list').fadeIn();
                    $('#search-list').html(data);
                }
            });
        }
        else {
            $('#search-list').fadeOut();
        }
    });
    // end search
    // pagination
    $('select[name=pagination]').change(function (e) {
        var page = $(this).val();
        var _token = $('input[name=_token]').val();
        var url = $('input[name=this_url]').val() + '/paginate';
        $.ajax({
            type: "post",
            url: url,
            data: {
                page: page,
                _token: _token
            },
            success: function (data) {
                location.reload();
            }
        });
    });
    // rating
    function remove_bg(product_id){
        for(var count = 1; count <=5; count++){
            $('#'+product_id+'-'+count).css('color', '#e6e6e6');
        }
    }
    $('.rating').mouseenter(function () {
        var index = $(this).data("index");
        var product_id = $(this).data("product_id");
        remove_bg(product_id);
        for(var count = 1; count <=index; count++){
            $('#'+product_id+'-'+count).css('color', '#f51167');
        }
    });
    $('.rating').mouseleave(function () {
        var index = $(this).data("index");
        var product_id = $(this).data("product_id");
        var rating = $(this).data("rating");
        remove_bg(product_id);
        for(var count = 1; count <=rating; count++){
            $('#'+product_id+'-'+count).css('color', '#f51167');
        }
    });
    $('.rating').click(function (e) {
        var index = $(this).data("index");
        var product_id = $(this).data("product_id");
        var _token = $('input[name=_token]').val();
        var url = $('input[name=this_url]').val() + '/add-rating';
        $.ajax({
            type: "post",
            url: url,
            data: {
                index: index,
                product_id: product_id,
                _token: _token
            },
            success: function (data) {
                alert(data);
            }
        });
    });
    // end rating
    // back to top
    var btn = $('#backtotop');
    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });

    $('.dropdown').change(function (e) {
        var url = $(this).val();
        console.log(url);
        if(url){
            window.location = url;
        }
        return false;
    });
})(jQuery);
