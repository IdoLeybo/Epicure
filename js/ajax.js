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
                    $.ajax({
                        type:'post',
                        data: {
                            'action': 'epicure_save_users',
                            'type': 'post',
                        },
                        url: ajax_url.ajaxurl
                    })
                }

            })
        })
    });
})

