$(document).ready(function() {
    /* Start: edit form */
    $('#edit-form-order').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        // Serialize form data
        var formData = new FormData( $('#edit-form-order')[0]);
        formData.append('edit-order-btn', true);
        // AJAX request to handle form submission
        $.ajax({
            url: 'controller/order.php', // URL to handle form submission
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    $('#edit-form-order input[name="ngaycapnhat"]').val(obj.ngaycapnhat);
                    alert('Cập nhật thành công.');
                }
            },
        });
    });
    /* End: edit form */
});
