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
@slot('title')Hero Section @endslot
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
                    <form action="javascript:void(0);" enctype="multipart/form-data" class="row g-3" id="heroSectionUpdateForm">
                        @csrf
                        @foreach ($heroSectionData as $data)
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <label for="fullnameInput" class="form-label">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control ajax-validation-input hero_sections_name @error('name') is-invalid @enderror" value="{{ $data->name }}" name="name">
                                    <input type="hidden" name="table_secret_key" class="secret_key" value="{{ $data->encrypted_table_name }}">
                                    <input type="hidden" name="slug" value="{{ $data->slug }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label for="quote" class="form-label">Quote<span class="text-danger">*</span></label>
                                    <textarea class="form-control ajax-validation-input hero_sections_quote" name="quote" id="ckeditor-classic" rows="3">{{ Str::limit($data->quote, 20) }}</textarea>
                                    @if ($errors->has('quote'))
                                        <span class="text-danger">{{ $errors->first('quote') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label for="quote" class="form-label">Image<span class="text-danger">*</span></label>
                                    <p class="text-muted">FilePond is a JavaScript library that
                                        optimizes multiple images for faster uploads and offers a great, accessible, silky
                                        smooth user experience.</p>
                                    <div class="file-drop-area">
                                        <label for="file-input">Click to Upload Files</label>
                                        <input type="file" class="ajax-validation-input" id="file-input" name="file_path">
                                        <div class="file-previews"></div>
                                        <button class="prev-button">&lt;</button>
                                        <button class="next-button">&gt;</button>
                                    </div>
                                    <div class="file-previews">
                                        <div class="file-preview">
                                            <div class="image-container">
                                                <img class="preview-image" src="{{ asset($data->file_path) }}" alt=""/>
                                                <span class="delete-image-icon"><i class="ri-delete-bin-fill align-bottom"></i></i></span>
                                            </div>
                                        </div>
                                    </div>
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
                            <tr data-table-secret="{{ $data->encrypted_table_name }}" data-id="{{ $data->id }}" id="row-{{ $data->id }}">
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
                                                <a href="javascript:void(0);" data-slug="{{$data->slug}}" class="dropdown-item edit-item-btn edit-typing-text-data">
                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit
                                                </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0);" data-slug="{{$data->slug}}" class="dropdown-item delete-typing-text-data">
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
                <form action="javascript:void(0);" enctype="multipart/form-data" id="typingTextAddForm">
                    @csrf
                    <input type="hidden" class="form-control secret_key" name="table_secret_key" value="{{ $typedTextsData[0]->encrypted_table_name }}">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="typingText" class="form-label">Typing Text</label>
                                <input type="text" class="form-control ajax-validation-input" name="text" placeholder="Enter typing text">
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
                <form action="javascript:void(0);" enctype="multipart/form-data" id="typingTextUpdateForm">
                    @csrf
                    <input type="hidden" class="form-control" id="slug" name="slug">
                    <input type="hidden" class="form-control" id="typed-text-row-id">
                    <input type="hidden" class="form-control secret_key" id="typing_text_secret_key" name="table_secret_key" value="">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="typingText" class="form-label">Typing Text</label>
                                <input type="text" class="form-control ajax-validation-input" id="typingTextVal" name="text" placeholder="Enter typing text">
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

<!-- Delete Modal For Typed Texts -->
<div id="zoomInDeleteModal" class="modal fade zoomIn" tabindex="-1" role="dialog" aria-labelledby="zoomInDeleteModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <form action="javascript:void(0);" enctype="multipart/form-data" id="typingTextDeleteForm">
                    @csrf
                    <input type="hidden" class="form-control" id="delete_field_typing_text_slug">
                    <input type="hidden" class="form-control secret_key "  id="delete_field_typing_text_secret_key">
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
                        <a href="javascript:void(0);" class="btn btn-danger confirm-delete-typing-text-data">Delete</a>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@include('Backend.pages.home.hero-section.ajax.index')

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
