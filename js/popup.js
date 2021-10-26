jQuery(document).ready(function($) {

    $('.exist').click(function () {     //.exit is class in CSS
        $('.light-container-1').css('height', $(document).height());
        $('.light-container-1').show();
    })

})