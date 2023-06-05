@extends('backend.inc.blank')
@section('content')
@php
    // dd($item);
    $status_value = (old('status') != null) ? old('status') : $item->status;
    $option_status = [
        ['text' => 'Active', 'value' => 1], 
        ['text' => 'Inactive', 'value' => 0]
    ];
    $rate_value = (old('rate') != null) ? old('rate') : $item->rate;
    $option_rate = [
        1, 2, 3, 4, 5
    ];

    $vendor_value = (old('vendor_id') != null) ? old('vendor_id') : $item->vendor_id;
    $kategori_value = (old('kategori_id') != null) ? old('kategori_id') : $item->kategori_id;
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
        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit {{ $crud->title }}</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ url($crud->url.'/'.$id) }}" method="POST" enctype="multipart/form-data">
                            <div class="row ec-vendor-uploads">
                                <div class="col-lg-4">
                                    <div class="ec-vendor-img-upload">
                                        <div class="ec-vendor-main-img">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' name="product_image_1" id="imageUpload" class="ec-image-upload"
                                                        accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"><img
                                                            src="{{ URL::asset('assets/img/icons/edit.svg') }}"
                                                            class="svg_img header_svg" alt="edit" /></label>
                                                </div>
                                                <div class="avatar-preview ec-preview">
                                                    <div class="imagePreview ec-div-preview">
                                                        @if ($item->product_image_1 == null)
                                                            <img class="ec-image-preview"
                                                            src="{{ URL::asset('assets/img/products/vender-upload-preview.jpg') }}"
                                                            alt="edit" />
                                                        @else
                                                            <img class="ec-image-preview"
                                                            src="{{ URL::asset('storage/images/product/'.$item->product_image_1) }}"
                                                            alt="edit" />
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="thumb-upload-set colo-md-12">
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' name="product_image_2" id="thumbUpload01"
                                                            class="ec-image-upload"
                                                            
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="{{ URL::asset('assets/img/icons/edit.svg') }}"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            @if ($item->product_image_2 == null)
                                                                <img class="ec-image-preview"
                                                                src="{{ URL::asset('assets/img/products/vender-upload-preview.jpg') }}"
                                                                alt="edit" />
                                                            @else
                                                                <img class="ec-image-preview"
                                                                src="{{ URL::asset('storage/images/product/'.$item->product_image_2) }}"
                                                                alt="edit" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload02"
                                                            class="ec-image-upload"
                                                            name="product_image_3"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="{{ URL::asset('assets/img/icons/edit.svg') }}"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            @if ($item->product_image_3 == null)
                                                                <img class="ec-image-preview"
                                                                src="{{ URL::asset('assets/img/products/vender-upload-preview.jpg') }}"
                                                                alt="edit" />
                                                            @else
                                                                <img class="ec-image-preview"
                                                                src="{{ URL::asset('storage/images/product/'.$item->product_image_3) }}"
                                                                alt="edit" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload">
                                                    <div class="thumb-edit">
                                                        <input type='file' id="thumbUpload03"
                                                            class="ec-image-upload"
                                                            name="product_image_4"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="{{ URL::asset('assets/img/icons/edit.svg') }}"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="thumb-preview ec-preview">
                                                        <div class="image-thumb-preview">
                                                            @if ($item->product_image_4 == null)
                                                                <img class="ec-image-preview"
                                                                src="{{ URL::asset('assets/img/products/vender-upload-preview.jpg') }}"
                                                                alt="edit" />
                                                            @else
                                                                <img class="ec-image-preview"
                                                                src="{{ URL::asset('storage/images/product/'.$item->product_image_4) }}"
                                                                alt="edit" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="ec-vendor-upload-detail">
                                        <div class="row g-3" method="POST" action="{{ url($crud->url.'/create') }}" enctype="multipart/form-data">
                                            <div class="row g-3">
                                                {!! csrf_field() !!}
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Vendor *</label>
                                                    <select class="form-control" id="select2-vendor" name="vendor_id">
                                                        <option value=""></option>
                                                        @foreach ($option_vendor as $vendor)
                                                            @if ($vendor_value == $vendor->id)
                                                            <option selected value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                            @else
                                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option> 
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @error('kategori_id')
                                                        <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="name" class="form-label">Nama Produk *</label>
                                                    <input type="text" class="form-control slug-title" name="name" value="{{ old('name', $item->name) }}" id="name">
                                                    @error('name')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="">Kategori Produk *</label>
                                                    <select class="form-control" id="select2-kategori" name="kategori_id">
                                                        <option value=""></option>
                                                        @foreach ($option_categories as $categorie)
                                                            @if ($kategori_value == $categorie->id)
                                                            <option selected value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                                            @else
                                                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    @error('kategori_id')
                                                        <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Deskripsi Detai Produk</label>
                                                    <textarea name="detail" class="form-control" rows="4">{{ old('detail', $item->detail) }}</textarea>
                                                    @error('detail')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                

                                                <div class="col-md-12 mb-3">
                                                    <label for="">Bintang *</label>
                                                    <select name="rate" id="rate" class="form-control">
                                                        @foreach ($option_rate as $rate)
                                                        @if ($rate == $rate_value)
                                                        <option selected value="{{ $rate }}">{{ $rate }}</option>
                                                        @else
                                                        <option value="{{ $rate }}">{{ $rate }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    @error('rate')
                                                        <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label>Harga Sebelumnya (Rp)</label>
                                                    <input type="text" class="form-control" id="input-discounted-price" value="{{ old('discounted_price', intval($item->discounted_price)) }}" placeholder="Enter price"/>
                                                    <input type="hidden" name="discounted_price" value="{{ old('discounted_price', intval($item->discounted_price)) }}" id="input-discounted-price-hidden" />
                                                    @error('discounted_price')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label>Harga Sekarang (Rp) *</label>
                                                    <input type="text" class="form-control" id="input-price" value="{{ old('price', intval($item->price)) }}" placeholder="Enter price"/>
                                                    <input type="hidden" name="price" value="{{ old('price', intval($item->price)) }}" id="input-price-hidden" />
                                                    @error('price')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Syarat & Ketentuan</label>
                                                    <textarea name="terms_and_condition" class="form-control" rows="4">{{ old('terms_and_condition', $item->terms_and_condition) }}</textarea>
                                                    @error('terms_and_condition')
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
        .select2-selection {
            background-color: #fdfdfd !important;
        }
    </style>
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/select2-bootstrap-5-theme.min.css') }}">

@endpush

@push('scripts')
	<!-- Option Switcher -->
	<script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script>

	<!-- Option Switcher -->
	{{-- <script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script> --}}

	<!-- Ekka Custom -->
	<script src="{{ URL::asset('assets/js/ekka.js') }}"></script> 
    <script src="{{ URL::asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/cleave/cleave.min.js') }}"></script>
	<script>
		$(function(){
            // $('#select2-kategori').select2({
            //     theme: 'bootstrap-5',
            // });
            $('#select2-vendor').select2({
                theme: 'bootstrap-5',
            });

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

            new Cleave('#input-discounted-price', {
                numeral: true,
                numeralDecimalMark: ',',
                delimiter: '.',
                numeralPositiveOnly: true,
                onValueChanged: function (e) {
                    // e.target = { value: '5100-1234', rawValue: '51001234' }
                    $('#input-discounted-price-hidden').val(e.target.rawValue).trigger('change');
                }
            });



        });
	</script>
@endpush
