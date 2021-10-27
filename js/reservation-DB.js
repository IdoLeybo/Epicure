jQuery(document).ready(function($) {

    $('.delete-db-item').on('click', function(e) {
        console.log('click')
        ajaxurl = my_ajax_object.ajax_url;
        console.log(ajaxurl)
        let id = parseInt(e.target.parentElement.className);
        console.log(id)

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
                    let res = JSON.parse(result)
                    console.log(res)
                    $("."+ res.id).remove();
                        Swal.fire(
                            'Reservation Deleted!',
                            'Success, the reservation was deleted!',
                            'success'
                        )
                })


                // $.ajax({
                //     type:'post',
                //     data: data,
                //     url: ajaxurl,
                //     success: function (data) {
                //         let result = JSON.parse(data);
                //         if(result.response == 'success') {
                //             $("."+ res.id).remove();
                //             Swal.fire(
                //                 'Reservation Deleted!',
                //                 'Success, the reservation was deleted!',
                //                 'success'
                //             )
                //         }
                //     }
                //
                // })


            }
        })
    })
})



