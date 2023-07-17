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
    $province = (old('province') != null) ? old('province') : $item->province;
    $city = (old('city') != null) ? old('city') : $item->city;
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
        <form action="{{ url($crud->url.'/'.$id) }}" method="POST" enctype="multipart/form-data">
            <div class="row">

                <div class="col-12 mb-3">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Upload Banner (Opsional)</h2>
                        </div>
                        <div class="card-body">
                            <div class="row ec-vendor-uploads">
                                <div class="ec-vendor-img-upload">
                                    <div class="ec-vendor-main-img">
                                        <div class="avatar-upload" style="max-width: 100%;
                                        /* height: 400px; */
                                        margin: 0 auto 15px auto;">
                                            <div class="avatar-edit">
                                                <input type='file' name="image_banner" id="imageUpload" class="ec-image-upload"
                                                    accept=".png, .jpg, .jpeg" />
                                                <label for="imageUpload"><img
                                                        src="{{ URL::asset('assets/img/icons/edit.svg') }}"
                                                        class="svg_img header_svg" alt="edit" /></label>
                                            </div>
                                            <div class="avatar-preview ec-preview">
                                                <div class="imagePreview ec-div-preview">
                                                    <img class="ec-image-preview"
                                                        style="max-height: 100%; width: 100%;"
                                                        src="{{ URL::asset('storage/images/permalink/'.$item->image_banner) }}"
                                                        alt="edit" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('image_banner')
                                        <p class="msg-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Edit {{ $crud->title }}</h2>
                        </div>

                        <div class="card-body">
                            {{-- <form action="{{ url($crud->url.'/create') }}" method="POST" enctype="multipart/form-data"> --}}
                                <div class="row ec-vendor-uploads">
                                    <div class="col-lg-4">
                                        <div class="ec-vendor-img-upload">
                                            <div class="ec-vendor-main-img">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' name="image_profile" id="imageUpload" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="{{ URL::asset('assets/img/icons/edit.svg') }}"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="avatar-preview ec-preview">
                                                        <div class="imagePreview ec-div-preview">
                                                            <img class="ec-image-preview"
                                                                src="{{ URL::asset('storage/images/permalink/'.$item->image_profile) }}"
                                                                alt="edit" />
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('image_profile')
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
                                                        <label for="name" class="form-label">Nama Vendor *</label>
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
                                                        <label class="form-label">Deskripsi Vendor</label>
                                                        <textarea name="description" class="form-control" rows="6">{{ old('description', $item->description) }}</textarea>
                                                        @error('description')
                                                            <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control slug-title" name="email" value="{{ old('email', $item->email) }}" id="email">
                                                        @error('email')
                                                            <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="phone" class="form-label">Kontak / No.HP</label>
                                                        <input type="text" class="form-control slug-title" name="phone" value="{{ old('phone', $item->phone) }}" id="phone">
                                                        @error('phone')
                                                            <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Provinsi *</label>
                                                        <select class="form-control" id="select2-province" name="province">
            
                                                        </select>
                                                        @error('province')
                                                            <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Kota *</label>
                                                        <select class="form-control" id="select2-city" name="city">
                                                        </select>
                                                        @error('city')
                                                            <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">Alamat *</label>
                                                        <textarea name="address" class="form-control" rows="2">{{ old('address', $item->address) }}</textarea>
                                                        @error('address')
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
                                                        <label for="name" class="form-label">Link Instagram</label>
                                                        <input type="text" class="form-control slug-title" name="sm_instagram" value="{{ old('sm_instagram', $item->sm_instagram) }}" id="sm_instagram">
                                                        @error('sm_instagram')
                                                            <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="name" class="form-label">Link Whatsapp</label>
                                                        <input type="text" class="form-control slug-title" name="sm_whatsapp" value="{{ old('sm_whatsapp', $item->sm_whatsapp) }}" id="sm_whatsapp">
                                                        @error('sm_whatsapp')
                                                            <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="name" class="form-label">Link Facebook</label>
                                                        <input type="text" class="form-control slug-title" name="sm_facebook" value="{{ old('sm_facebook', $item->sm_facebook) }}" id="sm_facebook">
                                                        @error('sm_facebook')
                                                            <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="name" class="form-label">Link Twitter</label>
                                                        <input type="text" class="form-control slug-title" name="sm_twitter" value="{{ old('sm_twitter', $item->sm_twitter) }}" id="sm_twitter">
                                                        @error('sm_twitter')
                                                            <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="name" class="form-label">URL Youtube 1</label>
                                                        <input type="text" class="form-control slug-title" name="youtube_url_1" value="{{ old('youtube_url_1', $item->youtube_url_1) }}" id="youtube_url_1">
                                                        @error('youtube_url_1')
                                                            <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="name" class="form-label">URL Youtube 2</label>
                                                        <input type="text" class="form-control slug-title" name="youtube_url_2" value="{{ old('youtube_url_2', $item->youtube_url_2) }}" id="youtube_url_2">
                                                        @error('youtube_url_2')
                                                            <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="name" class="form-label">URL Youtube 3</label>
                                                        <input type="text" class="form-control slug-title" name="youtube_url_3" value="{{ old('youtube_url_3', $item->youtube_url_3) }}" id="youtube_url_3">
                                                        @error('youtube_url_3')
                                                            <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="name" class="form-label">URL Youtube 4</label>
                                                        <input type="text" class="form-control slug-title" name="youtube_url_4" value="{{ old('youtube_url_4', $item->youtube_url_4) }}" id="youtube_url_4">
                                                        @error('youtube_url_4')
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
        
        .select2-selection {
            background-color: #fdfdfd !important;
        }
    </style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush


