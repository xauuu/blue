$(document).ready(function () {
    /*------------------
        AJAX
    --------------------*/
    // add cart
    $('.add-card').click(function () {
        var id = $(this).data('id');
        var _token = $('input[name=_token]').val();
        var url = $('input[name=this_url]').val() + '/add-cart-ajax';
        swal({
            title: "Thêm sản phẩm này vào giỏ hàng",
            icon: "warning",
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
                                    title: "Đã thêm vào giỏ hàng",
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
    $('button[id=add-cart-w-qty]').click(function (e) {
        var product_id = $('input[name=product_id]').val();
        var quantity = $('input[name=quantity]').val();
        var url = $('input[name=this_url]').val() + '/add-cart';
        var _token = $('input[name=_token]').val();
        $.ajax({
            type: "post",
            url: url,
            data: {
                product_id: product_id,
                quantity: quantity,
                _token: _token
            },
            success: function (data) {
                if (data == 'Số lượng sản phẩm trong kho không đủ') {
                    swal({
                        text: data,
                        icon: "error",
                        buttons: false,
                        timer: 1500
                    });
                }else{
                    swal({
                        text: "Đã thêm vào giỏ hàng",
                        icon: "success",
                        buttons: false,
                        timer: 1500
                    });
                    document.getElementById('slsp').innerHTML = data;
                }
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
    function remove_bg(product_id) {
        for (var count = 1; count <= 5; count++) {
            $('#' + product_id + '-' + count).css('color', '#e6e6e6');
        }
    }
    $('.rating').mouseenter(function () {
        var index = $(this).data("index");
        var product_id = $(this).data("product_id");
        remove_bg(product_id);
        for (var count = 1; count <= index; count++) {
            $('#' + product_id + '-' + count).css('color', '#f51167');
        }
    });
    $('.rating').mouseleave(function () {
        var index = $(this).data("index");
        var product_id = $(this).data("product_id");
        var rating = $(this).data("rating");
        remove_bg(product_id);
        for (var count = 1; count <= rating; count++) {
            $('#' + product_id + '-' + count).css('color', '#f51167');
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
                if (data) {
                    alert(data);
                } else {
                    $('.rating').data('rating', index);
                }
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
        if (url) {
            window.location = url;
        }
        return false;
    });

});
