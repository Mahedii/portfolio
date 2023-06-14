<script type="text/javascript">

    $(document).ready(function () {

        /**
         * Set toastr options
         */
        toastr.options = {
            closeButton: true,
            newestOnTop: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 3000,
        };

        /**
         * Set CSRF token for form request
         */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /**
         * Fetch selected inputs information for typed text
         * Set them in a modal for update
         */
        $('#typedTextData').on('click', '.edit-typing-text-data', function () {
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
                    $('#typing_text_secret_key').val(data.table_secret_key);
                    $('#typed-text-row-id').val("row-"+id);
                    var tableData = data.field;
                    tableData.forEach(function(row) {
                        $('#slug').val(row.slug);
                        $('#typingTextVal').val(row.text);
                    });
                    $('#zoomInEditModal').modal('show');
                }
                ,error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error("Status: "+xhr.status+ " Message: "+thrownError);
                }
            });

        });

        /**
         * Fetch selected inputs information for typed text
         * Set them in a modal for delete
         */
        $('#typedTextData').on('click', '.delete-typing-text-data', function () {
            var slug = $(this).data('slug');
            var table_secret_key = $(this).closest('tr').data('table-secret');

            $("#delete_field_typing_text_slug").val(slug);
            $("#delete_field_typing_text_secret_key").val(table_secret_key);

            $('#zoomInDeleteModal').modal('show');
        });

        /**
         * Perform AJAX validation for a single input
         */
        $(document).on('keyup', '.ajax-validation-input', function() {
            var input = $(this);
            var value = input.val();
            var field = input.attr('name');
            var secret_key = $(this).closest('form').find('.secret_key').val();
            // alert(secret_key);
            // toastr.warning(field + ": " + value);

            // Prepare the data to be sent via AJAX
            var data = {
                field: field,
                value: value,
                secret_key: secret_key
            };

            // Send the AJAX request
            $.ajax({
                url: "{{ route('ajaxValidationData') }}",
                type: "POST",
                data: data,
                dataType:'json',
                success: function(response) {
                    if (response.success) {
                        // Validation passed, do something
                        // ...
                        input.siblings('.error-message').remove();
                    } else {
                        // Validation failed, display error message(s)
                        var errors = response.errors;

                        // Clear previous error messages
                        input.siblings('.error-message').remove();

                        // Display the new error messages
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                var errorMessage = errors[key][0];
                                // toastr.error(errorMessage);
                                input.after('<span class="text-danger error-message">' + errorMessage + '</span>');
                            }
                        }
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastr.error("Status: "+xhr.status+ " Message: "+thrownError);
                }
            });
        });

        /**
         * Add typed text data
         */
        $(document).on("submit", "#typingTextAddForm", function(e){

            e.preventDefault();
            var dataString = $('#typingTextAddForm').serialize();
            // alert(dataString);

            $.ajax({
                url: "{{ route('ajaxAddData') }}",
                type: 'POST',
                data: dataString,
                dataType: 'json',
                success: function(data) {
                    if(data.status == 200) {
                        toastr.success(data.message);
                        table = $('#buttons-datatables').DataTable();
                        table.clear();
                        var rows = showData(data.field);

                        $('#zoomInAddModal').modal('hide');
                        $('#typingTextAddForm')[0].reset();
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
         * Update typed text data
         */
        $(document).on("submit", "#typingTextUpdateForm", function(e){

            e.preventDefault();

            var form = $('#typingTextUpdateForm')[0];
            let formData = new FormData(form);
            var rowId = $("#typed-text-row-id").val();

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
                        toastr.success(data.message);

                        var updatedRowData = data.updatedRowData;
                        var rowId = updatedRowData[0].id;

                        var table = $('#buttons-datatables').DataTable();
                        var row = table.row('#row-' + rowId);

                        row.cell(row.index(), 1).data(updatedRowData[0].text); // Replace 'text' with the appropriate field name
                        row.cell(row.index(), 2).data(createActions(updatedRowData[0]));
                        row.draw(false).node();

                        $('#zoomInEditModal').modal('hide');
                        $('#typingTextUpdateForm')[0].reset();
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
         * Update hero section data
         */
        $(document).on("submit", "#heroSectionUpdateForm", function(e){

            e.preventDefault();

            var form = $('#heroSectionUpdateForm')[0];
            let formData = new FormData(form);

            $.ajax({
                url: "{{ route('ajaxUpdateData') }}",
                type: 'POST',
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
                success: function(data) {
                    if(data.status == 200) {
                        $(".hero_sections_name").val(data.updatedRowData[0].name);
                        $(".hero_sections_quote").val(data.updatedRowData[0].quote);
                        toastr.success(data.message);
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
         * Delete selected data for typed text
         */
        $('#zoomInDeleteModal').on('click', '.confirm-delete-typing-text-data', function () {
            var slug = $('#delete_field_typing_text_slug').val();
            var table_secret_key = $('#delete_field_typing_text_secret_key').val();
            var url = '/delete/'+table_secret_key+'/'+slug;
            // alert(url);

            $.ajax({
                type:'DELETE',
                url:url,
                dataType:'json',
                success:function(data){
                    if(data.status == 200) {
                        toastr.success(data.message);
                        // $(this).closest("tr").remove();
                        table = $('#buttons-datatables').DataTable();
                        table.clear();
                        var rows = showData(data.field);

                        $('#zoomInDeleteModal').modal('hide');
                        $('#typingTextDeleteForm')[0].reset();
                    } else {
                        toastr.error(data.message);
                    }
                }
                ,error: function (xhr, ajaxOptions, thrownError) {
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
                var row = table.row.add([id++, value.text, createActions(value)]).draw(false).node();
                $(row).attr('data-table-secret', value.secret_key); // Set data-table attribute
                $(row).attr('data-id', value.id);
                $(row).attr('id', 'row-'+value.id);
            });

        }

        /**
         * Set action buttons for datatable
         */
        function createActions(data) {
            var actionContent =
                '<div class="dropdown d-inline-block">' +
                    '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">' +
                        '<i class="ri-more-fill align-middle"></i>' +
                    '</button>' +
                    '<ul class="dropdown-menu dropdown-menu-end">' +
                        '<li>' +
                            '<a href="javascript:void(0);" data-slug="' + data.slug + '" class="dropdown-item edit-item-btn edit-typing-text-data" >' +
                                '<i class="ri-pencil-fill align-bottom me-2 text-muted"></i>' +
                                'Edit' +
                            '</a>' +
                        '</li>' +
                        '<li>' +
                            '<a href="javascript:void(0);" data-slug="' + data.slug + '" class="dropdown-item delete-typing-text-data" onclick="return confirm(\'Are you sure you want to delete this?\');">' +
                                '<i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>' +
                                'Delete' +
                            '</a>' +
                        '</li>' +
                    '</ul>' +
                '</div>';

            // <a class="dropdown-item" href="{{ route("pagePath", ":slug") }}">Text</a>
            // actionContent = actionContent.replace(":slug", data.slug);

            return actionContent;
        }
    });

</script>
