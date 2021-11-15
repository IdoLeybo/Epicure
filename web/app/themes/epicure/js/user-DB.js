jQuery(document).ready(function($) {

    $('.delete-user').on('click', function(e) {
        let id = parseInt(e.target.parentElement.parentElement.className);

        if(id !== 0) {
            ajaxurl = my_ajax.ajaxurl;

            let reservations_data = {
                action: 'epicure_delete_user_reservations',
                type: 'delete',
            }
            jQuery.post(ajaxurl,reservations_data,function (response) {
                console.log(response)
            })
        }
    })
})

