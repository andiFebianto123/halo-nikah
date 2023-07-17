@extends('backend.inc.blank')
@section('content')
@php
    // dd($item);
    $status_value = (old('status') != null) ? old('status') : '';
    $option_status = [
        ['text' => 'Active', 'value' => 1], 
        ['text' => 'Inactive', 'value' => 0]
    ];
    $rate_value = (old('rate') != null) ? old('rate') : '';
    $option_rate = [
        1, 2, 3, 4, 5
    ];

    $vendor_value = (old('vendor_id') != null) ? old('vendor_id') : '';
    $kategori_value = (old('kategori_id') != null) ? old('kategori_id') : '';
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
                                                    <input type='file' name="product_image_1" id="imageUpload" class="ec-image-upload"
                                                        accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload"><img
                                                            src="{{ URL::asset('assets/img/icons/edit.svg') }}"
                                                            class="svg_img header_svg" alt="edit" /></label>
                                                </div>
                                                <div class="avatar-preview ec-preview">
                                                    <div class="imagePreview ec-div-preview">
                                                        <img class="ec-image-preview"
                                                            src="{{ URL::asset('assets/images/product-image/88_1.jpg') }}"
                                                            alt="edit" />
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
                                                            <img class="image-thumb-preview ec-image-preview"
                                                                src="{{ URL::asset('assets/images/product-image/88_1.jpg') }}"
                                                                alt="edit" />
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
                                                            <img class="image-thumb-preview ec-image-preview"
                                                                src="{{ URL::asset('assets/images/product-image/88_1.jpg') }}"
                                                                alt="edit" />
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
                                                            <img class="image-thumb-preview ec-image-preview"
                                                                src="{{ URL::asset('assets/images/product-image/88_1.jpg') }}"
                                                                alt="edit" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('product_image_1')
                                                <p class="msg-error">{{ $message }}</p>
                                            @enderror
                                            @error('product_image_2')
                                                <p class="msg-error">{{ $message }}</p>
                                            @enderror
                                            @error('product_image_3')
                                                <p class="msg-error">{{ $message }}</p>
                                            @enderror
                                            @error('product_image_4')
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
                                                    <input type="text" class="form-control slug-title" name="name" value="{{ old('name') }}" id="name">
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
                                                    <label class="form-label">Deskripsi Detail Produk</label>
                                                    {{-- <div id="editor"></div> --}}
                                                    <textarea name="detail" id="editor">{{ old('detail') }}</textarea>
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
                                                    <input type="text" class="form-control" id="input-discounted-price" value="{{ old('discounted_price') }}" placeholder="Enter price"/>
                                                    <input type="hidden" name="discounted_price" value="{{ old('discounted_price') }}" id="input-discounted-price-hidden" />
                                                    @error('discounted_price')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label>Harga Sekarang (Rp) *</label>
                                                    <input type="text" class="form-control" id="input-price" value="{{ old('price') }}" placeholder="Enter price"/>
                                                    <input type="hidden" name="price" value="{{ old('price') }}" id="input-price-hidden" />
                                                    @error('price')
                                                         <p class="msg-error">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Syarat & Ketentuan</label>
                                                    <textarea name="terms_and_condition" class="form-control" rows="4">{{ old('terms_and_condition') }}</textarea>
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
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/plugins/ckeditor/sample/css/sample.css') }}"> --}}


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
    <script src="{{ URL::asset('assets/plugins/ckeditor/build/ckeditor.js') }}"></script>

    <script>
        class MyUploadAdapter {
            constructor( loader ) {
                // The file loader instance to use during the upload.
                this.loader = loader;
            }

            // Starts the upload process.
            upload() {
                return this.loader.file
                    .then( file => new Promise( ( resolve, reject ) => {
                        this._initRequest();
                        this._initListeners( resolve, reject, file );
                        this._sendRequest( file );
                    } ) );
            }

            // Aborts the upload process.
            abort() {
                if ( this.xhr ) {
                    this.xhr.abort();
                }
            }

            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();

                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                xhr.open( 'POST', "{{ url('admin/api-upload-image') }}", true );
                xhr.responseType = 'json';
            }

            // Initializes XMLHttpRequest listeners.
            _initListeners( resolve, reject, file ) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                xhr.addEventListener( 'abort', () => reject() );
                xhr.addEventListener( 'load', () => {
                    const response = xhr.response;

                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if ( !response || response.error ) {
                        return reject( response && response.error ? response.error.message : genericErrorText );
                    }

                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    resolve( {
                        default: response.url
                    } );
                } );

                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if ( xhr.upload ) {
                    xhr.upload.addEventListener( 'progress', evt => {
                        if ( evt.lengthComputable ) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    } );
                }
            }

            // Prepares the data and sends the request.
            _sendRequest( file ) {
                // Prepare the form data.
                const data = new FormData();

                data.append( 'upload', file );

                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.
                this.xhr.setRequestHeader('x-csrf-token', "{{ csrf_token() }}");       

                // Send the request.
                this.xhr.send( data );

            }
        }

        function MyCustomUploadAdapterPlugin( editor ) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                // Configure the URL to the upload script in your back-end here!
                return new MyUploadAdapter( loader );
            };
        }
    </script>
	<script>
       ClassicEditor.create( document.querySelector( '#editor' ), {
            licenseKey: '',	
            extraPlugins: [ MyCustomUploadAdapterPlugin ],
            removePlugins:[
                'Markdown', 'Base64UploadAdapter'
            ]				
        })
        .then( editor => {
            window.editor = editor;
        })
        .catch( error => {
            console.error( 'Oops, something went wrong!' );
            console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
            console.warn( 'Build id: 50w64f7tpz5p-bxebq7z8j5tl' );
            console.error( error );
		});

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
