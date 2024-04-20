/* them anh */
let itemPic = document.getElementById("item_pic");
let itemFile = document.getElementById("item_file");


itemFile.onchange = function(){
    itemPic.src = URL.createObjectURL(itemFile.files[0]);
}
/* them anh */

/* side bar */
function w3_open() {
    document.getElementById("main").style.marginLeft = "15%";
    document.getElementById("mySidebar").style.width = "15%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
    document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("openNav").style.display = "inline-block";
}                
/* side bar */

/* validate form */
function formValidate(ten, email, dienthoai, diachi) {
    let alert = '';
    let phoneRegex = /^0[0-9]{9}$/;
    let emailRegex = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;

    //Fullname
    if(ten === ''){ //nếu tên rỗng
        alert = "Vui lòng nhập họ tên.";
        return alert;
    }
    else if(ten.length < 3){
        alert = "Vui lòng nhập họ tên nhiều hơn 3 ký tự.";
        return alert;
    }

    //Email
    if(email === '') {
        alert = "Vui lòng nhập email của bạn.";
        return alert;
    }
    else if(!emailRegex.test(email)) {
        alert = "Email không hợp lệ.";
        return alert;
    }

    //Phone number
    if(dienthoai === '') {
        alert = "Vui lòng nhập số điện thoại.";
        return alert;
    }
    else if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)) {
        alert = "Sai định dạng số điện thoại";
        return alert;
    }

    //diachi
    if(diachi === ''){
        alert = "Vui lòng nhập số địa chỉ.";
        return alert;
    }
    return alert;
}
/* validate form */

/* product validate */
function formValidateProduct(tenSP, giaban, tonkho, cpu, card, pin, ram, mota){
    let alert = '';

    // tensp
    if(tenSP == ""){
        alert = "Vui lòng nhập tên sản phẩm.";
        return alert;
    }

    // giaban
    if(giaban == "" || isNaN(giaban) || giaban <=0){
        alert = "Vui lòng nhập giá bán hợp lệ.";
        return alert;
    }

    // tonkho
    if(tonkho == "" || isNaN(tonkho) || tonkho <=0){
        alert = "Vui lòng nhập tồn kho hợp lệ.";
        return alert;
    }

    // cauhinh
    if(cpu == "" || card == "" || pin == "" || ram == "" || mota == ""){
        alert = "Vui lòng nhập cấu hình.";
        return alert;
    }
    return alert;
}
/* product validate */

/* category validate */
function formValidateCategory(tenHSX){
    let alert = '';

    // tensp
    if(tenHSX == ""){
        alert = "Vui lòng nhập tên hãng sản xuất.";
        return alert;
    }
    return alert;
}
/* category validate */
