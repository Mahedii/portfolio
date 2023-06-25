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

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Dropzone</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <p class="text-muted">DropzoneJS is an open source library that provides drag’n’drop file uploads
                        with image previews.</p>

                        <div class="file-drop-area">
                            <input type="file" name="multiplefile[]" id="file-input" multiple>
                            <label for="file-input">Click to Upload Files</label>
                            <div class="file-previews"></div>
                            <button class="prev-button">&lt;</button>
                            <button class="next-button">&gt;</button>
                        </div>

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
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
