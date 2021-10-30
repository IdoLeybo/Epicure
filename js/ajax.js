jQuery(document).ready(function($) {
    $(document).ready(() => {
        $('.submit-button').on('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                icon: 'success',
                title: 'Thank for your reservation!',
                text: 'Reservation complited!',
                confirmButton: 'Ok'
            })
            .then((response) => {
                if (response.isConfirmed) {
                    let data = {
                        action: 'epicure_save_users',
                        type: 'post',
                    };
                    let url = ajax_url.ajaxurl;
                    jQuery.post(url, data, function (response){
                        console.log(response)
                    })
                }

            })
        })
    });
})

