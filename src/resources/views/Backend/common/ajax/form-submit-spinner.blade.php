<script type="text/javascript">

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

</script>
