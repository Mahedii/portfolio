<script type="text/javascript">

    /**
     * Fetch selected inputs information
     * Set them in a modal for delete
     */
    $(document).on('click', '.ajax-delete-data-btn', function () {
        var slug = $(this).data('slug');
        var table_secret_key = $(this).closest('tr').data('table-secret');

        $("#zoomInDeleteModal .delete_field_row_slug").val(slug);
        $("#zoomInDeleteModal .delete_field_table_key").val(table_secret_key);

        $('#zoomInDeleteModal').modal('show');
    });

    /**
     * Delete selected data
     */
    $('#zoomInDeleteModal').on('click', '.confirm-ajax-delete-data-btn', function () {
        var slug = $('#delete_field_row_slug').val();
        var table_secret_key = $('#delete_field_table_key').val();
        var url = '/delete/'+table_secret_key+'/'+slug;
        // alert(url);

        // $('#zoomInDeleteModal').modal('hide');

        $.ajax({
            type:'DELETE',
            url:url,
            dataType:'json',
            success:function(data){
                if(data.status == 200) {
                    toastr.success(data.message);
                    // $(this).closest("tr").remove();
                    $("tr[data-slug="+data.deleted_slug+"]").hide();

                    $('#zoomInDeleteModal').modal('hide');
                    $('#deleteModalForm')[0].reset();
                } else {
                    toastr.error(data.message);
                }
            }
            ,error: function (xhr, ajaxOptions, thrownError) {
                toastr.error("Status: "+xhr.status+ " Message: "+thrownError);
            }
        });

    });

</script>
