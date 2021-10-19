jQuery(document).ready(function($) {
    $('.mobile-menu a').on('click', () => {
        $('nav.site-nav').toggle('slow')
    })

    const breakpoint = 768;
    $(window).resize(() => {
        if ($(document).width() >= breakpoint) {
            $('nav.site-nav').show()
        } else {
            $('nav.site-nav').hide()
        }
    })
})