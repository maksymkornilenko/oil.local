function showCart(cart) {
    $('#products-cart').html(cart);
    $('#cart').modal('show');
}
function showAnswer(answer) {
    $('#callback-answer').html(answer);
    $('#callback').modal('show');
}
function addToCart(id, count) {
    $.ajax({
        url: '/site/add',
        data: {id: id, count: count},
        type: 'get',
        success: function (res) {
            if (!res) res = 'cart empty';
            showCart(res);
            $('.cartwin-prodamount-wrap').css({textAlign:'right'});
            $('.t706__cartwin-count').css({display:'none'});
            $('#cart-form').css({display: 'block'})
        },
        error: function (res) {
            res = 'error';
            showCart(res);
        }
    });
}
/**
 * function for delete or clear cart
 */
function deleteAndClearCart(res) {
    if (!res) res = 'cart empty';
    showCart(res);
    if ($('.t706__cartwin-count').text() == '') {
        $("#cart-form")[0].reset();
        $("#cart-form").yiiActiveForm('resetForm');
        $('#cart-form').css({display: 'none'});
        // $('#orders-area').val(null).trigger("change");
        // $('.t706__carticon-counter').text(0);
        // $('.t706__carticon-text').text('Ваша корзина пуста');
        // $('.t706__cartwin-bottom').css({display: 'none'});
     } //else {
    //     $('.t706__carticon-counter').text($('.t706__cartwin-count').text());
    //     $('.t706__carticon-text').text($('.t706__cartwin-prodamount').text());
    //     $('.t706__cartwin-bottom').css({display: 'block'});
    // }
    // $('.t706__cartwin-count').css({display: 'none'});
    // if ($('.t706__cartwin-count').text() == '') {
    //     $('.t706__cartwin-bottom').css({display: 'none'});
    // } else {
    //     $('.t706__cartwin-bottom').css({display: 'block'});
    // }
}
/**
 * function for show result of calculate
 */
function resultCalc(newCount, price) {
    $('.cart-count').text(newCount);
    var sum = newCount * price;
    $('.t706__product-amount').text(sum + ' €');
    $('.t706__cartwin-prodamount').text(sum + ' €');
}

/**
 * function for calculate sum count and sum with discount
 */
function calculator(count, newCount) {
    newCount += count;
    var price = 17;
    if (newCount == 0 || newCount == 1) {
        newCount = 1
    }
    $('.cart-count').text(newCount);
    resultCalc(newCount, price);
    $('.t706__carticon-counter').text(newCount);
    $('.t706__cartwin-count').text(newCount);
}
$('.add-to-cart').click(function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    console.log(id);
    var count = 1;
    addToCart(id, count);
});
function inputCount() {
    var count = $('#message').val();
    var id = $('#message').data('id');
    var price = 17;

    if (count == undefined || id == undefined) {
        return false;
    } else {
        if (count <= 0) {
            $('#message').val(1);
            count = 1;
        }
        var sum = price * count;
        $('.t706__carticon-counter').text(count);
        $('.t706__product-amount').text(sum + ' €');
        $('.t706__cartwin-prodamount').text(sum + ' €');
        $('.t706__cartwin-count').text(count);
    }

}
/**
 * function for change count of items on click plus
 */
$('#cart #products-cart').on('click', '#plus-cart', function (e) {
    e.preventDefault();
    var count = 1;
    var newCount = +$('.cart-count').text();
    calculator(count, newCount);
});
/**
 * function for change count of items on click minus
 */
$('#cart #products-cart').on('click', '#minus-cart', function (e) {
    e.preventDefault();
    var count = -1;
    var newCount = +$('.cart-count').text();
    calculator(count, newCount);
});
/**
 * function for change count of order
 */
$('#cart #products-cart').on('change', '#message', function (e) {
    $('.t706__product-title ').css({width: '45%'});
    $('.t706__product-plusminus').css({position: 'relative'});
    $('.t706__product-plusminus').css({left: '-14px'});
    inputCount();
});
/**
 * callback input field for change count of products
 */
$('#cart #products-cart').on('click', '.cart-count', function (e) {
    $('.t706__product-title ').css({width: '45%'});
    $(this).replaceWith("<input class='t706__product-quantity cartcount' min='1' type='number'data-id=" + $(this).data('id') + " id='message' name='message' autofocus class='manFl' value=" + $(this).text() + ">");
    $('.t706__product-plusminus').css({position: 'relative'});
    $('.t706__product-plusminus').css({left: '-25px'});
});
/**
 * return span tag after change
 */
