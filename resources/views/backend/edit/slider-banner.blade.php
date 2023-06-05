@extends('backend.inc.blank')
@section('content')
@php
    // dd($item);
    $status_value = (old('status') != null) ? old('status') : $item->status;
    $option_status = [
        ['text' => 'Active', 'value' => 1], 
        ['text' => 'Inactive', 'value' => 0]
    ];
@endphp
<div class="content">
        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
                <h1>Edit {{ $crud->title }}</h1>
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
    <form action="{{ url($crud->url.'/'.$id) }}" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Upload Banner *</h2>
                    </div>
                    <div class="card-body">
                        <div class="row ec-vendor-uploads">
                            <div class="ec-vendor-img-upload">
                                <div class="ec-vendor-main-img">
                                    <div class="avatar-upload" style="max-width: 100%;
                                    /* height: 400px; */
                                    margin: 0 auto 15px auto;">
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
                                                    style="max-height: 100%; width: 100%;"
                                                    src="{{ URL::asset('storage/images/banner/'.$item->img) }}"
                                                    alt="edit" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('img')
                            <p class="msg-error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit {{ $crud->title }}</h2>
                    </div>

                    <div class="card-body">
                        {{-- <form action="{{ url($crud->url.'/create') }}" method="POST" enctype="multipart/form-data"> --}}
                            <div class="row ec-vendor-uploads">
            
                                <div class="col-md-12">
                                    <div class="ec-vendor-upload-detail">
                                        <div class="row g-3" method="POST" action="{{ url($crud->url.'/create') }}" enctype="multipart/form-data">
                                            <div class="row g-3">
                                                {!! csrf_field() !!}
                                                <div class="col-md-12 mb-3">
                                                    <label for="name" class="form-label">Judul Pertama *</label>
                                                    <input type="text" class="form-control slug-title" name="title" value="{{ old('title', $item->title) }}" id="title">
                                                    @error('title')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="name" class="form-label">Judul Kedua *</label>
                                                    <input type="text" class="form-control slug-title" name="sub_title" value="{{ old('sub_title', $item->sub_title) }}" id="sub_title">
                                                    @error('sub_title')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Harga (Rp) *</label>
                                                    <input type="text" class="form-control" id="input-price" value="{{ old('price', $item->price) }}" placeholder="Enter price"/>
                                                    <input type="hidden" name="price" value="{{ old('price', $item->price) }}" id="input-price-hidden" />
                                                    @error('price')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Order *</label>
                                                    <input type="number" name="order" min="1" value="{{ old('order', $item->order) }}" class="form-control" id="order">
                                                    @error('order')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="name" class="form-label">Button Text *</label>
                                                    <input type="text" class="form-control slug-title" name="button_text" value="{{ old('button_text', $item->button_text) }}" id="button_text">
                                                    @error('button_text')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="name" class="form-label">URL Action *</label>
                                                    <input type="text" class="form-control slug-title" name="url" value="{{ old('url', $item->url) }}" id="url">
                                                    @error('url')
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
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
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
    <script src="{{ URL::asset('assets/plugins/cleave/cleave.min.js') }}"></script>
	<script>
		$(function(){
            var price = new Cleave('#input-price', {
                numeral: true,
                numeralDecimalMark: ',',
                delimiter: '.',
                numeralPositiveOnly: true,
                onValueChanged: function (e) {
                    // e.target = { value: '5100-1234', rawValue: '51001234' }
                    $('#input-price-hidden').val(e.target.rawValue).trigger('change');
                }
            });
        });
	</script>
@endpush
