/* toggle register - login */
const wrapper=document.querySelector('.wrapper');
const loginLink=document.querySelector('.login-link');
const registerLink=document.querySelector('.register-link');
const title=document.querySelector('.title');
const btn_register = document.getElementById("btn-register");
const txtHint = document.getElementById("txtHint");                          
registerLink.addEventListener('click',()=>{
    wrapper.classList.add('active');
});
loginLink.addEventListener('click',()=>{
    wrapper.classList.remove('active');
});

function validateSignIn(email, pass){
    if(email == "" || pass == ""){
        alert("Vui lòng nhập đủ thông tin");
        return false;
    }
    return true;
}

function validateSignUp(tenTK, email, dienthoai, diachi, pass, re_pass){
    if(tenTK == "" || email == "" || dienthoai == "" || diachi == "" || pass == "" || re_pass == ""){
        alert("Vui lòng nhập đủ thông tin");
        return false;
    }

    //dienthoai
    let phoneRegex = /^0[0-9]{9}$/;
    if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)) {
        alert("Sai định dạng số điện thoại");
        return false;
    }

    //password
    if(pass !== re_pass){
        alert("Mật khẩu nhập lại không chính xác");
        return false;
    }
    
    return true;
}

