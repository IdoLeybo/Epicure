jQuery(document).ready(function($) {
    $('.mobile-menu a').on('click', () => {
        // $('nav.site-nav').toggle('slow')
        $('div.navigation-menu').toggle('slow')
    })

    const breakpoint = 768;
    $(window).resize(() => {
        if ($(document).width() >= breakpoint) {
            $('div.navigation-menu').hide()
            // $('div.navigation-menu').show()
        } else {
            $('div.navigation-menu').hide()

        }
    })

    $(document).click(function(){
        $("#myDropdown").hide();
    });

    $("#myDropdown").click(function(e){
        e.stopPropagation();
    });
})
function openSearchField() {
    document.getElementById("mobile-header-search").classList.toggle("show");
    document.getElementById("drop-search").classList.toggle("hide");
}

function filterFunction() {
    let input, filter, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if(filter === '') div.style.display = 'none';
        if (txtValue.toUpperCase().indexOf(filter) > -1 && filter !== '') {
            div.style.display = "block"
            a[i].style.display = "block";
        } else {
            a[i].style.display = "none";
        }
    }
}

function filterHeaderFunction() {
    let input, filter, a, i;
    input = document.getElementById("myHeaderInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myHeaderDropdown");
    a = div.getElementsByTagName("a");

    for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;

        if(filter === '') {
            div.style.display = 'none';
        }
        if (txtValue.toUpperCase().indexOf(filter) > -1 && filter !== '') {

            div.style.display = "block"
            a[i].style.display = "block";
        } else {
            a[i].style.display = "none";
        }
    }
}

window.onscroll = () => {
    const scroll = window.scrollY;
    fixedMenu(scroll)
}

function fixedMenu(scroll) {
    const headerScroll = document.querySelector('.header-nav');

    if(scroll > 150) {
        headerScroll.classList.add('fixed-top');
    } else {
        headerScroll.classList.remove('fixed-top');
    }
}