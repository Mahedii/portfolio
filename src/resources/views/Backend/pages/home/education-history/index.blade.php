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
@slot('li_1') Home @endslot
@slot('title') Education History @endslot
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
                <a href="{{ url()->previous() }}" class="btn btn-success" id="">
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
                <h4 class="card-title mb-0 flex-grow-1">Education History</h4>
                {{-- <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <label for="gutters-showcode" class="form-label text-muted">Show Code</label>
                    </div>
                </div> --}}
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <form action="javascript:void(0);" enctype="multipart/form-data" class="row g-3" id="educationHistoryUpdateForm">
                        @csrf
                        @foreach ($educationHistoryData as $data)
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label for="fullnameInput" class="form-label">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control ajax-validation-input education_histories_title @error('title') is-invalid @enderror" value="{{ $data->title }}" name="title">
                                    <input type="hidden" name="table_secret_key" class="secret_key" value="{{ $data->encrypted_table_name }}">
                                    <input type="hidden" name="slug" value="{{ $data->slug }}">
                                    <input type="hidden" class="ajax-validation-input method_type" name="method_type" value="update">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label for="title_description" class="form-label">Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control ajax-validation-input education_histories_description" name="title_description" id="ckeditor-classic" rows="3">{{ Str::limit($data->title_description, 500) }}</textarea>
                                    @if ($errors->has('title_description'))
                                        <span class="text-danger">{{ $errors->first('title_description') }}</span>
                                    @endif
                                </div>
                            </div>

                        @endforeach

                        <div class="col-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary ajax-submit">
                                    <div class="submit-btn-text">Update</div>
                                    <img class="ajax-spinner hide" src="{{ URL::asset('assets/images/spinner/spinner-ball-1.svg') }}" alt="" height="25px" width="50px">
                                    <img class="ajax-load-done hide" src="{{ URL::asset('assets/images/spinner/check-mark.svg') }}" alt="" height="25px" width="50px">
                                    <img class="ajax-load-failed hide" src="{{ URL::asset('assets/images/spinner/x-mark.svg') }}" alt="" height="25px" width="50px">
                                </button>
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
                        <h5 class="card-title m-3">Education History Lists</h5>
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
                            <th>Institution</th>
                            <th>Degree</th>
                            <th>Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="educationHistoryListsData">
                        @foreach($educationHistoryListData as $key => $data)
                            <tr data-table-secret="{{ $data->encrypted_table_name }}" data-id="{{ $data->id }}" id="row-{{ $data->id }}">
                                <td>{{ ++$key }}</td>
                                <td>{{ $data->institute_name }}</td>
                                <td>{{ $data->degree }}</td>
                                <td>{{ $data->year }}</td>
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
                                                <a href="{{ route('loadDataAndRedirect',['path' => 'home.education-history.edit.index', 'table' => $data->encrypted_table_name, 'data' => $data->slug]) }}" data-slug="{{$data->slug}}" class="dropdown-item edit-item-btn">
                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" data-slug="{{$data->slug}}" class="dropdown-item ajax-delete-data-btn">
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

<!-- Add Modal For Education History List -->
<div id="zoomInAddModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInAddModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zoomInEditModalLabel">Add Education History List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0);" enctype="multipart/form-data" id="educationHistoryListAddForm">
                    @csrf
                    <input type="hidden" class="form-control secret_key" name="table_secret_key" value="{{ $educationHistoryListData[0]->encrypted_table_name }}">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="institute_name" class="form-label">Institute</label>
                                <input type="institute_name" class="form-control ajax-validation-input" name="institute_name">
                                <input type="hidden" class="ajax-validation-input method_type" name="method_type" value="create">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="degree" class="form-label">Degree</label>
                                <input type="degree" class="form-control ajax-validation-input" name="degree">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="year" class="form-label">Year</label>
                                <input type="year" class="form-control ajax-validation-input" name="year">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary ajax-submit">
                                    <div class="submit-btn-text">Add</div>
                                    <img class="ajax-spinner hide" src="{{ URL::asset('assets/images/spinner/spinner-ball-1.svg') }}" alt="" height="25px" width="50px">
                                    <img class="ajax-load-done hide" src="{{ URL::asset('assets/images/spinner/check-mark.svg') }}" alt="" height="25px" width="50px">
                                    <img class="ajax-load-failed hide" src="{{ URL::asset('assets/images/spinner/x-mark.svg') }}" alt="" height="25px" width="50px">
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal For Education History List -->
<div id="zoomInDeleteModal" class="modal fade zoomIn" tabindex="-1" role="dialog" aria-labelledby="zoomInDeleteModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <form action="javascript:void(0);" enctype="multipart/form-data" id="educationHistoryListsDeleteForm">
                    @csrf
                    <input type="hidden" class="form-control delete_field_row_slug" id="delete_field_row_slug">
                    <input type="hidden" class="form-control secret_key delete_field_table_key" id="delete_field_table_key">
                </form>
                <lord-icon
                    src="https://cdn.lordicon.com/tdrtiskw.json"
                    trigger="loop"
                    colors="primary:#f7b84b,secondary:#405189"
                    style="width:130px;height:130px">
                </lord-icon>

                <div class="mt-4">
                    <h4 class="mb-3">Are you sure you want to proceed?</h4>
                    <p class="text-muted mb-4"> If you are not sure than press the cancel button</p>
                    <div class="hstack gap-2 justify-content-center">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <a href="javascript:void(0);" class="btn btn-danger confirm-ajax-delete-data-btn">Delete</a>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@include('Backend.pages.home.education-history.ajax.index')

@endsection
@section('script')

<script src="{{ URL::asset('assets/js/custom.file.input.js') }}"></script>

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