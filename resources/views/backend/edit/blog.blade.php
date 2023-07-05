@extends('backend.inc.blank')
@section('content')
@php
    $title = (old('title') != null) ? old('title') : $item->title;
    $slug = (old('slug') != null) ? old('slug') : $item->slug;
    $content = (old('content') != null) ? old('content') : $item->content;
    $tags_value = new \App\Models\BlogTag;
    $tags_value = $tags_value->where('blog_id', $id)->get()->pluck('tag_id')->toArray();

    $tags = new \App\Models\Tag;
    $tags = $tags->get();

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
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Insert Image</h2>
                        </div>
                        <div class="card-body">
                            <div class="row ec-vendor-uploads">
                                <div class="ec-vendor-img-upload">
                                    <div class="ec-vendor-main-img">
                                        <div class="avatar-upload" style="max-width: 100%;
                                        /* height: 400px; */
                                        margin: 0 auto 15px auto;">
                                            <div class="avatar-edit">
                                                <input type='file' name="image" id="imageUpload" class="ec-image-upload"
                                                    accept=".png, .jpg, .jpeg" />
                                                <label for="imageUpload"><img
                                                        src="{{ URL::asset('assets/img/icons/edit.svg') }}"
                                                        class="svg_img header_svg" alt="edit" /></label>
                                            </div>
                                            <div class="avatar-preview ec-preview">
                                                <div class="imagePreview ec-div-preview">
                                                    @if ($item->image)
                                                    <img class="ec-image-preview"
                                                        style="max-height: 100%; width: 100%;"
                                                        src="{{ URL::asset('storage/images/permalink/'.$item->image) }}"
                                                        alt="edit" />
                                                    @else
                                                    <img class="ec-image-preview"
                                                        style="max-height: 100%; width: 100%;"
                                                        src="{{ URL::asset('storage/images/permalink/default-banner.jpg') }}"
                                                        alt="edit" />
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @error('image')
                                        <p class="msg-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Edit {{ $crud->title }}</h2>
                        </div>
    
                        <div class="card-body">
                            <div>
                                <div class="row ec-vendor-uploads">
                                    <div class="col">
                                        <div class="ec-vendor-upload-detail">
                                            <div class="row g-3" method="POST" action="{{ url($crud->url.'/create') }}" enctype="multipart/form-data">
                                                <div class="row g-3">
                                                    {!! csrf_field() !!}
                                                    <div class="col-md-12 mb-3">
                                                        <label for="name" class="form-label">Judul Artikel*</label>
                                                        <input type="text" name="title" value="{{ $title }}" class="form-control slug-title" id="inputEmail4">
                                                        @error('title')
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
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">Content*</label>
                                                        {{-- <div id="editor"></div> --}}
                                                        <textarea name="content" id="editor">{{ $content }}</textarea>
                                                        @error('content')
                                                             <p class="msg-error">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label class="form-label">Tags</label>
                                                        <select class="form-control" id="tags" name="tag_id[]" multiple="multiple">
                                                            {{--  <option value="">All</option>  --}}
                                                            @foreach ($tags as $tag)
                                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('tag_id')
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
                            </div>
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

        $('#tags').select2({
            theme: 'bootstrap-5',
        });
        var d = <?php echo json_encode($tags_value); ?>;

        $('#tags').val(d).change();

	</script>
@endpush
