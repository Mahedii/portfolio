<script type="text/javascript">

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

</script>
