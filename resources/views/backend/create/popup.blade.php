@extends('backend.inc.blank')
@section('content')
@php
    // dd($item);
    $status_value = (old('status') != null) ? old('status') : '';
    $option_status = [
        ['text' => 'Active', 'value' => 1], 
        ['text' => 'Inactive', 'value' => 0]
    ];
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
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Add {{ $crud->title }}</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ url($crud->url.'/create') }}" method="POST" enctype="multipart/form-data">
                            <div class="row ec-vendor-uploads">
                                <div class="col-lg-4">
                                    <div class="ec-vendor-img-upload">
                                        <div class="ec-vendor-main-img">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' name="img" id="imageUpload" class="ec-image-upload"
                                                        accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"><img
                                                            src="{{ URL::asset('assets/img/icons/edit.svg') }}"
                                                            class="svg_img header_svg" alt="edit" /></label>
                                                </div>
                                                <div class="avatar-preview ec-preview">
                                                    <div class="imagePreview ec-div-preview">
                                                        <img class="ec-image-preview"
                                                            src="{{ URL::asset('assets/img/products/vender-upload-preview.jpg') }}"
                                                            alt="edit" />
                                                    </div>
                                                </div>
                                            </div>
                                            @error('img')
                                                    <p class="msg-error">{{ $message }}</p>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="ec-vendor-upload-detail">
                                        <div class="row g-3" method="POST" action="{{ url($crud->url.'/create') }}" enctype="multipart/form-data">
                                            <div class="row g-3">
                                                {!! csrf_field() !!}
                                                <div class="col-md-12 mb-3">
                                                    <label for="name" class="form-label">Nama popup *</label>
                                                    <input type="text" class="form-control slug-title" name="name" value="{{ old('name') }}" id="name">
                                                    @error('name')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                                                    @error('description')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="url" class="form-label">Link URL</label>
                                                    <input type="text" class="form-control slug-title" name="url" value="{{ old('url') }}" id="name">
                                                    @error('url')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="col-sm-1 form-label">Tanggal Mulai</label>
                                                    <input type="text" autocomplete="off" name="date_start" class="form-control" value="{{ old('date_start') }}" id="datepicker1"  />
                                                    @error('date_start')
                                                    <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="col-sm-1 form-label">Tanggal Berakhir</label>
                                                    <input type="text" autocomplete="off" name="date_end" class="form-control" value="{{ old('date_end') }}" id="datepicker2"  />
                                                    @error('date_end')
                                                        <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-select" name="status">
                                                        @foreach ($option_status as $option)
                                                          @if ($status_value == $option['value'])
                                                          <option value="{{ $option['value'] }}" selected>{{ $option['text'] }}</option>  
                                                          @else
                                                          <option value="{{ $option['value'] }}" >{{ $option['text'] }}</option>  
                                                          @endif
                                                        @endforeach
                                                    </select>
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
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<!-- Option Switcher -->
	<script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script>

	<!-- Option Switcher -->
	{{-- <script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script> --}}

	<!-- Ekka Custom -->
	<script src="{{ URL::asset('assets/js/ekka.js') }}"></script> 
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
	<script>
		$('#datepicker1').datepicker({
                uiLibrary: 'bootstrap5',
                'format': 'dd-mm-yyyy'
            });

            $('#datepicker2').datepicker({
                uiLibrary: 'bootstrap5',
                'format': 'dd-mm-yyyy'
            });
	</script>
@endpush
