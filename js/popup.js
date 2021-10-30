jQuery(document).ready(function($) {

    $('.exist').click(function (event) {
        event.preventDefault()

        const myDiv = document.getElementsByClassName(`${event.currentTarget.children[0].children[0].className}`)[0]
        myDiv.style.display = 'block'

        $('.light-container-1').css('height', $(document).height());
        $('.light-container-1').show();
    })

    $('.close-me').click(function (event) {      // Cross the button of pop window
        event.preventDefault()
        console.log(event.target)
        // $('.formError').remove();
        // $('#login').style.display = 'none'
        $('.light-container-1').hide(); //Hide the class
        // $('.light-container-2').hide();  //Hide the class

    });
})