$(document).ready(function() {
    $('.addToCart').click(function(event){
        var idSP = $('#product input[name="idSP"]').val();
        var tenSP = $('#product input[name="tenSP"]').val();
        var giaban = $('#product input[name="giaban"]').val();
        var hinhanh = $('#product input[name="hinhanh"]').val();
        $.ajax({
            url: 'controller/cart.php', // Replace with the actual PHP endpoint to fetch category details
            type: 'POST',
            data: {
                'idSP': idSP,
                'tenSP': tenSP,
                'giaban': giaban,
                'hinhanh': hinhanh,
                'add-to-cart': true,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success) window.location.href="?page=giohang";
                else window.location.href="?page=login";
            },
        });
    });

    // giam
    $('.minus').click(function(){
        var product = $(this).closest('.product');
        var idSP = product.find('input[name="idSP"]').val();
        var qty = product.find('input[name="qty"]');
        var tmp = qty.val();
        if(tmp > qty.attr('min')){
            tmp--;
            qty.val(tmp); 
            $.ajax({
                url: 'controller/cart.php', // Replace with the actual PHP endpoint to fetch category details
                type: 'POST',
                data: {
                    'idSP': idSP,
                    'soluong': tmp,
                    'update-cart': true,
                    'minus': true,
                },
                success: function(response){
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success){
                        $('.pay .total').text(obj.tongtien);
                        $('.pay input[name="tongtien"]').val(obj.updatepay);
                    }
                },
            });
        }
    });

    // tang
    $('.plus').click(function(){
        console.log("hello");
        var product = $(this).closest('.product');
        var idSP = product.find('input[name="idSP"]').val();
        var qty = product.find('input[name="qty"]');
        var tmp = parseInt(qty.val());
        if(tmp < parseInt(qty.attr('max'))){
            console.log(tmp);
            tmp++;
            console.log(tmp);
            qty.val(tmp); 
            $.ajax({
                url: 'controller/cart.php', // Replace with the actual PHP endpoint to fetch category details
                type: 'POST',
                data: {
                    'idSP': idSP,
                    'soluong': tmp,
                    'update-cart': true,
                    'plus': true,
                },
                success: function(response){
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success){
                        $('.pay .total').text(obj.tongtien);
                        $('.pay input[name="tongtien"]').val(obj.updatepay);
                    }
                },
            });
        }
    });

    // remove-item
    $('.remove-item').click(function(){
        var product = $(this).closest('.product').remove();
        var idSP = product.find('input[name="idSP"]').val();
        $.ajax({
            url: 'controller/cart.php', // Replace with the actual PHP endpoint to fetch category details
            type: 'POST',
            data: {
                'idSP': idSP,
                'update-cart': true,
                'remove-item': true,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    $('.pay .total').text(obj.tongtien);
                    $('.pay input[name="tongtien"]').val(obj.updatepay);
                }
            },
        });
    });

    // payment
    $('#order-form').submit(function(event){
        event.preventDefault();
        console.log('hello');
        // neu gio hang rong thi hien thong bao
        var tongtien = $('#order-form input[name="tongtien"]').val();
        console.log(tongtien);
        if(tongtien != 0){
            var diachigiao = $('#order-form input[name="diachigiao"]').val();
            var thanhtoan = $('#order-form input[name="thanhtoan"]:checked').val();
            console.log(thanhtoan);
                $.ajax({
                    url: 'controller/cart.php', // Replace with the actual PHP endpoint to fetch category details
                    type: 'POST',
                    data: {
                        'payment-btn' : true,
                        'diachigiao' : diachigiao,
                        'thanhtoan' : thanhtoan,
                    },
                    success: function(response){
                        console.log(response);
                        const obj = JSON.parse(response);
                        console.log("hello");
                        console.log(obj.success);
                        if(obj.success) window.location.href="?page=hoadon&idDH="+(obj.idDH);
                        else window.location.href="vnpay_php/vnpay_create_payment.php";
                    },
                });
        }
        else alert('Bạn chưa chọn sản phẩm nào.');
    });
});
