/* validate form */
function formSrchValidate(form) {
    let priceFrom = form.priceFrom.value;
    let priceTo = form.priceTo.value;
    priceFrom = parseFloat(priceFrom);
    priceTo = parseFloat(priceTo);
    if((priceFrom > priceTo)){
        alert("Khoảng giá không hợp lệ");
        return false;
    }
    return true;
}
/* validate form */

