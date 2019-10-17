var slideNow = 1;
var slideCount = $('#slidewrapper').children().length;
var slideInterval = 3000;
var navBtnId = 0;
var translateWidth = 0;

$(document).ready(function() {
    var switchInterval = setInterval(nextSlide, slideInterval);

    $('#viewport').hover(function() {
        clearInterval(switchInterval);
    }, function() {
        switchInterval = setInterval(nextSlide, slideInterval);
    });

    $('#next-btn').click(function() {
        nextSlide();
    });

    $('#prev-btn').click(function() {
        prevSlide();
    });

    $('.slide-nav-btn').click(function() {
        navBtnId = $(this).index();

        if (navBtnId + 1 != slideNow) {
            translateWidth = -$('#viewport').width() * (navBtnId);
            $('#slidewrapper').css({
                'transform': 'translate(' + translateWidth + 'px, 0)',
                '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
                '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
            });
            slideNow = navBtnId + 1;
        }
    });
});


function nextSlide() {
    if (slideNow == slideCount || slideNow <= 0 || slideNow > slideCount) {
        $('#slidewrapper').css('transform', 'translate(0, 0)');
        slideNow = 1;
    } else {
        translateWidth = -$('#viewport').width() * (slideNow);
        $('#slidewrapper').css({
            'transform': 'translate(' + translateWidth + 'px, 0)',
            '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
            '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
        });
        slideNow++;
    }
}

function prevSlide() {
    if (slideNow == 1 || slideNow <= 0 || slideNow > slideCount) {
        translateWidth = -$('#viewport').width() * (slideCount - 1);
        $('#slidewrapper').css({
            'transform': 'translate(' + translateWidth + 'px, 0)',
            '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
            '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
        });
        slideNow = slideCount;
    } else {
        translateWidth = -$('#viewport').width() * (slideNow - 2);
        $('#slidewrapper').css({
            'transform': 'translate(' + translateWidth + 'px, 0)',
            '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
            '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
        });
        slideNow--;
    }
}
function showCart(cart) {
    $('#products-cart').html(cart);
    $('#cart').modal('show');
}
function addToCart(id, count, name) {
    $.ajax({
        url: '/site/add',
        data: {id: id, count: count, name: name},
        type: 'get',
        success: function (res) {
            if (!res) res = 'cart empty';
            showCart(res);
        },
        error: function (res) {
            res = 'error';
            showCart(res);
        }
    });
}

$('.add-to-cart').click(function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    console.log(id);
    var count = 1;
    var name = 'кокосовое масло';
    addToCart(id, count, name);
});
$('#cart-form').on('submit', function (e) {
    e.preventDefault();
    var name = $('#cartform-name').val();
    var phone = $('#cartform-phone').val();
    var email = $('#cartform-email').val();
    var area = $('#cartform-area').val();
    var city = $('#cartform-city').val();
    var warehouse = $('#cartform-warehouse').val();
    var count = $('.t706__cartwin-count').text();
    var id = $('.cart-count').data('id');
    if (name != '' && phone != '' && email != '' && area != '' && city != '' && warehouse != '') {
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
            },
            error: function (res) {
                res = 'error';
                showCart(res);
            }
        });
    }
});