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

<style>
    .file-drop-area {
        border: 2px dashed #ccc;
        padding: 20px;
        text-align: center;
        cursor: pointer;
    }

    .file-drop-area input[type="file"] {
        display: none;
    }

    .file-previews {
        display: flex;
        flex-wrap: nowrap; /* Use wrap for disabling image slide horizontally */
        margin-top: 20px;
        padding-bottom: 10px; /* Add some bottom padding for better visual */
        touch-action: none;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        -webkit-overflow-scrolling: touch; /* Enable smooth scrolling on iOS */
        -ms-overflow-style: none; /* Hide scrollbar on Internet Explorer and Edge */
        scrollbar-width: none; /* Hide scrollbar on Firefox */
    }


    .file-preview {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 5px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        cursor: grab;
        user-select: none;
        touch-action: none;
        flex: 0 0 auto;
        flex-shrink: 0;
        scroll-snap-align: center;
        margin-right: 10px;
    }

    .file-preview img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin-bottom: 5px;
    }

    .file-preview .name {
        font-size: 12px;
    }

    .file-preview .size {
        font-size: 10px;
    }

    .file-preview .cancel {
        color: red;
        font-size: 12px;
        cursor: pointer;
    }

    .file-preview.dragging {
        opacity: 0.5;
        cursor: grabbing;
    }

    .drag-over {
        border: 2px dashed #999;
    }
    .slider {
        position: relative;
        overflow: hidden;
    }
    .prev-button,
    .next-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background-color: rgb(255, 255, 255);
        color: #000000;
        border: none;
        border-radius: 50%;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-top: 60px;
        transition: opacity 0.2s;
        opacity: 0;
    }
    .prev-button {
        left: 10px;
    }

    .next-button {
        right: 10px;
    }

    .prev-button:hover,
    .next-button:hover {
        opacity: 0.7;
    }

</style>

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
                            <label for="file-input">Drag & Drop files or Click to Upload</label>
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

