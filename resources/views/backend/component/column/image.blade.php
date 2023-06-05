@php
    $image = $value; 
@endphp
@if ($image != null)
<img class="tbl-thumb" src="{{ url('storage/images/permalink/'.$image) }}" width="20" height="40" alt="Product Image">
@else
<img class="tbl-thumb" src="{{ url('storage/images/permalink/default-vendor.jpg') }}" width="20" height="40" alt="Product Image">
@endif
