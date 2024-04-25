/* add-data form */
$(document).ready(function() {

    $('#add-form-category').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var tenHSX = $('#add-form-category input[name="tenHSX"]').val();
        var note = formValidateCategory(tenHSX);
        if(note ===''){
            // Serialize form data
            var formData = new FormData( $('#add-form-category')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/category.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success) alert('Thêm thành công.');
                    else alert('Thể loại này đã tồn tại.');
                },
            });
        }
        else alert(note);
    });
    /* End: add form */

    /* Start: edit form */
    $('#edit-form-category').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var tenHSX = $('#edit-form-category input[name="tenHSX"]').val();
        var note = formValidateCategory(tenHSX);
        if(note ===''){
            // Serialize form data
            var formData = new FormData( $('#edit-form-category')[0]);
            formData.append('edit-category-btn', true);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/category.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success) alert('Cập nhật thành công.');
                    else alert('Thể loại này đã tồn tại.');
                },
            });
        }
        else alert(note);
    });
    /* End: edit form */

    /* Start: unlock */
    $('.unlock_category').click(function() {
        // Display the form as a pop-up
        var category_id = $(this).closest('tr').find('.category_id').text();
        $.ajax({
            url: 'controller/category.php', // Replace with the actual PHP endpoint to fetch category details
            type: 'POST',
            data: {
                'unlock_category': true,
                'category_id': category_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="?page=category&index="+curr_page;
                }
            },
        });
   });
    /* End: unlock */

    /* Start: lock */
    $('.lock_category').click(function() {
        // Display the form as a pop-up
        var category_id = $(this).closest('tr').find('.category_id').text();
        $.ajax({
            url: 'controller/category.php', // Replace with the actual PHP endpoint to fetch category details
            type: 'POST',
            data: {
                'lock_category': true,
                'category_id': category_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="?page=category&index="+curr_page;
                }
            },
        });
   });
    /* End: lock */
});


