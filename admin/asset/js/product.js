/* add-data form */
$(document).ready(function() {
    $('#add-form-product').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var tenSP = $('#add-form-product input[name="tenSP"]').val();
        var giaban = $('#add-form-product input[name="giaban"]').val();
        var tonkho = $('#add-form-product input[name="tonkho"]').val();
        var cpu = $('#add-form-product input[name="cpu"]').val();
        var card = $('#add-form-product input[name="card"]').val();
        var pin = $('#add-form-product input[name="pin"]').val();
        var ram = $('#add-form-product input[name="ram"]').val();
        var mota = $('#add-form-product input[name="mota"]').val();
        var note = formValidateProduct(tenSP, giaban, tonkho, cpu, card, pin, ram, mota);
        if(note ===''){
            // Serialize form data
            var formData = new FormData( $('#add-form-product')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/add_product.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success) alert('Thêm thành công.');
                    else alert('Sản phẩm này đã tồn tại.');
                },
            });
        }
        else alert(note);
    });
    /* End: add form */

    /* Start: unlock */
    $('.unlock_product').click(function() {
        // Display the form as a pop-up
        var product_id = $(this).closest('tr').find('.product_id').text();
        $.ajax({
            url: 'controller/active_product.php', // Replace with the actual PHP endpoint to fetch product details
            type: 'POST',
            data: {
                'unlock_product': true,
                'product_id': product_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="?page=product&index="+curr_page;
                }
            },
        });
   });
    /* End: unlock */

    /* Start: lock */
    $('.lock_product').click(function() {
        // Display the form as a pop-up
        var product_id = $(this).closest('tr').find('.product_id').text();
        $.ajax({
            url: 'controller/active_product.php', // Replace with the actual PHP endpoint to fetch product details
            type: 'POST',
            data: {
                'lock_product': true,
                'product_id': product_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="?page=product&index="+curr_page;
                }
            },
        });
   });
    /* End: lock */
});


