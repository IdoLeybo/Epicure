jQuery(document).ready(function($) {

        // $('.delete-db-item').on('click', function(e) {
        //     e.preventDefault();
        //     let id = parseInt(e.target.parentElement.className);
        //
        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, delete it!'
        //     }).then((response) => {
        //         if (response.isConfirmed) {
        //             $.ajax({
        //                 type: 'POST',
        //                 data: {
        //                     'action': 'epicure_delete_reservation',
        //                     'id': id,
        //                     'type': 'delete',
        //                 },
        //                 url: my_ajax_object.ajax_url,
        //                 success: function (data) {
        //                     // let result = JSON.parse(data);
        //                     // if(result.response == 'success') {
        //                     // jQuery("[data-reservation='"+ result.id +"']").parent().parent().remove();
        //                     Swal.fire(
        //                         'Reservation Deleted!',
        //                         'Success, the reservation was deleted!',
        //                         'success'
        //                     )
        //                     // }
        //                 }
        //
        //             })
        //         }
        //     })
        // })

    $('.delete-db-item').on('click', function(e) {
        console.log('click')
        ajaxurl = my_ajax_object.ajax_url;
        let id = parseInt(e.target.parentElement.className);
        let data = {
            action: 'epicure_delete_reservation',
            id: id,
            type: 'delete'
        }
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })
        .then((response) => {
            if (response.isConfirmed) {
                jQuery.post(ajaxurl,data,function (result) {

                    // if(result.response == 'success') {

                        // jQuery("[data-reservation='"+ result.id +"']").parent().parent().remove();
                        Swal.fire(
                            'Reservation Deleted!',
                            'Success, the reservation was deleted!',
                            'success'
                        )
                    // }
                })
            }
        })
            //         if (response.isConfirmed) {
        jQuery.post(ajaxurl,data,function (response) {

        })
        // $.ajax({
        //     method: 'post',
        //     url: ajaxurl,
        //     data: data,
        //     success: function( result ) {
        //         if( result.response == 'success' ) {
        //             console.log('deleted')
        //             }
        //         },
        //
        //     })


        })

})



