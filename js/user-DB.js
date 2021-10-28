jQuery(document).ready(function($) {

    $('.delete-user').on('click', function(e) {
        let id = parseInt(e.target.parentElement.parentElement.className);
        if(id !== 0) {
            ajaxurl = my_ajax.ajaxurl;
            let users_data = {
                action: 'epicure_delete_user',
                type: 'delete'
            }
            let reservations_data = {
                action: 'epicure_delete_user_reservations',
                type: 'delete',
            }
            jQuery.post(ajaxurl,users_data,function () {})
            jQuery.post(ajaxurl,reservations_data,function () {})

        }
    })
})

