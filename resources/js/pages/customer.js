$('.delete').click(function() {
    var customer_id = $(this).attr('customer-id');
    var customer_name = $(this).attr('customer-name');
    var customer_url = $(this).attr('customer-url');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: customer_name + " will be deleted, You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel! ',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            id = "#delete-customer-form-" + customer_id
            console.log(id)
            $(id).submit();
        }
    })
});
