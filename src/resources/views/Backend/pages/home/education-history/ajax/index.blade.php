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
         * Fetch selected inputs information
         * Set them in a modal for delete
         */
        $('#educationHistoryListsData').on('click', '.ajax-delete-data-btn', function () {
            var slug = $(this).data('slug');
            var table_secret_key = $(this).closest('tr').data('table-secret');

            $("#zoomInDeleteModal .delete_field_row_slug").val(slug);
            $("#zoomInDeleteModal .delete_field_table_key").val(table_secret_key);

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
            var form = $(this).closest('form');
            var validation_class = '.ajax-validation-input';
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
                        // Remove the validation error message
                        input.siblings('.error-message').remove();

                        // Validate only the changing input form's inputs and display error messages if any
                        validate_fields(form, validation_class, field, secret_key);
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

                        // Validate only the changing input form's inputs and display error messages if any
                        validate_fields(form, validation_class, field, secret_key);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastr.error("Status: "+xhr.status+ " Message: "+thrownError);
                }
            });
        });

        /**
         * Validate all other input fields of a form when a input field is changed
         */
        function validate_fields(form, validation_class, changed_field, secret_key){
            form.find(validation_class).each(function() {
                var otherInput = $(this);
                var otherValue = otherInput.val();
                var otherField = otherInput.attr('name');
                var methodTypeValue = $(this).closest('form').find('.method_type').val();

                // Skip the current input
                if (otherField === changed_field || otherField === "method_type") {
                    return;
                }

                // Prepare the data for validation
                var otherData = {
                    field: otherField,
                    value: otherValue,
                    methodTypeValue: methodTypeValue,
                    secret_key: secret_key
                };

                // Send the AJAX request to validate other inputs
                $.ajax({
                    url: "{{ route('ajaxValidationData') }}",
                    type: "POST",
                    data: otherData,
                    dataType: 'json',
                    success: function(response) {
                        if (!response.success) {
                            // Validation failed, display error message(s)
                            var errors = response.errors;

                            // Clear previous error messages
                            otherInput.siblings('.error-message').remove();

                            // Display the new error messages
                            for (var key in errors) {
                                if (errors.hasOwnProperty(key)) {
                                    var errorMessage = errors[key][0];
                                    otherInput.after('<span class="text-danger error-message">' + errorMessage + '</span>');
                                }
                            }
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        toastr.error("Status: " + xhr.status + " Message: " + thrownError);
                    }
                });
            });
        }

        /**
         * Add education-history list data
         */
        $(document).on("submit", "#educationHistoryListAddForm", function(e){

            e.preventDefault();

            $('#educationHistoryListAddForm .ajax-submit .submit-btn-text').toggleClass('hide');
            $('#educationHistoryListAddForm .ajax-submit .ajax-spinner').toggleClass('hide');
            var classNameOrId = "#educationHistoryListAddForm";

            var dataString = $('#educationHistoryListAddForm').serialize();
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
                        $('#educationHistoryListAddForm')[0].reset();
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
         * Update education-history data
         */
        $(document).on("submit", "#educationHistoryUpdateForm", function(e){

            e.preventDefault();

            $('#educationHistoryUpdateForm .ajax-submit .submit-btn-text').toggleClass('hide');
            $('#educationHistoryUpdateForm .ajax-submit .ajax-spinner').toggleClass('hide');
            var classNameOrId = "#educationHistoryUpdateForm";

            var form = $('#educationHistoryUpdateForm')[0];
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

                        ajaxSpinnerLoadToggle(classNameOrId);
                        ajaxLoadSubmitBtnToggle(classNameOrId);

                        $('.error-message').remove();

                        $(".education_histories_title").val(data.updatedRowData[0].title);
                        $(".education_histories_description").val(data.updatedRowData[0].title_description);

                        toastr.success(data.message);
                    } else {
                        console.log(data.message);
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
         * Delete selected education-history list data
         */
        $('#zoomInDeleteModal').on('click', '.confirm-ajax-delete-data-btn', function () {
            var slug = $('#delete_field_row_slug').val();
            var table_secret_key = $('#delete_field_table_key').val();
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
                        $('#educationHistoryListsDeleteForm')[0].reset();
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
                var row = table.row.add([id++, value.institute_name, value.degree, value.year, createActions(value)]).draw(false).node();
                $(row).attr('data-table-secret', value.secret_key); // Set data-table attribute
                $(row).attr('data-id', value.id);
                $(row).attr('id', 'row-'+value.id);
            });

        }

        /**
         * Toggle hide class in ajax-spinner & ajax-load-done classes
         */
         function ajaxSpinnerLoadToggle(classNameOrId) {
            setTimeout(function() {
                $(classNameOrId + " .ajax-submit .ajax-spinner").toggleClass("hide");
                // For failed icon just replace ".ajax-load-done" with ".ajax-load-failed"
                $(classNameOrId + " .ajax-load-done").toggleClass("hide");
            }, 1000);
        }

        /**
         * Toggle hide class in ajax-load-done & submit-btn-text classes
         */
        function ajaxLoadSubmitBtnToggle(classNameOrId) {
            setTimeout(function() {
                $(classNameOrId + " .ajax-load-done").toggleClass("hide");
                $(classNameOrId + " .ajax-submit .submit-btn-text").toggleClass('hide');
            }, 3000);
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
                            '<a href="javascript:void(0);" data-slug="' + data.slug + '" class="dropdown-item edit-item-btn ajax-edit-data-btn" >' +
                                '<i class="ri-pencil-fill align-bottom me-2 text-muted"></i>' +
                                'Edit' +
                            '</a>' +
                        '</li>' +
                        '<li>' +
                            '<a href="#" data-slug="' + data.slug + '" class="dropdown-item ajax-delete-data-btn">' +
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
