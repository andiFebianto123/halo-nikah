@extends('backend.inc.blank')
@section('content')
@php
    // dd($item);
    $min = (old('min') != null) ? old('min') : $item->min;
    $max = (old('max') != null) ? old('max') : $item->max;
    $ket = (old('ket') != null) ? old('ket') : $item->ket;
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
                <p class="breadcrumbs"><span><a href="{{ url('admin') }}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>{{ $crud->title }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit {{ $crud->title }}</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ url($crud->url.'/'.$id) }}" method="POST" enctype="multipart/form-data">
                            <div class="row ec-vendor-uploads">
                                <div class="col-12">
                                    <div class="ec-vendor-upload-detail">
                                        <div class="row g-3" method="POST" action="{{ url($crud->url.'/create') }}" enctype="multipart/form-data">
                                            <div class="row g-3">
                                                {!! csrf_field() !!}
                                                <div class="col-md-12 mb-3">
                                                    <label>Harga Minimal (Rp) *</label>
                                                    <input type="text" class="form-control" id="min_price" value="{{ $min }}" placeholder="Enter price"/>
                                                    <input type="hidden" name="min" value="{{ $min }}" id="min" />
                                                    @error('min')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>Harga Maksimal (Rp) *</label>
                                                    <input type="text" class="form-control" id="max_price" value="{{ $max }}" placeholder="Enter price"/>
                                                    <input type="hidden" name="max" value="{{ $max }}" id="max" />
                                                    @error('max')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Keterangan</label>
                                                    <textarea name="ket" class="form-control" rows="5">{{ $ket }}</textarea>
                                                    @error('ket')
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
    <script src="{{ URL::asset('assets/plugins/cleave/cleave.min.js') }}"></script>
	<script>
        new Cleave('#min_price', {
            numeral: true,
            numeralDecimalMark: ',',
            delimiter: '.',
            numeralPositiveOnly: true,
            onValueChanged: function (e) {
                // e.target = { value: '5100-1234', rawValue: '51001234' }
                $('#min').val(e.target.rawValue).trigger('change');
            }
        });

        new Cleave('#max_price', {
            numeral: true,
            numeralDecimalMark: ',',
            delimiter: '.',
            numeralPositiveOnly: true,
            onValueChanged: function (e) {
                // e.target = { value: '5100-1234', rawValue: '51001234' }
                $('#max').val(e.target.rawValue).trigger('change');
            }
        });
	</script>
@endpush
