/* add-data form */
$(document).ready(function() {

    $('#add-form-user').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var ten = $('#add-form-user input[name="tenTK"]').val();
        var email = $('#add-form-user input[name="email"]').val();
        var dienthoai = $('#add-form-user input[name="dienthoai"]').val();
        var diachi = $('#add-form-user input[name="diachi"]').val();
        var matkhau = $('#add-form-user input[name="matkhau"]').val();
        var note = formValidate(ten, email, dienthoai, diachi, matkhau);
        if(note ===''){
            // Serialize form data
            var formData = new FormData( $('#add-form-user')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/user.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success) alert('Thêm thành công');
                    else alert('Người này đã tồn tại do trùng email');
                },
            });
        }
        else alert(note);
    });
    /* End: add form */

    /* Start: edit form */
    $('#edit-form-user').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        console.log('hi');
        // validate form
        var ten = $('#edit-form-user input[name="tenTK"]').val();
        var email = $('#edit-form-user input[name="email"]').val();
        var dienthoai = $('#edit-form-user input[name="dienthoai"]').val();
        var diachi = $('#edit-form-user input[name="diachi"]').val();
        var note = formValidate(ten, email, dienthoai, diachi);
        if(note ===''){
            
            // Serialize form data
            var formData = new FormData( $('#edit-form-user')[0]);
            formData.append('edit-user-btn', true);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/user.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success) alert('Cập nhật thành công.');
                    else alert('Người này đã tồn tại do trùng email hoặc số điện thoại.');
                },
            });
        }
        else alert(note);
    });
    /* End: edit form */

    /* Start: unlock */
    $('.unlock_user').click(function() {
        // Display the form as a pop-up
        var user_id = $(this).closest('tr').find('.user_id').text();
        $.ajax({
            url: 'controller/user.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'unlock_user': true,
                'user_id': user_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="?page=user&index="+curr_page;
                }
            },
        });
   });
    /* End: unlock */

    /* Start: lock */
    $('.lock_user').click(function() {
        // Display the form as a pop-up
        var user_id = $(this).closest('tr').find('.user_id').text();
        $.ajax({
            url: 'controller/user.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'lock_user': true,
                'user_id': user_id,
            },
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                    var curr_page = $('.curr_page').val();
                    window.location.href="?page=user&index="+curr_page;
                }
            },
        });
   });
    /* End: lock */
});


