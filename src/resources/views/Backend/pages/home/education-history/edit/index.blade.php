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
@slot('title')Education History @endslot
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
                <h4 class="card-title mb-0 flex-grow-1">Education History List Data</h4>
                {{-- <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <label for="gutters-showcode" class="form-label text-muted">Show Code</label>
                    </div>
                </div> --}}
            </div>
            <div class="card-body">
                <div class="live-preview">
                    <form method="POST" action="{{ route('updateDataAndRedirect') }}" enctype="multipart/form-data" class="row g-3" id="educationHistoryListUpdateForm">
                        @csrf
                        @foreach ($fetchedData as $data)
                            <div class="row mt-2">
                                <div class="col-md-12 my-2">
                                    <label for="fullnameInput" class="form-label">Institute Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control ajax-validation-input @error('institute_name') is-invalid @enderror" value="{{ $data->institute_name }}" name="institute_name">
                                    <input type="hidden" name="table_secret_key" class="secret_key" value="{{ $data->encrypted_secret_key }}">
                                    <input type="hidden" name="slug" value="{{ $data->slug }}">
                                    <input type="hidden" name="route_path" value="home.education-history.index">
                                    <input type="hidden" class="ajax-validation-input method_type" name="method_type" value="update">
                                    @if ($errors->has('institute_name'))
                                        <span class="text-danger">{{ $errors->first('institute_name') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 my-2">
                                    <label for="degree" class="form-label">Degree <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control ajax-validation-input @error('degree') is-invalid @enderror" value="{{ $data->degree }}" name="degree">
                                    @if ($errors->has('degree'))
                                        <span class="text-danger">{{ $errors->first('degree') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 my-2">
                                    <label for="year" class="form-label">Year <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control ajax-validation-input @error('year') is-invalid @enderror" value="{{ $data->year }}" name="year">
                                    @if ($errors->has('year'))
                                        <span class="text-danger">{{ $errors->first('year') }}</span>
                                    @endif
                                </div>
                            </div>

                        @endforeach

                        <div class="col-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary non-ajax-submit">
                                    <div class="submit-btn-text">Update</div>
                                    <img class="ajax-spinner hide" src="{{ URL::asset('assets/images/spinner/spinner-ball-1.svg') }}" alt="" height="25px" width="50px">
                                </button>
                              </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div><!--end row-->

@include('Backend.pages.home.education-history.edit.ajax.index')

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
