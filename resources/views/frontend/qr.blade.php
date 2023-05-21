@extends("layouts.frontend.master")
@section("content")
@include('backend.includes.alerts')
<div class="card card-bordered card-preview w-25 mx-auto">
    <div class="card-header">
        <h5 class="text-center card-title">Scan to show the receipt</h5>
    </div>
    <div class="card-inner">
        <div class="row">
            <div class="col-12">
                <div id="qrcode"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script src="{{ asset('frontend/qrcode.js') }}"></script>
    <script type="text/javascript">
        new QRCode(document.getElementById("qrcode"), "{{ route('frontend.vorder', $id) }}");
    </script>
@endpush
