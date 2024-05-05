$(document).ready(function() {
    /* Start: edit form */
    $('#signIn-form').submit(function(event) {
        event.preventDefault();
    console.log('helloooo');
    // neu gio hang rong thi hien thong bao
    var email = $('#signIn-form input[name="email"]').val();
    var pass = $('#signIn-form input[name="pass"]').val();

    if(validateSignIn(email, pass)){
        var formData = new FormData( $('#signIn-form')[0]);
        $.ajax({
            url: 'controller/signIn.php', // Replace with the actual PHP endpoint to fetch category details
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success) window.location.href="?page=product";
                else alert("Email hoặc mật khẩu không chính xác");
            },
        });
    }
    });
    /* End: edit form */
});