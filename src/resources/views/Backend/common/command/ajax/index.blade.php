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
        $(document).on('click', '.artisan-command', function () {
            var value = $(this).data('value');
            var url = '/artisan/command/'+value;
            // toastr.info(url);

            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json',
                success: function(data){
                    if (data.status === 200) {
                        toastr.success(data.message);
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
         * Install given composer package
         */
        $(document).on("submit", "#composerPackageAddForm", function(e){

            e.preventDefault();

            $('#composerPackageAddForm .ajax-submit .submit-btn-text').toggleClass('hide');
            $('#composerPackageAddForm .ajax-submit .ajax-spinner').toggleClass('hide');
            var classNameOrId = "#composerPackageAddForm";

            var dataString = $('#composerPackageAddForm').serialize();
            // alert(dataString);

            $.ajax({
                url: "{{ route('composerPackageController') }}",
                type: 'POST',
                data: dataString,
                dataType: 'json',
                success: function(data) {
                    if(data.status == 200) {
                        ajaxSpinnerLoadToggle(classNameOrId);
                        ajaxLoadSubmitBtnToggle(classNameOrId);
                        toastr.success(data.message);

                        $('#zoomInComposerPackageAddModal').modal('hide');
                        $('#composerPackageAddForm')[0].reset();
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
    });

</script>