$('#cart #products-cart').on('blur', '#message', function (e) {
    $('.t706__product-title ').css({width: '45%'});
    $(this).replaceWith("<span class='t706__product-quantity cart-count' data-id=" + $(this).data("id") + " data-gender=" + $(this).data("gender") + ">" + $(this).val() + "</span>");
    $('.t706__product-plusminus').css({position: 'relative'});
    $('.t706__product-plusminus').css({left: '0px'});
});
$("#cart").on("hidden.bs.modal", function (e) {
    e.preventDefault();
    var sum = $(".t706__cartwin-prodamount").text();
    var count = $(".cart-count").text();
    var name = $(".t706__product-title").text();
    var price = $(".cart-price").text();
    var id = $(".cart-count").data('id');
    if (count != '') {
        $.ajax({
            url: '/site/save',
            data: {id: id, count: count, price: price, name: name, sum: sum},
            type: 'get',
            success: function (res) {
                if (!res) res = 'cart empty';
                // if ($('.t706__cartwin-count').text() == '') {
                    // $('.t706__carticon-counter').text(0);
                    // $('.t706__carticon-text').text('Ваша корзина пуста');
                    // $('.t706__cartwin-bottom').css({display: 'none'});

                // } else {
                    // $('.t706__carticon-counter').text(count);
                    // $('.t706__carticon-text').text($('.t706__cartwin-prodamount').text());
                    // $('.t706__cartwin-bottom').css({display: 'block'});
                // }
                // $('.t706__cartwin-count').css({display: 'none'});
                // if ($('.t706__cartwin-count').text() == '') {
                //     $('.t706__cartwin-bottom').css({display: 'none'});
                // } else {
                //     $('.t706__cartwin-bottom').css({display: 'block'});
                // }
            },
            error: function (res) {
                res = 'error';
                showCart(res);
            }
        });
        // $(".t706__carticon-text").text(sum);
        // $(".t706__carticon-counter").text(count);
        // $(".t706__carticon_showed").css({display: 'block'});
    } else {
        // $(".t706__carticon-text").text('Ваша корзина пуста');
        // $(".t706__carticon-counter").text("0");
        // $(".t706__carticon_showed").css({display: 'block'});
    }
    $('#cart').modal('hide');
    $("div.modal-backdrop").remove();
});
/**
 * function for delete item in cart
 */
$('#cart #products-cart').on('click', '.del-item', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/site/delete',
        data: {id: id},
        type: 'get',
        success: function (res) {
            deleteAndClearCart(res);
        },
        error: function (res) {
            res = 'error';
            showCart(res);
        }
    });
});
$('#cart-form').on('submit', function (e) {
    e.preventDefault();
    var name = $('#cartform-name').val();
    var phone = $('#cartform-phone').val();
    var email = $('#cartform-email').val();
    var area = $('#cartform-country').val();
    var city = $('#cartform-city').val();
    var warehouse = $('#cartform-warehouse').val();
    var count = $('.cart-count').text();
    var id = $('.cart-count').data('id');
    var error = $('.help-block-error').text();
    if (name != '' && phone != '' && email != '' && area != '' && city != '' && warehouse != ''&& error=='') {
        $.ajax({
            url: '/site/send',
            data: {
                name: name,
                phone: phone,
                mail: email,
                area: area,
                city: city,
                warehouse: warehouse,
                count: count,
                id: id
            },
            type: 'post',
            success: function (res) {
                if (!res) res = 'cart empty';
                showCart(res);
                $("#cart-form")[0].reset();
                $("#cart-form").yiiActiveForm('resetForm');
            },
            error: function (res) {
                res = 'error';
                showCart(res);
            }
        });
    }
});
$('.callback').click(function(e){
    e.preventDefault();
    $('#callback').modal('show');
    $('#callback-form').css({display: 'block'});
});
$('#callback-form').on('submit', function (e) {
    e.preventDefault();
    var name = $('#callbackform-name').val();
    var phone = $('#callbackform-phone').val();
    var error = $('.help-block').text();
    if (name != '' && phone != '' && error=='') {
        $.ajax({
            url: '/site/callback',
            data: {
                name: name,
                phone: phone
            },
            type: 'post',
            success: function (res) {
                if (!res) res = 'cart empty';
                showAnswer(res);
                $("#callback-form")[0].reset();
                $("#callback-form").yiiActiveForm('resetForm');
                $('#callback-form').css({display: 'none'});
            },
            error: function (res) {
                res = 'error';
                showAnswer(res);
            }
        });
    }
});