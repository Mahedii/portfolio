@extends('Backend.layouts.master')
@section('title') @lang('translation.Datatables') @endsection
{{-- @section('title') @lang('translation.form-layouts') @endsection --}}
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

<link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::asset('assets/libs/filepond/filepond.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@section('content')
@component('Backend.components.breadcrumb')
@slot('li_1') Home @endslot
@slot('title')Hero Section @endslot
@endcomponent


<form method="POST" action="{{ route('testData') }}" enctype="multipart/form-data" id="testForm" autocomplete="off">
    @csrf

    <div class="row mt-2">
        <div class="col-md-6">
            <label for="fullnameInput" class="form-label">Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control ajax-validation-input hero_sections_name @error('name') is-invalid @enderror" value="Mahadi" name="name">
            <input type="hidden" name="table_secret_key" class="secret_key" value="hero_sections">
            <input type="hidden" name="slug" value="hero_sections_data">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <label for="quote" class="form-label">Quote<span class="text-danger">*</span></label>
            <textarea class="form-control ajax-validation-input hero_sections_quote" name="quote" id="ckeditor-classic" rows="3">Hello</textarea>
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
        </div>
    </div>
    <!-- end row -->

    <div class="col-12 my-5">
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>

@endsection
@section('script')


<script src="{{ URL::asset('assets/js/custom.file.input.js') }}"></script>

<script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>

<script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/filepond/filepond.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/pages/form-file-upload.init.js') }}"></script>

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
