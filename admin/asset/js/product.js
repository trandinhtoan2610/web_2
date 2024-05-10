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
        var mota = $('#add-form-product textarea[name="mota"]').val();
        var note = formValidateProduct(tenSP, giaban, tonkho, cpu, card, pin, ram, mota);
        if(note ===''){
            // Serialize form data
            var formData = new FormData( $('#add-form-product')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/product.php', // URL to handle form submission
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

    /* Start: update product */
    $('button[name="edit-product-btn"]').click(function(event){
        // validate form
        var tenSP = $('#edit-form-product input[name="tenSP"]').val();
        var giaban = $('#edit-form-product input[name="giaban"]').val();
        var tonkho = $('#edit-form-product input[name="tonkho"]').val();
        var cpu = $('#edit-form-product input[name="cpu"]').val();
        var card = $('#edit-form-product input[name="card"]').val();
        var pin = $('#edit-form-product input[name="pin"]').val();
        var ram = $('#edit-form-product input[name="ram"]').val();
        var mota = $('#edit-form-product textarea[name="mota"]').val();
        var note = formValidateProduct(tenSP, giaban, tonkho, cpu, card, pin, ram, mota);
        if(note ===''){
            console.log("hello");
            // Serialize form data
            var formData = new FormData( $('#edit-form-product')[0]);
            formData.append('edit-product-btn', true);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/product.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success) alert('Cập nhật thành công.');
                    else alert('Sản phẩm này đã tồn tại.');
                },
            });
        }
        else alert(note);
    });
    /* End: update product */

    /* End: add form */
    $('button[name="delete-product-btn"]').click(function(event){
        // Prevent the default form submission
        event.preventDefault();

        var product_id = $('#edit-form-product input[name="idSP"]').val();
        $.ajax({
            url: 'controller/product.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'delete-product': true,
                'product_id': product_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    if(confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?")){
                        console.log(product_id);
                        $.ajax({
                            url: 'controller/product.php', // Replace with the actual PHP endpoint to fetch user details
                            type: 'POST',
                            data: {
                                'accept_delete_product': true,
                                'product_id': product_id,
                            },
                            success: function(response){
                                if(obj.success) window.location.href="?page=product";
                            },
                        });
                    }   
                } else{
                    alert('Đã ẩn sản phẩm.');
                    window.location.href="?page=product";
                }
            },
        });
    });
});


