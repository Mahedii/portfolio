<script type="text/javascript">

    $(document).ready(function () {

        /**
         * Fetch selected inputs information for marquee text
         * Set them in a modal for update
         */
        $('#marqueeTextData').on('click', '.ajax-edit-data-btn', function () {
            var slug = $(this).data('slug');
            var table_secret_key = $(this).closest('tr').data('table-secret');
            var id = $(this).closest('tr').data('id');
            var url = '/fetch/'+table_secret_key+'/'+slug;
            // alert(url);

            $.ajax({
                type:'GET',
                url:url,
                dataType:'json',
                success:function(data){
                    $('#marquee_text_secret_key').val(data.table_secret_key);
                    $('#marquee-text-row-id').val("row-"+id);
                    var tableData = data.field;
                    tableData.forEach(function(row) {
                        $('#slug').val(row.slug);
                        $('#marqueeTextNameVal').val(row.name);
                        $('#marqueeTextUrlVal').val(row.url);
                        $('#iconNameVal').val(row.icon_name);
                    });
                    $('#zoomInEditModal').modal('show');
                }
                ,error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error("Status: "+xhr.status+ " Message: "+thrownError);
                }
            });

        });

        /**
         * Add marquee text lists data
         */
        $(document).on("submit", "#marqueeTextAddForm", function(e){

            e.preventDefault();

            $('#marqueeTextAddForm .ajax-submit .submit-btn-text').toggleClass('hide');
            $('#marqueeTextAddForm .ajax-submit .ajax-spinner').toggleClass('hide');
            var classNameOrId = "#marqueeTextAddForm";

            var dataString = $('#marqueeTextAddForm').serialize();
            // alert(dataString);

            $.ajax({
                url: "{{ route('ajaxAddData') }}",
                type: 'POST',
                data: dataString,
                dataType: 'json',
                success: function(data) {
                    if(data.status == 200) {
                        ajaxSpinnerLoadToggle(classNameOrId);
                        ajaxLoadSubmitBtnToggle(classNameOrId);
                        toastr.success(data.message);
                        table = $('#buttons-datatables').DataTable();
                        table.clear();
                        var rows = showData(data.field);

                        $('#zoomInAddModal').modal('hide');
                        $('#marqueeTextAddForm')[0].reset();
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error("Status: "+xhr.status+ " Message: "+thrownError);
                }
            });

        });

        /**
         * Update marquee text lists data
         */
        $(document).on("submit", "#marqueeTextUpdateForm", function(e){

            e.preventDefault();

            $('#marqueeTextUpdateForm .ajax-submit .submit-btn-text').toggleClass('hide');
            $('#marqueeTextUpdateForm .ajax-submit .ajax-spinner').toggleClass('hide');
            var classNameOrId = "#marqueeTextUpdateForm";

            var form = $('#marqueeTextUpdateForm')[0];
            let formData = new FormData(form);
            var rowId = $("#marquee-text-row-id").val();

            // alert(dataString);

            $.ajax({
                url: "{{ route('ajaxUpdateData') }}",
                type: 'POST',
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {
                    if(data.status == 200) {
                        ajaxSpinnerLoadToggle(classNameOrId);
                        ajaxLoadSubmitBtnToggle(classNameOrId);
                        toastr.success(data.message);

                        var updatedRowData = data.updatedRowData;
                        var rowId = updatedRowData[0].id;

                        var table = $('#buttons-datatables').DataTable();
                        var row = table.row('#row-' + rowId);

                        row.cell(row.index(), 1).data(updatedRowData[0].name);
                        row.cell(row.index(), 2).data(createActions(updatedRowData[0]));
                        row.draw(false).node();

                        $('#zoomInEditModal').modal('hide');
                        $('#marqueeTextUpdateForm')[0].reset();
                    } else {
                        toastr.error(data.message);

                        // Display validation error messages if any
                        if (data.errors) {
                            var errors = data.errors;

                            // Clear previous error messages
                            $('.error-message').remove();

                            // Display the new error messages
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    var errorMessage = errors[key][0];
                                    $('input[name="' + key + '"]').after('<span class="text-danger error-message">' + errorMessage + '</span>');
                                }
                            }
                        }
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error("Status: "+xhr.status+ " Message: "+thrownError);
                }
            });

        });

        /**
         * Show fetched datatable data
         */
        function showData(data){

            var table = $('#buttons-datatables').DataTable();
            var id = 1;

            $.each(data, function( index, value ) {
                var row = table.row.add([id++, value.name, createActions(value)]).draw(false).node();
                $(row).attr('data-table-secret', value.secret_key); // Set data-table attribute
                $(row).attr('data-id', value.id);
                $(row).attr('data-slug', value.slug);
                $(row).attr('id', 'row-'+value.id);
            });

        }
    });

</script>
