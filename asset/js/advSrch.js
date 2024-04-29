/* validate form */
function formSrchValidate(form) {
    let tenSP = form.tenSP.value;
    let idHSX = form.idHSX.value;
    let priceFrom = form.priceFrom.value;
    let priceTo = form.priceTo.value;
// 1. ko nhap o nao
// 2. chi nhap o priceFrom hoac priceTo
    if(tenSP=="" || idHSX=="" || priceFrom=="" || priceTo==""){
        alert("vui lòng điền thông tin!");
        return false;
    }
    
    if(isNaN(priceFrom) || isNaN(priceTo)){
        alert("Khoảng giá không hợp lệ");
        return false;
    }

    if(priceFrom<=0 || priceTo<=0 || (priceFrom > priceTo)){
        alert("Khoảng giá không hợp lệ");
        return false;
    }
}
/* validate form */

