<script type="text/javascript">

    $(document).ready(function () {

        $(document).on('click', '.checkBtn', function(){
            var slug = $(this).closest('div').attr('data-slug');
            var field = $(this).closest('div').attr('data-field');
            var value = $(this).attr('data-value');
            var table = $(this).closest('div').attr('data-table-secret');

            // toastr.warning(table);
            // toastr.warning(slug);
            // toastr.warning(field + ": " + value);

            // Prepare the data to be sent via AJAX
            var data = {
                field: field,
                value: value,
                slug: slug,
                table_secret_key: table
            };

            $.ajax({
                url: "{{ route('updateSpecificFieldData') }}",
                type: "POST",
                data: data,
                dataType:'json',
                success: function(response) {
                    if(response.status == 200){
                        toastr.success(response.message);
                        if(value == 1){
                            $(".message-status-"+slug+" .uncheckedBtn").hide();
                            $(".message-status-"+slug+" .checkedBtn").show();
                        } else if(value == 0){
                            $(".message-status-"+slug+" .uncheckedBtn").show();
                            $(".message-status-"+slug+" .checkedBtn").hide();
                        }
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        });

    });

</script>
