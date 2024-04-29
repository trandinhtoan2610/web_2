$(document).ready(function() {
    /* Start: edit form */
    $('#signIn-form').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        // Serialize form data
        var email = $('#signIn-form input[name="email"]').val();
        var matkhau = $('#signIn-form input[name="matkhau"]').val();
        var note = formValidate(email, matkhau);
        if(note ===''){
            var formData = new FormData( $('#signIn-form')[0]);
            formData.append('signIn-btn', true);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/signIn.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success){
                        alert('Đăng nhập thành công.');
                        window.location.href="?page=product";
                    }
                    else alert('Email hoặc mật khẩu không đúng.');
                },
            });
        }
        else alert(note);
    });
    /* End: edit form */
});