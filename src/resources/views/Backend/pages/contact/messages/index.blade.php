@extends('Backend.layouts.master')
@section('title') @lang('translation.Datatables') @endsection
{{-- @section('title') @lang('translation.form-layouts') @endsection --}}
@section('css')
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@component('Backend.components.breadcrumb')
@slot('li_1') Contact @endslot
@slot('title')Message List @endslot
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
    <div class="col-lg-12">

        <div class="card">

            <div class="card-header">
                <h5 class="card-title mb-0">Message List</h5>
            </div>

            <div class="card-body">
                <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Create Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach($messageData as $key => $data)

                            <tr data-id="{{ $data->id }}" data-slug="{{ $data->slug }}" class="message-{{ $data->slug }}">
                                <td>{{ ++$key }}</td>
                                <td>
                                    <div data-slug={{ $data->slug }} class="message-status-{{ $data->slug }}">
                                        @if($data->status == 0)
                                            <button class="btn btn-soft-secondary w-sm checkedBtn" style="display: none">Checked</button>
                                            <button class="btn btn-soft-danger w-sm uncheckedBtn">Unchecked</button>
                                        @else
                                            <button class="btn btn-soft-secondary w-sm checkedBtn">Checked</button>
                                            <button class="btn btn-soft-danger w-sm uncheckedBtn" style="display: none">Unchecked</button>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->subject }}</td>
                                <td>{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a href="{{ route('messages.load.selectedData', $data->slug) }}" class="dropdown-item view-item-btn">
                                                    <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    View
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ route('messages.deleteData', $data->slug) }}" class="dropdown-item delete-item-btn" onclick="return confirm('Are you sure you want to delete this?');">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Delete
                                                </a>
                                            </li>

                                        </ul>

                                    </div>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<!--end row-->

@include('Backend.pages.contact.messages.ajax.index')

@endsection
@section('script')

<script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
