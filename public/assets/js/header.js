// navbar scroll fixed on top
$(function () {
    $(window).scroll(function () {

        const navbar = $('.navbar-block')
        const navbarHeight = $('.navbar-block').outerHeight()

        if ($(window).scrollTop() >= navbarHeight / 4) {
            navbar.css({ "transform": "scale(1.02)", "transition": "0.35s all ease-in" })
        } else {
            navbar.css({ "transform": "scale(1)", "transition": "0.35s all ease-in" })
        }
    })
})

//Back to top with smoothly scroll
$(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#back-to-top').fadeIn()
        } else {
            $('#back-to-top').fadeOut()
        }
    })
    $('#back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 300);
        return false;
    })
})

//Click menu navbar, then add item--active class
$(function () {

    $('.navbar-category .nav-item').click(function () {
        //remove old active class
        const oldActive = $('.navbar-category .nav-item .nav-link.item--active')
        oldActive.removeClass('item--active')

        //add class active when click
        $(this).children('.nav-link').addClass('item--active')
    })
})
