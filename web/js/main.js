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