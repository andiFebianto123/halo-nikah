@extends('backend.inc.blank')
@section('content')
@php
    
    $permanen_value = (old('is_permanently') != null) ? old('is_permanently') : $item->is_permanently;
    $option_permanen = [
        ['text' => 'Ya', 'value' => 1],
        ['text' => 'Tidak', 'value' => 0],
    ];

    $special_value = (old('type') != null) ? old('type') : $item->type;
    $option_special = [
        ['text' => 'Platinum', 'value' => 'Platinum'],
        ['text' => 'Gold', 'value' => 'Gold'],
        ['text' => 'Premium', 'value' => 'Premium'],
    ];

    $product_value = (old('product_id') != null)  ? old('product_id') : $item->product_id;
    $product_text = '';
    if($product_value){
        $product = \App\Models\Product::where('id', $product_value)->first();
        $product_text = $product->name . ' ' . '('.$product->vendor->name.')';
    }
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
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit {{ $crud->title }}</h2>
                    </div>

                    <div class="card-body">
                        <form action="{{ url($crud->url.'/'.$id) }}" method="POST" enctype="multipart/form-data">
                            <div class="row ec-vendor-uploads">
                                
                                <div class="col-md-12">
                                    <div class="ec-vendor-upload-detail">
                                        <div class="row g-3" method="POST" action="{{ url($crud->url.'/create') }}" enctype="multipart/form-data">
                                            <div class="row g-3">
                                                {!! csrf_field() !!}
                                                <div class="col-md-12 mb-3">
                                                    <label>Pilih Produk *</label>
                                                    <select class="form-control" id="select2-product" name="product_id">
                                                        @if ($product_value)
                                                            <option value="{{ $product_value }}" selected>{{ $product_text }}</option>
                                                        @endif
                                                    </select>
                                                    @error('product_id')
                                                        <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Spesial Tipe *</label>
                                                    <select class="form-select" name="type">
                                                        <option></option>
                                                        @foreach ($option_special as $option)
                                                          @if ($special_value == $option['value'])
                                                          <option value="{{ $option['value'] }}" selected>{{ $option['text'] }}</option>  
                                                          @else
                                                          <option value="{{ $option['value'] }}" >{{ $option['text'] }}</option>  
                                                          @endif
                                                        @endforeach
                                                    </select>
                                                    @error('type')
                                                        <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Berlaku Permanen</label>
                                                    <select class="form-select" name="is_permanently">
                                                        <option></option>
                                                        @foreach ($option_permanen as $option)
                                                          @if ($permanen_value == $option['value'])
                                                          <option value="{{ $option['value'] }}" selected>{{ $option['text'] }}</option>  
                                                          @else
                                                          <option value="{{ $option['value'] }}" >{{ $option['text'] }}</option>  
                                                          @endif
                                                        @endforeach
                                                    </select>
                                                    @error('is_permanently')
                                                        <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                        <label class="col-sm-1 form-label">Tanggal Mulai</label>
                                                        <input type="text" autocomplete="off" name="date_start" class="form-control" value="{{ old('date_start', $item->date_start) }}" id="datepicker1"  />
                                                        @error('date_start')
                                                        <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="col-sm-1 form-label">Tanggal Berakhir</label>
                                                    <input type="text" autocomplete="off" name="date_end" class="form-control" value="{{ old('date_end', $item->date_end) }}" id="datepicker2"  />
                                                    @error('date_end')
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
    
    .select2-selection {
        background-color: #fdfdfd !important;
    }
</style>
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/select2-bootstrap-5-theme.min.css') }}">
{{-- <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"> --}}
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<!-- Option Switcher -->
	<script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script>

	<!-- Option Switcher -->
	{{-- <script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script> --}}

	<!-- Ekka Custom -->
	<script src="{{ URL::asset('assets/js/ekka.js') }}"></script> 
    <script src="{{ URL::asset('assets/plugins/select2/select2.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script> --}}
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
	<script>
		$(function(){
            $('#select2-product').select2({
                theme: 'bootstrap-5',
                ajax: {
                    url: "{{ url('admin/api-get-product') }}",
                    method:'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: function (params) {
                        var query = {
                            q: params.term,
                        }
                        return query;
                    },
                    processResults: function (data) {
                        return {
                            results: data.result
                        };
                    }
                }
            });
            $('#datepicker1').datepicker({
                uiLibrary: 'bootstrap5',
                'format': 'yyyy-mm-dd'
            });

            $('#datepicker2').datepicker({
                uiLibrary: 'bootstrap5',
                'format': 'yyyy-mm-dd'
            });
        });
	</script>
@endpush
