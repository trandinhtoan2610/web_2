$(document).ready(function() {
$('#login-form').submit(function(event){
    event.preventDefault();
    console.log('hello');
    // neu gio hang rong thi hien thong bao
    var email = $('#login-form input[name="email"]').val();
    var pass = $('#login-form input[name="pass"]').val();

    if(validateSignIn(email, pass)){
        var formData = new FormData( $('#login-form')[0]);
        $.ajax({
            url: 'controller/login.php', // Replace with the actual PHP endpoint to fetch category details
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success) window.location.href="index.php";
                else alert("Email hoặc mật khẩu không chính xác");
            },
        });
    }
});

$('#signUp-form').submit(function(event){
    event.preventDefault();
    console.log('hello');
    // neu gio hang rong thi hien thong bao
    var tenTK = $('#signUp-form input[name="tenTK"]').val();
    var email = $('#signUp-form input[name="email"]').val();
    var dienthoai = $('#signUp-form input[name="dienthoai"]').val();
    var diachi = $('#signUp-form input[name="diachi"]').val();
    var pass = $('#signUp-form input[name="pass"]').val();
    var re_pass = $('#signUp-form input[name="re_pass"]').val();

    if(validateSignUp(tenTK, email, dienthoai, diachi, pass, re_pass)){
        var formData = new FormData( $('#signUp-form')[0]);
        $.ajax({
            url: 'controller/signUp.php', // Replace with the actual PHP endpoint to fetch category details
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success) window.location.href="index.php";
                else alert("Người dùng đã tồn tại");
            },
        });
    }
});
});