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
                        // validate_fields(form, validation_class, field, secret_key);
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
                                // if (elementId.includes('ckeditor')) {}

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
         * Update contact me information data
         */
        $(document).on("submit", "#contactMeInformationUpdateForm", function(e){

            e.preventDefault();

            $('#contactMeInformationUpdateForm .ajax-submit .submit-btn-text').toggleClass('hide');
            $('#contactMeInformationUpdateForm .ajax-submit .ajax-spinner').toggleClass('hide');
            var classNameOrId = "#contactMeInformationUpdateForm";

            var form = $('#contactMeInformationUpdateForm')[0];
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

                        $(".contact_me_information_phone").val(data.updatedRowData[0].phone);
                        $(".contact_me_information_email").val(data.updatedRowData[0].email);
                        $(".contact_me_information_address").val(data.updatedRowData[0].address);

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

        $(document).on('click', '.uncheckedBtn', function(){
            var slug = $(this).closest('div').attr('data-slug');
            var url = '/contact-us/messages/update/'+slug;

            $.ajax({
                type:'get',
                url:url,
                success:function(data){

                    if(data.message_status == '1'){
                        $(".message-status-"+slug+" .uncheckedBtn").hide();
                        $(".message-status-"+slug+" .checkedBtn").show();
                    }else{
                        $(".message-status-"+slug+" .uncheckedBtn").show();
                        $(".message-status-"+slug+" .checkedBtn").hide();
                    }

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        });

        $(document).on('click', '.checkedBtn', function(){
            var slug = $(this).closest('div').attr('data-slug');
            var url = '/contact-us/messages/update/'+slug;

            $.ajax({
                type:'get',
                url:url,
                success:function(data){

                    if(data.message_status == '1'){
                        $(".message-status-"+slug+" .uncheckedBtn").hide();
                        $(".message-status-"+slug+" .checkedBtn").show();
                    }else{
                        $(".message-status-"+slug+" .uncheckedBtn").show();
                        $(".message-status-"+slug+" .checkedBtn").hide();
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
