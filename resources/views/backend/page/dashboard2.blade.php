@extends('backend.inc.blank')
@section('content')
<div class="content">
    <div class="p-5 mb-4 bg-white rounded-3">
        <div class="container-fluid py-5">
          <h1 class="display-5 mb-3 fw-bold">Selamat Datang</h1>
          <p class="col-md-8 fs-4 mb-2">
            Ini merupakan halaman admin untuk mengelola data - data produk halo nikah, mohon digunakan dengan benar ya terimakasih.
          </p>
          {{-- <button class="btn btn-primary btn-lg" type="button">Example button</button> --}}
        </div>
      </div>
</div>

@endsection

@push('scripts')
	<!-- Chart -->
	<script src="{{ URL::asset('assets/plugins/charts/Chart.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/chart.js') }}"></script>

	<!-- Google map chart -->
	<script src="{{ URL::asset('assets/plugins/charts/google-map-loader.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/charts/google-map.js') }}"></script>

	<!-- Date Range Picker -->
	<script src="{{ URL::asset('assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ URL::asset('assets/js/date-range.js') }}"></script>

	<!-- Option Switcher -->
	<script src="{{ URL::asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script>

	<!-- Ekka Custom -->
	<script src="{{ URL::asset('assets/js/ekka.js') }}"></script>
@endpush