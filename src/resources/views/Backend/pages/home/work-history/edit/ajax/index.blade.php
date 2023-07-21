<script type="text/javascript">

    $(document).ready(function () {

        ckEditor_Generator("role-description-ckeditor-classic");
        ckEditor_Generator("edit-role-description-ckeditor-classic");

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
         * Perform AJAX validation for a single input
         */
        $(document).on('keyup', '.ajax-validation-input', function() {
            var input = $(this);
            var value = input.val();
            var field = input.attr('name');
            var secret_key = $(this).closest('form').find('.secret_key').val();
            var form = $(this).closest('form');
            var validation_class = '.ajax-validation-input';
            var formId = "#" + $(this).closest('form').attr('id');
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
                        $(formId + " .non-ajax-submit").prop("disabled", false);
                    } else {
                        $(formId + " .non-ajax-submit").prop("disabled", true);
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

    });

</script>
