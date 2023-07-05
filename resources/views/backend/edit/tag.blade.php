@extends('backend.inc.blank')
@section('content')
@php
    $name = (old('name') != null) ? old('name') : $item->name;
    $slug = (old('slug') != null) ? old('slug') : $item->slug;
@endphp
<div class="content">
        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
                <h1>Add {{ $crud->title }}</h1>
            </div>
            <div>
                {{-- <a href="product-list.html" class="btn btn-primary"> View All
                </a> --}}
            </div>
            <div>
                <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>{{ $crud->title }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Add {{ $crud->title }}</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ url($crud->url.'/'.$id) }}" method="POST" enctype="multipart/form-data">
                            <div class="row ec-vendor-uploads">
                                
                                <div class="col">
                                    <div class="ec-vendor-upload-detail">
                                        <div class="row g-3" method="POST" action="{{ url($crud->url.'/create') }}" enctype="multipart/form-data">
                                            <div class="row g-3">
                                                {!! csrf_field() !!}
                                                <div class="col-md-12 mb-3">
                                                    <label for="name" class="form-label">Nama *</label>
                                                    <input type="text" name="name" value="{{ $name }}" class="form-control slug-title" id="inputEmail4">
                                                    @error('name')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="slug" class="col-12 col-form-label">Slug</label> 
                                                    <div class="col-12">
                                                        <input id="slug" name="slug" value="{{ $slug }}" class="form-control here set-slug" type="text">
                                                    </div>
                                                    @error('slug')
                                                        <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Content -->
@endsection

@push('styles')
	<!-- No Extra plugin used -->
	<link href="{{ URL::asset('assets/plugins/data-tables/datatables.bootstrap5.min.css') }}" rel='stylesheet'>
	<link href="{{ URL::asset('assets/plugins/data-tables/responsive.datatables.min.css') }}" rel='stylesheet'>

    <style>
        .ec-vendor-uploads .ec-vendor-upload-detail label{
            width: 100%;
            text-transform: uppercase;
            font-weight: 500;
        }
        .msg-error {
            margin-top: 3px;
            color: red !important;
        }
    </style>

@endpush

@push('scripts')
	<!-- Option Switcher -->
	<script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script>

	<!-- Option Switcher -->
	{{-- <script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script> --}}

	<!-- Ekka Custom -->
	<script src="{{ URL::asset('assets/js/ekka.js') }}"></script> 
	<script>
		
	</script>
@endpush
