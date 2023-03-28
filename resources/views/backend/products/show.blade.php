@extends("layouts.backend.master")
@section("content")
<div class="nk-block nk-block-lg">
    {{-- BREADCRUMB --}}
    <x-breadcrumb :items="[
        array('name' => 'MAIN', 'url' => 'javascript:void(0);'),
        array('name' => 'Products', 'url' => route('products.index')),
        array('name' => 'View', 'url' => route('products.create')),
    ]"/>
    

    {{-- TITLE --}}
    <x-datatable-head title="View Product" />

    {{-- ALERTS --}}
    @include('backend.includes.alerts')

    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="row pb-5">
                <div class="col-lg-6">
                    <div class="product-gallery me-xl-1 me-xxl-5">
                        <div class="product-gallery-preview">
                            <div class="product-gallery-preview-item active" id="product-gallery-preview-item-1">
                                <img src="{{  $product->image }}" alt="Product Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-info mt-5 me-xxl-5">
                        <h4 class="product-price text-primary">{{ $product->price_formatted }} </h4>
                        <h2 class="product-title">{{ $product->name }}</h2>
                        <div class="product-excrept text-soft">
                            @if ($product->description)
                                <p class="lead">{{ $product->description }}</p>
                            @else
                                <p class="lead">No Description</p>
                            @endif
                           
                        </div>
                        <div class="product-meta">
                            <ul class="d-flex g-3 gx-5">
                                <li>
                                    <div class="fs-14px text-muted">Category</div>
                                    <div class="fs-16px fw-bold text-secondary">{{ $product->category->name }}</div>
                                </li>
                                <li>
                                    <div class="fs-14px text-muted">Active</div>
                                    <div class="fs-16px fw-bold text-secondary">{{ $product->is_active ? 'YES' : 'NO' }}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection