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
                <h4 class="card-title mb-0 flex-grow-1">Gutters</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <label for="gutters-showcode" class="form-label text-muted">Show Code</label>
                        {{-- <input class="form-check-input code-switcher" type="checkbox" id="gutters-showcode"> --}}
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form method="POST" action="{{ route('pagePath', ['path' => 'header/navbar']) }}" enctype="multipart/form-data" class="row g-3">

                        @csrf

                        @foreach ($heroSectionData as $data)

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fullnameInput" class="form-label">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}" name="name">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="quote" class="form-label">Quote<span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="quote" id="ckeditor-classic" rows="3">{{ Str::limit($data->quote, 20) }}</textarea>
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
                        <h5 class="card-title m-3">Datatables</h5>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="d-flex justify-content-sm-end">
                        <a href="" class="btn btn-success m-3" id="addproduct-btn">
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
                            <tr data-table="{{ $data->encrypted_table_name }}" id="{{ $data->id }}">
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
                                                <a href="javascript:void(0);" class="dropdown-item edit-item-btn" onclick="return confirm('Are you sure you want to delete this?');">
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

<!-- Modal Blur -->
<div id="zoomInEditModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInEditModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zoomInEditModalLabel">Update Typing Text</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" enctype="multipart/form-data" id="typingTextFormData">
                    @csrf
                    <input type="hidden" class="form-control" id="slug" name="slug">
                    <input type="hidden" class="form-control" id="table_name" name="table_name">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="typingText" class="form-label">Typing Text</label>
                                <input type="text" class="form-control" id="typingTextVal" name="typingText" placeholder="Enter typing text">
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#typedTextData').on('click', '.edit-typing-text', function () {
            var slug = $(this).data('slug');
            var table = $(this).closest('tr').data('table');
            var url = '/fetch/'+table+'/'+slug;
            // alert(url);

            $.ajax({
                type:'GET',
                url:url,
                dataType:'json',
                success:function(data){
                    $('#table_name').val(data.table_name);
                    var tableData = data.field;
                    tableData.forEach(function(row) {
                        $('#slug').val(row.slug);
                        $('#typingTextVal').val(row.text);
                    });
                    $('#zoomInEditModal').modal('show');
                }
                ,error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });

        });

        $(document).on("submit", "#typingTextFormData", function(e){

            e.preventDefault();

            var form = $('#typingTextFormData')[0];
            let formData = new FormData(form);

            var dataString = $('#typingTextFormData').serialize();
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

                    // var rowData = {
                    //     id: data.field.id,
                    //     text: data.field.text,
                    //     action: ''
                    // };
                    // var table = $('#buttons-datatables').DataTable();
                    // table.row.add(rowData).draw();

                    $('#zoomInEditModal').modal('hide');
                    $('#typingTextFormData')[0].reset();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
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
