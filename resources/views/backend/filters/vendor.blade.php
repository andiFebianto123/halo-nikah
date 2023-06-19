@php
    // $request = request();

    // $kategori_id = ($request->kategori_id != null) ? $request->kategori_id : null;
    $model_query_kategori = \App\Models\Kategorie::where('status', 1)->get();
@endphp
<div class="mt-2 mb-3 row">
    <div class="col-lg-4 col-md-8 col-sm-12">
        <div class="ec-cat-list card card-default">
            <div class="card-body">
                <div class="ec-cat-form">
                    <h4>Filter</h4>

                    <form id="form-filter" class="row">
                        <div class="form-group">
                            <label for="text" class="col-form-label">Kategori</label> 
                            <div class="">
                                <select class="form-control" id="kategori_id" name="kategori_id">
                                    <option value="">All</option> 
                                    @foreach ($model_query_kategori as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" id="submit" class="btn btn-sm btn-warning"><i class="mdi mdi-magnify"></i> Search </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    
</div>
@push('scripts')
<script src="{{ URL::asset('assets/js/URI.js') }}"></script>
<script>
    $(function(){
        $('#form-filter #submit').click(function(e){
            e.preventDefault();
            var url = URI(window.crud.table.ajax.url());
            var kategori = $('#form-filter #kategori_id').val();
            if(kategori.length > 0){
                url.removeSearch('kategori_id');
                url.addSearch({ kategori_id:kategori });
            }else{
                url.removeSearch('kategori_id');
            }
            window.crud.table.ajax.url(url).load();
        })
    });
</script>
@endpush