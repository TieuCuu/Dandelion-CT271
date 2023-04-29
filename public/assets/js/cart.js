//Increase-Decrease input number
$(function () {
    let minValue = parseInt($('#quantity').attr("min"));
    let maxValue = parseInt($('#quantity').attr("max"));

    $('#decrement').click(function () {
        let currentVal = parseInt($('#quantity').val());
        if (currentVal > minValue) {
            $('#quantity').val(+currentVal - 1);
        }
    })

    $('#increment').click(function () {
        let currentVal = parseInt($('#quantity').val());
        if (currentVal < maxValue) {
            $('#quantity').val(+currentVal + 1);
        }
    })

})

