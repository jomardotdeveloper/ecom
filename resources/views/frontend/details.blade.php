@extends("layouts.frontend.master")
@section("content")
<div class="card card-bordered card-preview">
    <div class="card-inner">
        @include('backend.includes.alerts')
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
                            <li>
                                <div class="fs-14px text-muted">Available Stocks</div>
                                <div class="fs-16px fw-bold text-secondary">{{ $product->stocks_total}}</div>
                            </li>
                        </ul>
                    </div>
                    <div class="product-meta">
                        <ul class="d-flex flex-wrap ailgn-center g-2 pt-1">
                            <li class="w-140px">
                                <div class="form-control-wrap number-spinner-wrap">
                                    <button class="btn btn-icon btn-outline-light number-spinner-btn number-minus" onclick="minus()" data-number="minus"><em class="icon ni ni-minus"></em></button>
                                    <input type="number" class="form-control number-spinner" value="0" max="{{ $product->stocks_total }}" min="1">
                                    <button class="btn btn-icon btn-outline-light number-spinner-btn number-plus" onclick="add()" data-number="plus"><em class="icon ni ni-plus"></em></button>
                                </div>
                            </li>
                            <li>
                                @auth
                                    
                                <form action="{{ route('carts.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" required>
                                    <input type="hidden" name="quantity" id="quantity" value="0" required>
                                    <button class="btn btn-primary" type="submit">Add to Cart</button>
                                </form>
                                
                                @endauth
                                @guest
                                    
                                <a href="{{ route('login') }}" id="buyNow" class="btn btn-primary">Add to cart</a>
                                @endguest
                            </li>
                            <li>
                                <a href="{{ route('frontend.checkout') }}" id="buyNow" class="btn btn-primary">Buy Now</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        var currentVal = 0;
        
        function add() {
            currentVal++;
            $('#quantity').val(currentVal);
            console.log( $('#quantity').val());
            console.log(currentVal);
            updateCheckoutUrl();
        }

        function minus() {
            if(currentVal > 1) {
                currentVal--;
                $('#quantity').val(currentVal);
            }
            
            console.log( $('#quantity').val());
            console.log(currentVal);
            updateCheckoutUrl();
        }

        function updateCheckoutUrl() {
            $('#quantity').val(currentVal);
            var url = "{{ route('frontend.checkout') }}";
            url += "?quantity=" + currentVal;
            url += "&product_id=" + {{ $product->id }};
            $('#buyNow').attr('href', url);
        }
    </script>
@endpush