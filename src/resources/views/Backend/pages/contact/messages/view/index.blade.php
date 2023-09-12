@extends('Backend.layouts.master')
@section('title') @lang('translation.Datatables') @endsection
{{-- @section('title') @lang('translation.form-layouts') @endsection --}}
@section('css')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@section('content')
@component('Backend.components.breadcrumb')
@slot('li_1') Contact @endslot
@slot('title')Message @endslot
@endcomponent

@foreach($fetchedData as $data)

    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-n4 mx-n4 card-border-effect-none mb-n5 border-bottom-0 border-start-0 rounded-0">
                <div>
                    <div class="card-body pb-4 mb-5">
                        <div class="row">
                            <div class="col-md">
                                <div class="row align-items-center">
                                    <div class="col-md-auto">
                                        <div class="avatar-md mb-md-0 mb-4">
                                            <div class="avatar-title bg-white rounded-circle">
                                                <img src="{{ URL::asset('assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-sm" />
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md">
                                        <h4 class="fw-semibold" id="ticket-title" >{{ $data->subject }}</h4>
                                        <div class="hstack gap-3 flex-wrap">
                                            <div class="text-muted"><i class="ri-user-line align-bottom me-1"></i><span id="ticket-client">{{ $data->name }}</span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted"><i class="ri-mail-line align-bottom me-1"></i><span id="ticket-client">{{ $data->email }}</span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Create Date : <span class="fw-medium " id="create-date">{{ Carbon\Carbon::parse($data->created_at)->diffForHumans() }}</span></div>
                                            <div class="vr"></div>
                                            <div data-field="status" data-slug="{{ $data->slug }}" data-table-secret="{{ $data->encrypted_secret_key }}" class="message-status-{{ $data->slug }}">
                                                @if($data->status == 0)
                                                    <button class="btn btn-soft-secondary w-sm checkBtn checkedBtn" style="display: none" data-value="0">Checked</button>
                                                    <button class="btn btn-soft-danger w-sm checkBtn uncheckedBtn" data-value="1">Unchecked</button>
                                                @else
                                                    <button class="btn btn-soft-secondary w-sm checkBtn checkedBtn" data-value="0">Checked</button>
                                                    <button class="btn btn-soft-danger w-sm checkBtn uncheckedBtn" style="display: none" data-value="1">Unchecked</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!-- end card body -->
                </div>
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-body p-4">
                    <p>{!! html_entity_decode($data->message, ENT_QUOTES, 'UTF-8') !!}</p>
                </div>
            </div><!--end card-->
        </div>
    </div>

@endforeach

@include('Backend.pages.contact.messages.ajax.index')

@endsection
@section('script')

<script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>

<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

@endsection
