@extends('Backend.layouts.master')
@section('title') @lang('translation.Datatables') @endsection
{{-- @section('title') @lang('translation.form-layouts') @endsection --}}
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@section('content')
@component('Backend.components.breadcrumb')
@slot('li_1') Tables @endslot
@slot('title')Datatables @endslot
@endcomponent

<div class="border-0">
    <div class="row g-4">

        <div class="col-sm" style="margin-bottom: 1rem;">
            @if(session('crudMsg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('crudMsg') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="col-sm" style="margin-bottom: 1rem;">
            <div class="d-flex justify-content-sm-end">
                <a href="{{ url()->previous() }}" class="btn btn-success" id="addproduct-btn">
                    <i class="ri-arrow-left-line align-bottom me-1"></i>
                    Back
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Hero Section</h4>
                {{-- <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <label for="gutters-showcode" class="form-label text-muted">Show Code</label>
                    </div>
                </div> --}}
            </div>

            <div class="card-body">
                <div class="live-preview">
                    <form method="POST" action="" enctype="multipart/form-data" class="row g-3">
                        @csrf
                        @foreach ($heroSectionData as $data)
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label for="fullnameInput" class="form-label">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control ajax-validation-input @error('name') is-invalid @enderror" value="{{ $data->name }}" name="name">
                                    <input type="hidden" name="table_secret_key" id="secret_key" value="{{ $data->encrypted_table_name }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label for="quote" class="form-label">Quote<span class="text-danger">*</span></label>
                                    <textarea class="form-control ajax-validation-input" name="quote" id="ckeditor-classic" rows="3">{{ Str::limit($data->quote, 20) }}</textarea>
                                    @if ($errors->has('quote'))
                                        <span class="text-danger">{{ $errors->first('quote') }}</span>
                                    @endif
                                </div>
                            </div>

                        @endforeach

                        <div class="col-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div><!--end row-->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="row g-4">
                <div class="col-sm">
                    <div class="d-flex justify-content-sm">
                        <h5 class="card-title m-3">Typed Texts</h5>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="d-flex justify-content-sm-end">
                        <a href="javascript:void(0);" class="btn btn-success m-3"  data-bs-toggle="modal" data-bs-target="#zoomInAddModal">
                            <i class="ri-add-line align-bottom me-1"></i>
                            Add
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Text</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="typedTextData">
                        @foreach($typedTextsData as $key => $data)
                            <tr data-table-secret="{{ $data->encrypted_table_name }}" data-id="{{ $data->id }}">
                                <td>{{ ++$key }}</td>
                                <td>{{ $data->text }}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-end">
                                            {{-- <li>
                                                <a href="" target="_blank" class="dropdown-item">
                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                    View
                                                </a>
                                            </li> --}}

                                            <li>
                                                <a href="javascript:void(0);" data-slug="{{$data->slug}}" class="dropdown-item edit-item-btn edit-typing-text">
                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this?');">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Delete
                                                </a>
                                            </li>

                                        </ul>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<!--end row-->

<!-- Add Modal For Typed Texts -->
<div id="zoomInAddModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInAddModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zoomInEditModalLabel">Add Typing Text</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" enctype="multipart/form-data" id="typingTextAddFormData">
                    @csrf
                    <input type="hidden" class="form-control" name="table_secret_key" value="{{ $typedTextsData[0]->encrypted_table_name }}">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="typingText" class="form-label">Typing Text</label>
                                <input type="text" class="form-control" name="text" placeholder="Enter typing text">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal For Typed Texts -->
<div id="zoomInEditModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInEditModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zoomInEditModalLabel">Update Typing Text</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" enctype="multipart/form-data" id="typingTextUpdateFormData">
                    @csrf
                    <input type="hidden" class="form-control" id="slug" name="slug">
                    <input type="hidden" class="form-control" id="table_secret_key" name="table_secret_key">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="typingText" class="form-label">Typing Text</label>
                                <input type="text" class="form-control" id="typingTextVal" name="text" placeholder="Enter typing text">
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary ">Save Changes</button>
            </div> --}}

        </div>
    </div>
</div>

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
         * Fetch selected inputs information for typed text & set them in a modal for update
         */
        $('#typedTextData').on('click', '.edit-typing-text', function () {
            var slug = $(this).data('slug');
            var table_secret_key = $(this).closest('tr').data('table-secret');
            var url = '/fetch/'+table_secret_key+'/'+slug;
            // alert(url);

            $.ajax({
                type:'GET',
                url:url,
                dataType:'json',
                success:function(data){
                    $('#table_secret_key').val(data.table_secret_key);
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
         * Update typed text data
         */
        $(document).on("submit", "#typingTextUpdateFormData", function(e){

            e.preventDefault();

            var form = $('#typingTextUpdateFormData')[0];
            let formData = new FormData(form);

            var dataString = $('#typingTextUpdateFormData').serialize();
            // dataType: 'json',

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
                        table = $('#buttons-datatables').DataTable();
                        table.clear();
                        var rows = showData(data.field);

                        $('#zoomInEditModal').modal('hide');
                        $('#typingTextUpdateFormData')[0].reset();
                    } else {
                        toastr.error(data.message);
                        $('#zoomInEditModal').modal('hide');
                        $('#typingTextUpdateFormData')[0].reset();
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error("Status: "+xhr.status+ " Message: "+thrownError);
                }
            });

        });

        /**
         * Add typed text data
         */
        $(document).on("submit", "#typingTextAddFormData", function(e){

            e.preventDefault();
            var dataString = $('#typingTextAddFormData').serialize();
            // alert(dataString);

            $.ajax({
                url: "{{ route('ajaxAddData') }}",
                type: 'POST',
                data: dataString,
                dataType: 'json',
                success: function(data) {
                    console.log(data.status);
                    toastr.success(data.status);
                    if(data.status == 200) {
                        toastr.success(data.message);
                        table = $('#buttons-datatables').DataTable();
                        table.clear();
                        var rows = showData(data.field);

                        $('#zoomInAddModal').modal('hide');
                        $('#typingTextAddFormData')[0].reset();
                    } else {
                        toastr.error(data.message);
                        $('#zoomInAddModal').modal('hide');
                        $('#typingTextAddFormData')[0].reset();
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
                var row = table.row.add([id++, value.text, createActions(value)]).draw(false).node();
                $(row).attr('data-table-secret', value.secret_key); // Set data-table attribute
                $(row).attr('data-id', value.id);
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
                            '<a href="javascript:void(0);" data-slug="' + data.slug + '" class="dropdown-item edit-item-btn edit-typing-text" >' +
                                '<i class="ri-pencil-fill align-bottom me-2 text-muted"></i>' +
                                'Edit' +
                            '</a>' +
                        '</li>' +
                        '<li>' +
                            '<a href="javascript:void(0);" data-slug="' + data.slug + '" class="dropdown-item" onclick="return confirm(\'Are you sure you want to delete this?\');">' +
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

        /**
         * Perform AJAX validation for a single input
         */
        $(document).on('keyup', '.ajax-validation-input', function() {
            var input = $(this);
            var value = input.val();
            var field = input.attr('name');
            var secret_key = $("#secret_key").val();
            // alert(secret_key);

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
                    // alert(response.success);
                    console.log(response);
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
    });

</script>

@endsection
@section('script')

<script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

@endsection
