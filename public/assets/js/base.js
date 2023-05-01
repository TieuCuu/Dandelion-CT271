//Click heart add active class
$(function () {
    $(document).on('click', '.recommend-heart', function (e) {
        e.preventDefault()
        $(this).hasClass('heart-active') ? $(this).removeClass('heart-active') : $(this).addClass('heart-active')

    })
})