jQuery(document).ready(function($) {
    $(document).ready(() => {
        $('.remove-reservation').on('click', function(e) {
            e.preventDefault();
            let id = $(this).attr('data-reservation');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((response) => {
                if (response.isConfirmed) {
                    $.ajax({
                        type:'post',
                        data: {
                            'action': 'epicure_delete_reservation',
                            'id': id,
                            'type': 'delete',
                        },
                        url: admin_ajax.ajaxurl,
                        success: function (data) {
                            let result = JSON.parse(data);
                            if(result.response == 'success') {
                                jQuery("[data-reservation='"+ result.id +"']").parent().parent().remove();
                                Swal.fire(
                                    'Reservation Deleted!',
                                    'Success, the reservation was deleted!',
                                    'success'
                                )
                            }
                        }

                    })
                }

            })
        })
    });
})
