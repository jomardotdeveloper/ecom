@extends("layouts.frontend.master")
@section("content")
<div class="card card-bordered card-preview">
    <div class="card-inner">
        <div class="row pb-5">
            <div class="col-lg-6">
                <div class="product-gallery me-xl-1 me-xxl-5">
                    <div class="product-gallery-preview">
                        <div class="product-gallery-preview-item active" id="product-gallery-preview-item-1">
                            <img src="{{  $announcement->image }}" alt="Product Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-info mt-5 me-xxl-5">
                    <h2 class="product-title">{{ $announcement->title }}</h2>
                    <div class="product-excrept text-soft">
                        {!! $announcement->description  !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
