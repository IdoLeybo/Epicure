jQuery(document).ready(function($) {
    $('.mobile-menu a').on('click', () => {
        // $('nav.site-nav').toggle('slow')
        $('div.navigation-menu').toggle('slow')
    })

    const breakpoint = 768;
    $(window).resize(() => {
        if ($(document).width() >= breakpoint) {
            // $('nav.site-nav').show()
            $('div.navigation-menu').hide()
            // $('div.navigation-menu').show()
        } else {
            // $('nav.site-nav').hide()
            $('div.navigation-menu').hide()

        }
    })

})

window.onscroll = () => {
    const scroll = window.scrollY;
    fixedMenu(scroll)
}

function fixedMenu(scroll) {
    const headerScroll = document.querySelector('.header-nav');

    if(scroll > 280) {
        headerScroll.classList.add('fixed-top');
    } else {
        headerScroll.classList.remove('fixed-top');
    }
}