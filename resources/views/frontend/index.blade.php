@extends("layouts.frontend.master")
@section("content")
@if (count($promotions) > 0)
<div class="nk-block nk-block-lg">
    <div class="card card-bordered card-preview">
        <div class="card-inner">
            <div class="example-carousel">
                <div id="carouselExConInd" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExConInd" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselExConInd" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselExConInd" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @php($is_first = true)
                        @foreach ($promotions as $promotion)
                        @if ($is_first)
                        <div class="carousel-item active">
                            <img src="{{ $promotion->image }}" class="d-block w-100" style="height:400px!important;" alt="carousel">
                        </div>
                        @php($is_first = false)
                        @else
                        <div class="carousel-item">
                            <img src="{{ $promotion->image }}" class="d-block w-100" style="height:400px!important;" alt="carousel">
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExConInd" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExConInd" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div><!-- .card-preview -->
</div>
@endif

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Items</h3>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <li>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-right">
                                    <em class="icon ni ni-search"></em>
                                </div>
                                <input type="text" class="form-control" id="search" placeholder="Quick search">
                            </div>
                        </li>
                        <li>
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown">Category</a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        @foreach ($categories as $category)
                                        <li><a href="{{ route('frontend.index') }}?category_id={{ $category->id }}"><span>{{ $category->name  }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="row g-gs">
        @foreach ($products as $product)
        <div class="col-xxl-3 col-lg-4 col-sm-6">
            <div class="card card-bordered product-card">
                <div class="product-thumb">
                    <a href="{{ route('frontend.details', ['product' => $product]) }}">
                        <img class="card-img-top" src="{{ $product->image }}" alt="" style="height:300px!important;">
                    </a>
                    <ul class="product-badges">
                        {{-- <li><span class="badge bg-success">New</span></li> --}}
                    </ul>
                </div>
                <div class="card-inner text-center">
                    <ul class="product-tags">
                        <li><a href="#">{{ $product->category->name }}</a></li>
                    </ul>
                    <h5 class="product-title"><a href="{{ route('frontend.details', ['product' => $product]) }}">{{ $product->name }}</a></h5>
                    <div class="product-price text-primary h5"> {{ $product->price_formatted }}</div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>

@endsection

@push('script')
    <script>
        $('#search').on('keypress', function(){
            if (event.key === "Enter") {
                window.location.href = "{{ route('frontend.index') }}?search=" + $(this).val();
            }
        });
    </script>

@endpush