@push('scripts')
	<!-- Option Switcher -->
	<script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script>

	<!-- Option Switcher -->
	{{-- <script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script> --}}

	<!-- Ekka Custom -->
	<script src="{{ URL::asset('assets/js/ekka.js') }}"></script> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>

        var id_province = "{{ $province }}";
        var id_city = "{{ $city }}";

        // console.log(id_province, id_city);

        // PROVINCE
        if(id_province.length > 0){
            $.ajax({
                url: "{{ url('admin/api-get-province') }}",
                method:'post',
                headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data:{
                    id: id_province,
                }
            }).done(function(res){
                // $('#select2-province').append(`<option></option>`);
                for(var i = 0; i<res.result.length; i++){
                    if(res.result[i].id == id_province){
                        $('#select2-province').append(`<option selected value="${res.result[i].id}">${res.result[i].text}</option>`);
                    }else{
                        $('#select2-province').append(`<option value="${res.result[i].id}">${res.result[i].text}</option>`);
                    }
                }
            });
        }

		$('#select2-province').select2({
            theme: 'bootstrap-5',
            ajax: {
                url: "{{ url('admin/api-get-province') }}",
                method:'POST',
                headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: function (params) {
                    var query = {
                        name: params.term,
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

        // CITY
        if(id_province.length > 0){
            $.ajax({
                url: "{{ url('admin/api-get-city') }}",
                method:'post',
                headers: {
					'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data:{
                    province_id: id_province,
                }
            }).done(function(res){
                $('#select2-city').append(`<option></option>`);
                for(var i = 0; i<res.result.length; i++){
                    if(res.result[i].id == id_city){
                        $('#select2-city').append(`<option selected value="${res.result[i].id}">${res.result[i].text}</option>`);
                    }else{
                        $('#select2-city').append(`<option value="${res.result[i].id}">${res.result[i].text}</option>`);
                    }
                }
            });
        }

        $('#select2-province').change(function(){
            if($(this).val() != ''){
                $('#select2-city').html(``);
                $('#select2-city').val('');
                let province_id = $(this).val();
                $.ajax({
                    url: "{{ url('admin/api-get-city') }}",
                    method:'post',
                    headers: {
					    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data:{
                        province_id: province_id,
                    }
                }).done(function(res){
                    $('#select2-city').append(`<option></option>`);
                    for(var i = 0; i<res.result.length; i++){
                        $('#select2-city').append(`<option value="${res.result[i].id}">${res.result[i].text}</option>`);
                    }
                });
            }
        });


	</script>
@endpush
