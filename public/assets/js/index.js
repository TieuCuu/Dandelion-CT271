
// Click menu popular, product jump to it and focus
$(function () {
    let popPosition = $('#recommend-products').offset().top
    let proPosition = $('#main-products').offset().top
    let navHeight = $('.navbar-block').height()

    $('.nav-item.navbar-pop').click(() => {
        $('html, body').animate({
            scrollTop: popPosition - navHeight
        }, 400);
    })

    // $('.nav-item.navbar-pro').click(() => {
    //     $('html, body').animate({
    //         scrollTop: proPosition - navHeight
    //     }, 400);
    // })
})


//Click product button, fly to cart
let count = 0;

$(function () {
    $(document).on('click', '.cart-btn', function (e) {
        e.preventDefault()

        let cart = $('.menu-cart');
        // find the img of that card which button is clicked by user
        let imgtodrag = $(this).parent().parent().parent().find("img").eq(0);

        if (imgtodrag) {
            //duplicate the img
            var imgclone = imgtodrag.clone().offset({
                top: imgtodrag.offset().top + 50,
                left: imgtodrag.offset().left + 50
            }).css({
                'opacity': '0.8',
                'position': 'absolute',
                'height': '150px',
                'width': '150px',
                'border-radius': '5px',
                'z-index': '10000'
            }).appendTo($('body')).animate({
                'top': cart.offset().top + 10,
                'left': cart.offset().left + 5,
                'width': '40px',
                'height': '40px'
            }, 1000, 'easeInOutExpo');

            setTimeout(function () {
                count++;
                $(".menu-cart span.item-count").text(count);
            }, 1500);

            imgclone.animate({
                'width': 0,
                'height': 0
            }, function () {
                $(this).detach()
            });
        }
    })
})


function scrollWin() {
    let position = $('.product-container').position().top;
    position = position * 0.96;
    window.scrollTo(0, position);
}

//scroll To middle when clicking in paggination
$(document).on('click', '.pagination li.page-item', function () {
    scrollWin();
})