<script type="text/javascript">

    $(document).ready(function () {

        document.getElementById("file-input").addEventListener("change", handleFileInputChange);

        document.querySelector(".file-previews").addEventListener("dragstart", handleDragStart);
        document.querySelector(".file-previews").addEventListener("dragenter", handleDragEnter);
        document.querySelector(".file-previews").addEventListener("dragend", handleDragEnd);
        document.querySelector(".file-previews").addEventListener("dragover", handleDragOver);
        document.querySelector(".file-drop-area").addEventListener("dragover", handleDragOver);

        document.querySelector(".file-drop-area").addEventListener("drop", handleDrop);

        document.querySelector(".prev-button").addEventListener("click", handlePrevButtonClick);
        document.querySelector(".next-button").addEventListener("click", handleNextButtonClick);
        document.querySelector(".file-previews").addEventListener("scroll", updateArrowButtonVisibility);
        document.getElementById("file-input").addEventListener("change", updateArrowButtonVisibility);


        let draggingElement = null;
        let initialIndex = 0;
        let currentIndex = 0;
        let selectedFiles = [];

        /**
         * Handle file input change events.
         */
        function handleFileInputChange(event) {
            const files = event.target.files;
            // selectedFiles = Array.from(files);
            addFilesToArray(files);
            previewFiles(selectedFiles);
            setMultipleFileValue(selectedFiles);
        }

        function handleDrop(event) {
            event.preventDefault();

            const files = event.dataTransfer.files;
            // selectedFiles = Array.from(files);
            addFilesToArray(files);
            previewFiles(selectedFiles);
            setMultipleFileValue(selectedFiles);
        }

        /**
         * Add all files to the array
         */
        function addFilesToArray(files) {
            for (let i = 0; i < files.length; i++) {
                selectedFiles.push(files[i]);
            }
        }

        /**
         * Remove selected files from the array
         */
        function removeFileFromArray(index) {
            selectedFiles.splice(index, 1);
        }

        /**
         * Set the files from array to the input
         */
        function setMultipleFileValue(files) {
            const fileInput = document.getElementById("file-input");
            const dataTransfer = new DataTransfer();

            for (let i = 0; i < files.length; i++) {
                dataTransfer.items.add(files[i]);
            }

            fileInput.files = dataTransfer.files;
        }

        /**
         * Handle file preview, cancel, detail view
         */
        function previewFiles(files) {
            const filePreviews = document.querySelector(".file-previews");
            filePreviews.innerHTML = "";

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                // selectedFiles.push(file);
                const reader = new FileReader();

                reader.onload = (e) => {
                    const filePreviews = document.createElement("div");
                    filePreviews.className = "file-preview";

                    const img = document.createElement("img");
                    img.src = e.target.result;

                    const name = document.createElement("div");
                    name.className = "name";
                    name.textContent = file.name;

                    const size = document.createElement("div");
                    size.className = "size";
                    size.textContent = `${(file.size / 1024).toFixed(2)} KB`;
                    // size.textContent = formatFileSize(file.size);

                    const cancel = document.createElement("div");
                    cancel.className = "cancel";
                    cancel.textContent = "Cancel";

                    img.addEventListener("click", () => {
                        showImagePreview(e.target.result);
                    });

                    cancel.addEventListener("click", () => {
                        filePreviews.remove();
                        removeFileFromArray(i);
                        setMultipleFileValue(selectedFiles);
                        updateArrowButtonVisibility();
                    });

                    filePreviews.appendChild(img);
                    filePreviews.appendChild(name);
                    filePreviews.appendChild(size);
                    filePreviews.appendChild(cancel);

                    document.querySelector(".file-previews").appendChild(filePreviews);
                    updateArrowButtonVisibility();
                };

                reader.readAsDataURL(file);
            }
        }

        /**
         * Format input file size
         */
        function formatFileSize(size) {
            if (size === 0) {
                return "0 Bytes";
            }

            const k = 1024;
            const sizes = ["Bytes", "KB", "MB", "GB", "TB"];
            const i = Math.floor(Math.log(size) / Math.log(k));

            return parseFloat((size / Math.pow(k, i)).toFixed(2)) + " " + sizes[i];
        }

        /**
         * Update arrow button visibility according to preview file width
         */
        function updateArrowButtonVisibility() {
            const fileInput = document.getElementById("file-input");
            const filePreviews = document.querySelector(".file-previews");
            const prevButton = document.querySelector(".prev-button");
            const nextButton = document.querySelector(".next-button");

            if (fileInput.files.length > 0 && filePreviews.scrollWidth > filePreviews.offsetWidth) {
                prevButton.style.opacity = "1";
                nextButton.style.opacity = "1";
            } else {
                prevButton.style.opacity = "0";
                nextButton.style.opacity = "0";
            }
        }

        /**
         * Previous Button click action
         */
        function handlePrevButtonClick(event) {
            event.preventDefault(); // Prevent page reload

            const filePreviews = document.querySelector(".file-previews");
            const slideWidth = (1 / 3) * filePreviews.offsetWidth;
            filePreviews.scrollBy({
                left: -slideWidth, //filePreviews.offsetWidth,
                behavior: "smooth"
            });
        }

        /**
         * Next Button click action
         */
        function handleNextButtonClick(event) {
            event.preventDefault(); // Prevent page reload
            const filePreviews = document.querySelector(".file-previews");
            const slideWidth = (1 / 3) * filePreviews.offsetWidth;
            filePreviews.scrollBy({
                left: slideWidth, //filePreviews.offsetWidth,
                behavior: "smooth"
            });
        }

        /**
         * Handle
         */
        function handleDragStart(event) {
            draggingElement = event.target.closest(".file-preview");
            draggingElement.classList.add("dragging");

            initialIndex = Array.from(draggingElement.parentNode.children).indexOf(draggingElement);
            currentIndex = initialIndex;

            event.dataTransfer.setDragImage(new Image(), 0, 0);

            // Add scroll behavior to the file previews container while dragging
            document.querySelector(".file-previews").style.scrollBehavior = "auto";
        }

        function handleDragOver(event) {
            event.preventDefault();
        }

        function handleDragEnter(event) {
            event.preventDefault();
            const targetElement = event.target.closest(".file-preview");

            if (targetElement && targetElement !== draggingElement) {
                const targetIndex = Array.from(targetElement.parentNode.children).indexOf(targetElement);

                if (currentIndex < targetIndex) {
                    targetElement.parentNode.insertBefore(draggingElement, targetElement.nextSibling);
                } else {
                    targetElement.parentNode.insertBefore(draggingElement, targetElement);
                }

                currentIndex = targetIndex;
            }
        }

        function handleDragEnd() {
            if (draggingElement) {
                draggingElement.classList.remove("dragging");
                draggingElement = null;
            }
        }

        /**
         * Show the preview image
         */
        function showImagePreview(imageUrl) {
            const previewModal = document.createElement("div");
            previewModal.className = "preview-modal";

            const previewImage = document.createElement("img");
            previewImage.src = imageUrl;

            previewModal.appendChild(previewImage);
            document.body.appendChild(previewModal);

            previewModal.addEventListener("click", () => {
                previewModal.remove();
            });
        }

    });

</script>


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
